<?php

/**
 * phPhoto actions.
 *
 * @package    BDS
 * @subpackage phPhoto
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class phPhotoActions extends sfActions {

    public function executeShow(sfWebRequest $request) {
        $photo = $this->getRoute()->getObject();

        $this->redirect($photo->getUrl($request->getParameter('taille')));

        return sfView::NONE;
    }

}
