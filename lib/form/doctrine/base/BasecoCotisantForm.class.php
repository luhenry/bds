<?php

/**
 * coCotisant form base class.
 *
 * @method coCotisant getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasecoCotisantForm extends sfGuardUserForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['slug'] = new sfWidgetFormInputText();
    $this->validatorSchema['slug'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

    $this->widgetSchema   ['sp_sports_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'spSport'));
    $this->validatorSchema['sp_sports_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'spSport', 'required' => false));

    $this->widgetSchema   ['ga_activites_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'gaActivite'));
    $this->validatorSchema['ga_activites_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'gaActivite', 'required' => false));

    $this->widgetSchema   ['ml_mailing_lists_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'mlMailingList'));
    $this->validatorSchema['ml_mailing_lists_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'mlMailingList', 'required' => false));

    $this->widgetSchema   ['el_listes_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'elListe'));
    $this->validatorSchema['el_listes_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'elListe', 'required' => false));

    $this->widgetSchema->setNameFormat('co_cotisant[%s]');
  }

  public function getModelName()
  {
    return 'coCotisant';
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

    if (isset($this->widgetSchema['ml_mailing_lists_list']))
    {
      $this->setDefault('ml_mailing_lists_list', $this->object->mlMailingLists->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['el_listes_list']))
    {
      $this->setDefault('el_listes_list', $this->object->elListes->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savespSportsList($con);
    $this->savegaActivitesList($con);
    $this->savemlMailingListsList($con);
    $this->saveelListesList($con);

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

  public function savemlMailingListsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['ml_mailing_lists_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->mlMailingLists->getPrimaryKeys();
    $values = $this->getValue('ml_mailing_lists_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('mlMailingLists', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('mlMailingLists', array_values($link));
    }
  }

  public function saveelListesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['el_listes_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->elListes->getPrimaryKeys();
    $values = $this->getValue('el_listes_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('elListes', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('elListes', array_values($link));
    }
  }

}
