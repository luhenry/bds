<?php

/**
 * backendPhPhotoForm
 *
 * @package    BDS
 * @subpackage form_backend
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class backendPhPhotoForm extends phPhotoForm {

    protected function removeFields() {
        unset(
                $this['id'],
                $this['content_type'],
                $this['created_at'],
                $this['updated_at']
        );
    }

}
