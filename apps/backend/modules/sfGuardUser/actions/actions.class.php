<?php

require_once dirname(__FILE__) . '/../lib/sfGuardUserGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/sfGuardUserGeneratorHelper.class.php';

/**
 * sfGuardUser actions.
 *
 * @package    BDS
 * @subpackage sfGuardUser
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserActions extends autoSfGuardUserActions {

    public function executeNew(sfWebRequest $request) {
        $this->redirect('sf_guard_user');
    }

    public function executeListCotisant(sfWebRequest $request) {
        $this->redirect('coCotisant/edit?id=' . $request->getParameter('id'));
    }

}
