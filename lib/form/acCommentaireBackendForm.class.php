<?php

/**
 * backendAcCommentaireForm
 *
 * @package    BDS
 * @subpackage form_backend
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class acCommentaireBackendForm extends acCommentaireForm {

    protected function removeFields() {
        unset(
                $this['created_at'],
                $this['updated_at']
        );
    }

    protected function configureWidgets() {
        acCommentaireForm::configureWidgets();

        $this->setWidgets(array(
            'actualite_id' => new sfWidgetFormDoctrineChoice(array('model' => 'acActualite', 'order_by' => array('created_at', 'desc'))),
            'cotisant_id' => new sfWidgetFormDoctrineChoice(array('model' => 'coCotisant', 'order_by' => array('prenom, nom', 'asc'))),
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'contenu' => new sfValidatorText()
        ));
    }

    public function doUpdateObject($values) {
        sfFormDoctrine::doUpdateObject($values);
    }

}