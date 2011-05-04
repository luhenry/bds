<?php

/**
 * sfGuardGroup form.
 *
 * @package    BDS
 * @subpackage form_doctrine
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardGroupForm extends PluginsfGuardGroupForm {

    protected function removeFields() {
        unset(
                $this->widgetSchema['created_at'],
                $this->widgetSchema['updated_at']
        );
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'description' => new sfWidgetFormInputText(),
            'users_list' => new sfWidgetFormDoctrineSelectDoubleList(array('model' => 'sfGuardUser', 'order_by' => array('username', 'asc'))),
            'permissions_list' => new sfWidgetFormDoctrineSelectDoubleList(array('model' => 'sfGuardPermission')),
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'description' => new sfValidatorText()
        ));
    }

}
