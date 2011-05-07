<?php

/**
 * spSport actions.
 *
 * @package    BDS
 * @subpackage spSport
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class spSportActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->inactifs = Doctrine_Query::create()
                        ->from('spSport')
                        ->where('is_visible = true')
                        ->andWhere('is_actif = false')
                        ->orderBy('nom')
                        ->execute();

        $this->form = new sportsSearchForm(null, array('recherche' => $request->getParameter('recherche')));
    }

    public function executeShow(sfWebRequest $request) {
        $this->sport = $this->getRoute()->getObject();

        $this->forward404Unless($this->sport->getIsVisible());

        $this->responsables = $this->participants = array();

        foreach ($this->sport->getParticipants() as $participant) {
            if ($participant->getStatut() === 'Responsable')
                $this->responsables[] = $participant->getCoCotisant();
            else
                $this->participants[] = $participant->getCoCotisant();
        }

        $horaires = $this->sport->getHoraires();
        $count = $horaires->count();

        if ($count > 0) {
            $this->map = new GMap(array('mapTypeId' => 'google.maps.MapTypeId.HYBRID'), array(), array(), array('onload_method' => 'jQuery'));
            $client = new GMapClient('ABQIAAAAGKa0QtU91OY0jQCKN-ZduRQlYLkIqvFJWkqwV9pblUFztf0pnxSmRBLYyLXgNXkem1IsEBNR128HFQ', array(sfConfig::get('app_google_maps_api_keys')));

            for ($i = 0; $i < $count; $i++) {
                $salle = $horaires[$i]->getSalle();

                if ($salle->getLatitude() === null || $salle->getLongitude() === null) {
                    $point = new GMapGeocodedAddress($salle->getAdresse() . ', ' . $salle->getVille());
                    $point->geocodeXml($client);

                    $salle->setAdresse($point->getGeocodedAddress());
                    $salle->setLatitude($point->getLat());
                    $salle->setLongitude($point->getLng());
                    $salle->save();
                }

                $marker = new GMapMarker($salle->getLatitude(), $salle->getLongitude(), array(), 'marker_' . $i);
                $marker->addHtmlInfoWindow(new GMapInfoWindow(utf8_decode($salle->getAdresse()), array(), 'info_window_' . $i));

                $this->map->addMarker($marker);
            }

            $this->map->centerAndZoomOnMarkers(0.5);
        }
    }

    public function executeParticipe(sfWebRequest $request) {
        $sport = $this->getRoute()->getObject();

        $sport->addOrRemoveParticipant($this->getUser()->getGuardUser());

        $this->redirect($this->generateUrl('sport_show', $sport));
    }

    public function executeAdmin(sfWebRequest $request) {
        $this->sport = $this->getRoute()->getObject();

        $this->forward404Unless($this->sport->isAdmin($this->getUser()->getGuardUser()) || $this->getUser()->isSuperAdmin());

        $this->form = new spSportForm($this->sport);

        if ($request->isMethod('post') || $request->isMethod('put')) {
            $this->form->bind($request->getParameter($this->form->getName()));

            if ($this->form->isValid()) {
                $this->form->save();

                $this->redirect($this->generateUrl('sport_admin', $this->sport));
            }
        }
    }

    public function executeMail(sfWebRequest $request) {
        $this->sport = $this->getRoute()->getObject();

        $this->forward404Unless($this->sport->isAdmin($this->getUser()->getGuardUser()) || $this->getUser()->isSuperAdmin());

        $this->form = new mlSportForm(null, array('sport' => $this->sport));

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));

            if ($this->form->isValid()) {
                $this->form->getObject()->setSpSport($this->sport);

                $mail = $this->form->save();

                try {
                    $mail->send($this->getMailer(), $this->getUser()->getGuardUser());

                    $this->getUser()->setFlash('notice', 'Le message a été envoyé avec succès');

                    $this->redirect('sport_mail', $this->sport);
                } catch (sfStopException $e) {
                    throw $e;
                } catch (Exception $e) {
                    $this->getUser()->setFlash('error', $e->getMessage());
                }
            }
        }
    }

    public function executeMailingList(sfWebRequest $request) {
        $this->sport = $this->getRoute()->getObject();
        $this->cotisants = $this->sport->getCoCotisants();
    }

}
