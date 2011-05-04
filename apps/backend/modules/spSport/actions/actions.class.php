<?php

require_once dirname(__FILE__) . '/../lib/spSportGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/spSportGeneratorHelper.class.php';

/**
 * spSport actions.
 *
 * @package    BDS
 * @subpackage spSport
 * @author     Responsable Informatique du BDS
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class spSportActions extends autoSpSportActions {

    public function executeListChangeActif(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $this->forward404Unless($sport = spSportTable::getInstance()->findOneBy('id', $id));
        $sport->setIsActif(!$sport->getIsActif());
        $sport->save();
        $this->redirect('sp_sport');
    }

}
