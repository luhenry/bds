<?php

/**
 * spPhoto filter form.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class spPhotoFormFilter extends BasespPhotoFormFilter {

    protected function configureWidgets() {
        $this->setWidgets(array(
            'sport_id' => new sfWidgetFormDoctrineChoice(array('model' => 'spSport', 'order_by' => array('nom', 'asc'), 'add_empty' => true))
        ));
    }
    protected function configureValidators() {
        $this->setValidators(array(
            'sport_id' => new sfValidatorDoctrineChoice(array('model' => 'spSport', 'required' => false))
        ));
    }

    public function getFields() {
        return array(
            'sport_id' => 'ForeignKey',
            'photo_id' => 'ForeignKey',
        );
    }

}
