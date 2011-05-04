<?php

/**
 * spHoraire form base class.
 *
 * @method spHoraire getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasespHoraireForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'sport_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sport'), 'add_empty' => false)),
      'salle_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('salle'), 'add_empty' => false)),
      'statut_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('statut'), 'add_empty' => false)),
      'jour'        => new sfWidgetFormInputText(),
      'heure_debut' => new sfWidgetFormTime(),
      'heure_fin'   => new sfWidgetFormTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sport_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sport'))),
      'salle_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('salle'))),
      'statut_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('statut'), 'required' => false)),
      'jour'        => new sfValidatorInteger(),
      'heure_debut' => new sfValidatorTime(),
      'heure_fin'   => new sfValidatorTime(),
    ));

    $this->widgetSchema->setNameFormat('sp_horaire[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'spHoraire';
  }

}
