<?php

/**
 * wmWeekmail form.
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wmWeekmailForm extends BasewmWeekmailForm {

    protected function configureWidgets() {
        $this->setWidgets(array(
            'objet' => new sfWidgetFormInputText(),
            'introduction' => new sfWidgetFormEditor(),
            'blague' => new sfWidgetFormEditor(),
            'conclusion' => new sfWidgetFormEditor(),
        ));
    }

    protected function configureValidators() {
        $this->setvalidators(array(
            'objet' => new sfValidatorText(),
            'introduction' => new sfValidatorText(),
            'blague' => new sfValidatorText(),
            'conclusion' => new sfValidatorText(array('required' => false)),
        ));
    }

}
