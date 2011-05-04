<?php

/**
 * acCommentaire form.
 *
 * @package    BDS
 * @subpackage form_doctrine
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class acCommentaireForm extends BaseacCommentaireForm {

    protected function removeFields() {
        unset(
                $this['id'],
                $this['created_at'],
                $this['updated_at'],
                $this->widgetSchema['cotisant_id'],
                $this->widgetSchema['actualite_id']
        );
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'contenu' => new sfWidgetFormEditor(),
        ));
    }

    protected function configureValidators() {
        $this->setvalidators(array(
            'actualite_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Actualite'), 'required' => false)),
            'contenu' => new sfValidatorText()
        ));
    }

    public function doUpdateObject($values) {
        parent::doUpdateObject($values);

        $this->getObject()->setActualiteId($this->getOption('actualite')->getId());
        $this->getObject()->setCotisantId($this->getOption('user')->getId());
        $this->getObject()->setUpdatedAt('now()');
    }

}
