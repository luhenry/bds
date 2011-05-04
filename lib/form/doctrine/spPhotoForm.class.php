<?php

/**
 * spPhoto form.
 *
 * @package    BDS
 * @subpackage form_doctrine
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class spPhotoForm extends BasespPhotoForm {

    protected function removeFields() {
        unset(
                $this['photo_id'],
                $this['sport_id']
        );
    }

    protected function configureRelations() {
        $this->embedRelation('phPhoto as photo', 'phPhotoForm');
    }

    protected function updateSportIdColumn($value) {
        return $this->getOption('sport')->getId();
    }

}
