<?php

/**
 * gaActivite form base class.
 *
 * @method gaActivite getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasegaActiviteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'contact_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('contact'), 'add_empty' => true)),
      'nom'               => new sfWidgetFormTextarea(),
      'lieu'              => new sfWidgetFormTextarea(),
      'site'              => new sfWidgetFormTextarea(),
      'description'       => new sfWidgetFormTextarea(),
      'date_debut'        => new sfWidgetFormDateTime(),
      'date_fin'          => new sfWidgetFormDateTime(),
      'is_visible'        => new sfWidgetFormInputCheckbox(),
      'slug'              => new sfWidgetFormInputText(),
      'ph_photos_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'phPhoto')),
      'co_cotisants_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'coCotisant')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'contact_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('contact'), 'required' => false)),
      'nom'               => new sfValidatorString(),
      'lieu'              => new sfValidatorString(),
      'site'              => new sfValidatorString(array('required' => false)),
      'description'       => new sfValidatorString(),
      'date_debut'        => new sfValidatorDateTime(),
      'date_fin'          => new sfValidatorDateTime(),
      'is_visible'        => new sfValidatorBoolean(array('required' => false)),
      'slug'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ph_photos_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'phPhoto', 'required' => false)),
      'co_cotisants_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'coCotisant', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'gaActivite', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('ga_activite[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'gaActivite';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['ph_photos_list']))
    {
      $this->setDefault('ph_photos_list', $this->object->phPhotos->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['co_cotisants_list']))
    {
      $this->setDefault('co_cotisants_list', $this->object->coCotisants->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savephPhotosList($con);
    $this->savecoCotisantsList($con);

    parent::doSave($con);
  }

  public function savephPhotosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['ph_photos_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->phPhotos->getPrimaryKeys();
    $values = $this->getValue('ph_photos_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('phPhotos', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('phPhotos', array_values($link));
    }
  }

  public function savecoCotisantsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['co_cotisants_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->coCotisants->getPrimaryKeys();
    $values = $this->getValue('co_cotisants_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('coCotisants', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('coCotisants', array_values($link));
    }
  }

}
