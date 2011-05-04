<?php

/**
 * mlSport form base class.
 *
 * @method mlSport getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemlSportForm extends mlMailForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('ml_sport[%s]');
  }

  public function getModelName()
  {
    return 'mlSport';
  }

}
