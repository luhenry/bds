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
                'file_src' => '/uploads/photos/grand/' . $this->getObject()->getFilename(),
                'edit_mode' => !$this->isNew,
                'with_delete' => false,
                'is_image' => false,
                'template' => '%input%<br/><div style="margin:10px" ><a href="%file%"><img src="%file%" style="max-height:300px;max-width:400px" /></a></div>'))
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'filename' => new sfValidatorFile(array('required' => false, 'mime_types' => 'web_images'))
        ));
    }

    protected function doUpdateObject($values) {
        if (!($values['filename'] instanceof sfValidatedFile))
            unset($values['filename']);

        sfFormDoctrine::doUpdateObject($values);

        if (isset($values['filename'])) {
            $file = $values['filename'];
            $filename = $file->generateFilename();

            $file->save(sfConfig::get('sf_upload_dir') . '/photos/grand/' . $filename);
            $this->getObject()->setFilename($filename);
            $this->getObject()->setContentType($file->getType());
        } elseif ($this->isNew) {
            $this->getObject()->setFilename($this->defaultFilename);
            $this->getObject()->setContentType($this->defaultContentType);
        }

        $this->getObject()->setUpdatedAt('now()');
    }

}
