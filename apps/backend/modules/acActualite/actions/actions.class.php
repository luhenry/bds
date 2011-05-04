<?php

require_once dirname(__FILE__) . '/../lib/acActualiteGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/acActualiteGeneratorHelper.class.php';

/**
 * acActualite actions.
 *
 * @package    BDS
 * @subpackage acActualite
 * @author     Responsable Informatique du BDS
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class acActualiteActions extends autoAcActualiteActions {

    public function executeListPublier(sfWebRequest $request) {
        $actualite = Doctrine_Query::create()
                        ->from('acActualite')
                        ->where('id = ?', $request->getParameter('id'))
                        ->fetchOne();

        $actualite->setIsVisible(!$actualite->getIsVisible());
        $actualite->save();

        $this->redirect('ac_actualite');
    }

}