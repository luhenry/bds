<?php

/**
 * spHoraire filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasespHoraireFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sport_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sport'), 'add_empty' => true)),
      'salle_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('salle'), 'add_empty' => true)),
      'statut_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('statut'), 'add_empty' => true)),
      'jour'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'heure_debut' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'heure_fin'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'sport_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sport'), 'column' => 'id')),
      'salle_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('salle'), 'column' => 'id')),
      'statut_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('statut'), 'column' => 'id')),
      'jour'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'heure_debut' => new sfValidatorPass(array('required' => false)),
      'heure_fin'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sp_horaire_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'spHoraire';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'sport_id'    => 'ForeignKey',
      'salle_id'    => 'ForeignKey',
      'statut_id'   => 'ForeignKey',
      'jour'        => 'Number',
      'heure_debut' => 'Text',
      'heure_fin'   => 'Text',
    );
  }
}
