<?php

/**
 * backendSpSportForm
 *
 * @package    BDS
 * @subpackage form_backend
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class spSportBackendForm extends spSportForm {

    protected function removeFields() {
        unset(
                $this['id'],
                $this['updated_at'],
                $this['created_at'],
                $this['slug'],
                $this['ph_photos_list'],
                $this['co_cotisants_list']
        );
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'nom' => new sfWidgetFormInputText(),
            'description' => new sfWidgetFormEditor(),
            'materiel' => new sfWidgetFormEditor()
        ));
    }

}