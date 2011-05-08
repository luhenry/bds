<?php

/**
 * fiDossier filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasefiDossierFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lft'   => new sfWidgetFormFilterInput(),
      'rgt'   => new sfWidgetFormFilterInput(),
      'level' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nom'   => new sfValidatorPass(array('required' => false)),
      'lft'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rgt'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'level' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('fi_dossier_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'fiDossier';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'nom'   => 'Text',
      'lft'   => 'Number',
      'rgt'   => 'Number',
      'level' => 'Number',
    );
  }
}
