<?php

/**
 * elElection form base class.
 *
 * @method elElection getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseelElectionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nom'         => new sfWidgetFormTextarea(),
      'description' => new sfWidgetFormTextarea(),
      'date_debut'  => new sfWidgetFormDateTime(),
      'date_fin'    => new sfWidgetFormDateTime(),
      'slug'        => new sfWidgetFormInputText(),
      'postes_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'elPoste')),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nom'         => new sfValidatorString(),
      'description' => new sfValidatorString(array('required' => false)),
      'date_debut'  => new sfValidatorDateTime(array('required' => false)),
      'date_fin'    => new sfValidatorDateTime(),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'postes_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'elPoste', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'elElection', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('el_election[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'elElection';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['postes_list']))
    {
      $this->setDefault('postes_list', $this->object->postes->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savepostesList($con);

    parent::doSave($con);
  }

  public function savepostesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['postes_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->postes->getPrimaryKeys();
    $values = $this->getValue('postes_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('postes', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('postes', array_values($link));
    }
  }

}
