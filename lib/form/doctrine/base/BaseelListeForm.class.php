<?php

/**
 * elListe form base class.
 *
 * @method elListe getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseelListeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'siege_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('siege'), 'add_empty' => false)),
      'description'       => new sfWidgetFormTextarea(),
      'co_cotisants_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'coCotisant')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'siege_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('siege'))),
      'description'       => new sfValidatorString(),
      'co_cotisants_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'coCotisant', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('el_liste[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'elListe';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['co_cotisants_list']))
    {
      $this->setDefault('co_cotisants_list', $this->object->coCotisants->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savecoCotisantsList($con);

    parent::doSave($con);
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
