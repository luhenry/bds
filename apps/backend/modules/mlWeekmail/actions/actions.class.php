<?php

require_once dirname(__FILE__) . '/../lib/mlWeekmailGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/mlWeekmailGeneratorHelper.class.php';

/**
 * mlWeekmail actions.
 *
 * @package    BDS
 * @subpackage mlWeekmail
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mlWeekmailActions extends autoMlWeekmailActions {

    public function executeListSend(sfWebRequest $request) {

        $weekmail = $this->getRoute()->getObject();

        try {
            $weekmail->send($this->getMailer(), $this->getUser()->getGuardUser());

            $this->getUser()->setFlash('notice', 'Le weekmail a été envoyé avec succès');
        } catch (Exception $e) {
            $this->getUser()->setFlash('error', $e->getMessage());

            if ( sfConfig::get('sf_debug') )
                throw $e;
        }

        $this->redirect('ml_weekmail');
    }

}
