<?php

/**
 * wmWeekmail filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasewmWeekmailFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'objet'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'introduction' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'blague'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'conclusion'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'objet'        => new sfValidatorPass(array('required' => false)),
      'introduction' => new sfValidatorPass(array('required' => false)),
      'blague'       => new sfValidatorPass(array('required' => false)),
      'conclusion'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wm_weekmail_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'wmWeekmail';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'objet'        => 'Text',
      'introduction' => 'Text',
      'blague'       => 'Text',
      'conclusion'   => 'Text',
    );
  }
}
