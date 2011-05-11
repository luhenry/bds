<?php

/**
 * phPhoto form.
 *
 * @package    BDS
 * @subpackage form_doctrine
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class phPhotoForm extends BasephPhotoForm {

    protected $defaultFilename = 'defaut.jpg';
    protected $defaultContentType = 'image/jpeg';

    protected function removeFields() {
        unset(
                $this['id'],
                $this['created_at'],
                $this['updated_at']
        );
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'filename' => new sfWidgetFormInputFileEditable(array(
                'file_src' => '/uploads/photos/grand/' . $this->getObject()->getFilename(),
                'edit_mode' => !$this->isNew,
                'with_delete' => false,
                'is_image' => false,
                'template' => '%input%<br/><a href="%file%"><img src="%file%" style="max-height:300px;max-width:400px" /></a>'))
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'filename' => new sfValidatorFile(array('required' => false, 'path' => sfConfig::get('sf_upload_dir') . '/photos/grand/' , 'mime_types' => 'web_images'))
        ));
    }
}
