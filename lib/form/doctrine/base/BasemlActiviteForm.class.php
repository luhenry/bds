<?php

/**
 * mlActivite form base class.
 *
 * @method mlActivite getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemlActiviteForm extends mlMailForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('ml_activite[%s]');
  }

  public function getModelName()
  {
    return 'mlActivite';
  }

}
