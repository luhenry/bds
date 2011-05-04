<?php

/**
 * acTag form base class.
 *
 * @method acTag getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseacTagForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'nom'             => new sfWidgetFormTextarea(),
      'actualites_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'acActualite')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nom'             => new sfValidatorString(),
      'actualites_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'acActualite', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ac_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'acTag';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['actualites_list']))
    {
      $this->setDefault('actualites_list', $this->object->actualites->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveactualitesList($con);

    parent::doSave($con);
  }

  public function saveactualitesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['actualites_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->actualites->getPrimaryKeys();
    $values = $this->getValue('actualites_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('actualites', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('actualites', array_values($link));
    }
  }

}
