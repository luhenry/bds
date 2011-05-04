<?php

/**
 * Description of phPhotoCoCotisantForm
 *
 * @author ludovic
 */
class phPhotoCoCotisantForm extends phPhotoForm {

    protected $defaultFilename = 'default.cotisant.jpg';
    protected $defaultContentType = 'image/jpeg';

    protected function removeFields() {
        unset(
                $this['id'],
                $this['content_type'],
                $this['created_at'],
                $this['updated_at'],
                $this['sp_sports_list'],
                $this['ga_activites_list']
        );
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'filename' => new sfWidgetFormInputFileEditable(array(
                'file_src' => $this->getObject()->getUrl('petit'),
                'edit_mode' => !$this->isNew,
                'with_delete' => false,
                'is_image' => false,
                'template' => '%input%<br/><div style="margin:10px" ><a href="%file%"><img src="%file%" style="max-height:300px;max-width:400px" /></a></div>'
            )),
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'filename' => new sfValidatorFile(array(
                'required' => false,
                'mime_types' => 'web_images'
            ))
        ));
    }

}