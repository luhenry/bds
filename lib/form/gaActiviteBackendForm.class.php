<?php

/**
 * backendGaActiviteForm
 *
 * @package    BDS
 * @subpackage form_backend
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gaActiviteBackendForm extends gaActiviteForm {

    public function removeFields() {
        unset(
                $this['id'],
                $this['slug'],
                $this['ph_photos_list'],
                $this['co_cotisants_list']
        );
    }

}