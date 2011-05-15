<?php

require_once dirname(__FILE__) . '/../lib/coCotisantGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/coCotisantGeneratorHelper.class.php';

/**
 * coCotisant actions.
 *
 * @package    BDS
 * @subpackage coCotisant
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class coCotisantActions extends autoCoCotisantActions {

    public function executeBatchSendIdentifiants(sfWebRequest $request) {
        $users = Doctrine_Query::create()
                        ->from('sfGuardUser u')
                        ->whereIn('u.id', $request->getParameter('ids'))
                        ->execute();

        try {
            foreach ($users as $user)
                $user->sendIdentifiant();

            $this->getUser()->setFlash('notice', 'Les identifiants ont bien été envoyer par mail');
        } catch (Exception $e) {
            $this->getUser()->setFlash('error', "Erreur lors de l'envoi des identifiants de '$user'");
        }

        $this->redirect('co_cotisant');
    }

    public function executeListSendIdentifiants(sfWebRequest $request) {
        $user = Doctrine_Query::create()
                        ->from('sfGuardUser u')
                        ->where('id = ?', $request->getParameter('id'))
                        ->fetchOne();

        try {
            $user->sendIdentifiant();
            
            $this->getUser()->setFlash('notice', 'Les identifiants ont bien été envoyé par mail');
        } catch (Exception $e) {
            $this->getUser()->setFlash('error', "Erreur lors de l'envoi des identifiants de '$user'");
        }

        $this->redirect('co_cotisant');
    }

    public function executeBatchImprimerCartes(sfWebRequest $request) {
        $this->forward404Unless($cotisants = Doctrine_Query::create()->from('coCotisant')->whereIn('id', $request->getParameter('ids'))->execute());

        $pdf = $this->generateCartes($cotisants);

        header('Content-Disposition: inline; filename=Cartes.pdf');
        header('Content-type: application/pdf');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');

        $this->setLayout(false);

        echo $pdf->render();

        $this->redirect('co_cotisant');
    }

    public function executeListCarte(sfWebRequest $request) {
        $cotisant = $this->getRoute()->getObject();

        if (strtotime($cotisant->getDateFinCotisation()) > ( strtotime($cotisant->getDateCertificat()) + 3600 * 24 * 365 ) && !$request->hasParameter('force')) {
            $this->getUser()->setFlash('error', sprintf('Le certificat de ce cotisant expirera avant la date de fin de cotisation. <a href="%s">Forcer l\'impression</a>', $this->generateUrl('co_cotisant_object', array('action' => 'ListCarte', 'id' => $cotisant->getId(), 'force' => true))));
            $this->redirect('co_cotisant');
        }

        $pdf = $this->generateCartes(array($cotisant));

        header('Content-Disposition: inline; filename=Carte.pdf');
        header('Content-type: application/pdf');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');

        $this->setLayout(false);

        echo $pdf->render();

        $this->redirect('co_cotisant');
    }

    protected function generateCartes($cotisants) {
        $count = count($cotisants);

        $pdf = new Zend_Pdf();
        $need_new_page = true;
        $margin = 40;
        $width = 1894;
        $height = 591;

        /**
         * On a :
         * 595 dot = 8,263888889 inches = 21 cm
         *
         * On veut donc une largeur de 16cm sur la feuille imprimée :
         * 16cm = 6.299212598425196 inches = 453,543307087 dot
         * Donc : point_to_pixel_conversion = 453,543307087 / 609 = 0.744734494
         */
        $point_to_pixel_conversion = 0.239463203;

        try {
            for ($i = 0; $i < $count; ++$i) {
                if ($need_new_page) {
                    $page = $pdf->newPage(Zend_Pdf_Page::SIZE_A4);
                    $pdf->pages[] = $page;
                    $offset_top = $margin + 2840;
                    $need_new_page = false;
                }

                if (strtotime($cotisants[$i]->getDateFinCotisation()) > ( strtotime($cotisants[$i]->getDateCertificat()) + 3600 * 24 * 365 ) && !$this->getRequest()->hasParameter('force')) {
                    continue;
                }

                if (!$cotisants[$i]->hasPhoto())
                    continue;

                $left = $margin * $point_to_pixel_conversion;
                $right = ($margin + $width) * $point_to_pixel_conversion;
                $top = $offset_top * $point_to_pixel_conversion;
                $bottom = ($offset_top + $height) * $point_to_pixel_conversion;

                $image = Zend_Pdf_Image::imageWithPath($this->generateCarte($cotisants[$i]));
                $page->drawImage($image, $left, $top, $right, $bottom);

                $offset_top -= $height;

                if ($offset_top * $point_to_pixel_conversion < $margin * $point_to_pixel_conversion)
                    $need_new_page = true;
            }

            return $pdf;

            echo $pdf->render();
        } catch (Exception $e) {
            $this->getUser()->setFlash('error', $e->getMessage());
        }
    }

    protected function generateCarte(coCotisant $cotisant) {
        if (!$cotisant->hasPhoto())
            throw new Exception(sprintf("Ce cotisant n'a pas de photo", $cotisant));

        if (!$cotisant->isActif())
            throw new Exception("Ce cotisant n'est pas actif");

        $data_dir = sfConfig::get('sf_data_dir');

        $photo_max_width = 311;
        $photo_max_height = 418;

        $thumbnail = new sfThumbnail($photo_max_width, $photo_max_height);
        $thumbnail->loadFile(sfConfig::get('sf_upload_dir') . '/cotisants/photos/' . $cotisant->getPhoto());

        $photo = imagecreatefromstring($thumbnail->toString());
        $base = imagecreatefrompng($data_dir . '/cotisant/carte_grand.png');

        $noir = imagecolorallocate($base, 0, 0, 0);

        imagettftext($base, 31, 0, 258, 152, $noir, $data_dir . '/cotisant/impact.ttf', $cotisant->getId());
        imagettftext($base, 31, 0, 137, 233, $noir, $data_dir . '/cotisant/impact.ttf', substr($cotisant->getNom(), 0, 20));
        imagettftext($base, 31, 0, 196, 313, $noir, $data_dir . '/cotisant/impact.ttf', substr($cotisant->getPrenom(), 0, 16));
        imagettftext($base, 31, 0, 215, 389, $noir, $data_dir . '/cotisant/impact.ttf', $cotisant->getDateFinCotisation());

        imagecopymerge($base, $photo, 566 + ( $photo_max_width - imagesx($photo) ) / 2, 90.2 + ( $photo_max_height - imagesy($photo) ) / 2, 0, 0, imagesx($photo), imagesy($photo), 100);

        imagepng($base, $filename = $data_dir . '/cotisant/cartes/' . $cotisant->getSlug() . '.png');

        imagedestroy($base);
        imagedestroy($photo);

        return $filename;
    }

}

