<?php

/**
 * mlSport form.
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mlSportForm extends BasemlSportForm {

    protected function configureWidgets() {
        mlMailForm::configureWidgets();

        $this->setWidgets(array(
            'destinataires' => new sfWidgetFormTextarea(array(), array('style' => 'width:100%'))
        ));

        $this->setDefault('destinataires', implode(', ', $this->getOption('sport')->getParticipantsEmails()));
    }

}
