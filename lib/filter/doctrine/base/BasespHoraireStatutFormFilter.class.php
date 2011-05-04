<?php

/**
 * spHoraireStatut filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasespHoraireStatutFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'couleur'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_ouvert' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'nom'       => new sfValidatorPass(array('required' => false)),
      'couleur'   => new sfValidatorPass(array('required' => false)),
      'is_ouvert' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('sp_horaire_statut_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'spHoraireStatut';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'nom'       => 'Text',
      'couleur'   => 'Text',
      'is_ouvert' => 'Boolean',
    );
  }
}
