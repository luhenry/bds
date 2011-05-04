<?php

/**
 * phPhoto form base class.
 *
 * @method phPhoto getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasephPhotoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'filename'          => new sfWidgetFormTextarea(),
      'content_type'      => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'sp_sports_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'spSport')),
      'ga_activites_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'gaActivite')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'filename'          => new sfValidatorString(),
      'content_type'      => new sfValidatorString(),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'sp_sports_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'spSport', 'required' => false)),
      'ga_activites_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'gaActivite', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ph_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'phPhoto';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sp_sports_list']))
    {
      $this->setDefault('sp_sports_list', $this->object->spSports->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['ga_activites_list']))
    {
      $this->setDefault('ga_activites_list', $this->object->gaActivites->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savespSportsList($con);
    $this->savegaActivitesList($con);

    parent::doSave($con);
  }

  public function savespSportsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sp_sports_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->spSports->getPrimaryKeys();
    $values = $this->getValue('sp_sports_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('spSports', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('spSports', array_values($link));
    }
  }

  public function savegaActivitesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['ga_activites_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->gaActivites->getPrimaryKeys();
    $values = $this->getValue('ga_activites_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('gaActivites', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('gaActivites', array_values($link));
    }
  }

}
