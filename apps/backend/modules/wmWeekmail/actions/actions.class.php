<?php

require_once dirname(__FILE__) . '/../lib/wmWeekmailGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/wmWeekmailGeneratorHelper.class.php';

/**
 * wmWeekmail actions.
 *
 * @package    BDS
 * @subpackage wmWeekmail
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wmWeekmailActions extends autoWmWeekmailActions {

    public function executeListRender(sfWebRequest $request) {
        $this->weekmail = Doctrine_Query::create()
                        ->from('wmWeekmail w')
                        ->leftJoin('w.paragraphes p')
                        ->where('w.id = ?', $request->getParameter('id'))
                        ->andWhere('p.is_valide = true')
                        ->fetchOne();

        if ($this->weekmail === false) {
            $this->getUser()->setFlash('error', 'Aucun paragraphe validé ou weekmail inexistant');
            $this->redirect('wm_weekmail');
        }

        $this->setLayout(false);
    }

    public function executeListSend(sfWebRequest $request) {
        $weekmail = Doctrine_Query::create()
                        ->from('wmWeekmail w')
                        ->leftJoin('w.paragraphes p')
                        ->where('w.id = ?', $request->getParameter('id'))
                        ->andWhere('p.is_valide = true')
                        ->fetchOne();

        if (!$weekmail) {
            $this->getUser()->setFlash('error', 'Aucun paragraphe validé ou weekmail inexistant');
        } else {
            if (!$request->hasParameter('confirm')) {
                $this->getUser()->setFlash('notice', 'Etes vous sur de vouloir envoyer le weekmail ? <a href="'
                        . $this->generateUrl('wm_weekmail_object', array('action' => 'ListSend', 'id' => $weekmail->getId(), 'confirm' => true))
                        . '">Confimer l\'envoi</a>');

                $this->redirect('wm_weekmail');
            }

            try {
                $message = $this->getMailer()->compose()
                                ->setFrom('bds@utbm.fr')
                                ->setSender('bds@utbm.fr')
                                ->setTo('etudiants@utbm.fr')
                                ->setSubject($weekmail->getObjet())
                                ->setBody($this->getComponent('wmWeekmail', 'render', array('weekmail' => $weekmail)))
                                ->setContentType('text/html')
                                ->setCharset('utf8');

                foreach ($weekmail->getPiecesJointes() as $pj) {
                    $message->attach(Swift_Attachment::fromPath(sfConfig::get('sf_upload_dir') . '/attachments/' . $pj->getFilename())->setFilename($pj->getNom()));
                }

                $count = $this->getMailer()->batchSend($message);

                if ($count != 1)
                    throw new Exception(sprintf("Erreur lors de l'envoi : nombre de message envoyé insuffisant. %d message(s) envoyé(s)", $count));

                $this->getUser()->setFlash('notice', 'Le weekmail a été envoyé avec succès');
            } catch (Exception $e) {
                $this->getUser()->setFlash('error', $e->getMessage());

                if (sfConfig::get('sf_debug'))
                    throw $e;
                $this->redirect('wm_weekmail');
            }
        }

        $this->redirect('wm_weekmail');
    }

}
