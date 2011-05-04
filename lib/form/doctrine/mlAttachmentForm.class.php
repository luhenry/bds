<?php

/**
 * mlAttachment form.
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mlAttachmentForm extends BasemlAttachmentForm {

    protected function removeFields() {
        unset($this['id']);

        if (!$this->isNew()) {
            unset($this['filename']);
        }
    }

    protected function configureWidgets() {
        if ($this->isNew()) {
            $this->setWidgets(array(
                'filename' => new sfWidgetFormInputFileEditable(array(
                    'file_src' => '/uploads/attachments/' . $this->getObject()->getFilename(),
                    'edit_mode' => !$this->isNew(),
                    'with_delete' => false,
                    'is_image' => false,
                    'template' => '%input%<br/><div style="margin:10px" ><a href="%file%">Lien vers le fichier</a></div>'
                ))
            ));
        }

        $this->setWidgets(array(
            'nom' => new sfWidgetFormInputText(),
        ));
    }

    protected function configureValidators() {
        if ($this->isNew()) {
            $this->setValidators(array(
                'filename' => new sfValidatorFile(array('path' => sfConfig::get('sf_upload_dir') . '/attachments/')),
                'nom' => new sfValidatorString(array('required' => false))
            ));
        }
    }

    protected function doUpdateObject($values) {
        if ($values['nom'] == null || trim($values['nom']) == '')
            $values['nom'] = $values['filename']->getOriginalFilename();

        sfFormDoctrine::doUpdateObject($values);
    }

}
