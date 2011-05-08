<?php

/**
 * wmPieceJointe form.
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wmPieceJointeForm extends BasewmPieceJointeForm {

    protected function removeFields() {
        unset($this['id']);
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'nom' => new sfWidgetFormInputText(),
            'filename' => new sfWidgetFormInputFileEditable(array(
                'file_src' => '/uploads/attachments/' . $this->getObject()->getFilename(),
                'edit_mode' => !$this->isNew(),
                'with_delete' => false,
                'is_image' => false,
                'template' => '%input%<br/><div style="margin:10px" ><a href="%file%">Lien vers le fichier</a></div>'
            ))
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'filename' => new sfValidatorFile(array('path' => sfConfig::get('sf_upload_dir') . '/attachments/')),
            'nom' => new sfValidatorString(array('required' => true))
        ));
    }

}
