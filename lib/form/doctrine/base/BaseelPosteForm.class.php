<?php

/**
 * elPoste form base class.
 *
 * @method elPoste getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseelPosteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'nom'            => new sfWidgetFormTextarea(),
      'description'    => new sfWidgetFormTextarea(),
      'slug'           => new sfWidgetFormInputText(),
      'elections_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'elElection')),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nom'            => new sfValidatorString(),
      'description'    => new sfValidatorString(array('required' => false)),
      'slug'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'elections_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'elElection', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'elPoste', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('el_poste[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'elPoste';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['elections_list']))
    {
      $this->setDefault('elections_list', $this->object->elections->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveelectionsList($con);

    parent::doSave($con);
  }

  public function saveelectionsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['elections_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->elections->getPrimaryKeys();
    $values = $this->getValue('elections_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('elections', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('elections', array_values($link));
    }
  }

}
