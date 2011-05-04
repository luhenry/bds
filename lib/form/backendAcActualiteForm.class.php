<?php

/**
 * backendAcCommentaireForm
 *
 * @package    BDS
 * @subpackage form_backend
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class backendAcActualiteForm extends acActualiteForm {

    protected function removeFields() {
        unset(
                $this['id'],
                $this['created_at'],
                $this['updated_at'],
                $this['is_visible']
        );
    }

    protected function configureWidgets() {
        acActualiteForm::configureWidgets();

        $this->setWidgets(array(
            'cotisant_id' => new sfWidgetFormDoctrineChoice(array('model' => 'coCotisant', 'order_by' => array('prenom, nom', 'asc'))),
        ));
    }

    protected function doUpdateObject($values) {
        sfFormDoctrine::doUpdateObject($values);

        $this->getObject()->setUpdatedAt('now()');

        if ($this->isNew())
            $this->getObject()->setCreatedAt('now()');
    }

}