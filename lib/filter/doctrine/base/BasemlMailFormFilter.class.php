<?php

/**
 * mlMail filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemlMailFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cotisant_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('coCotisant'), 'add_empty' => true)),
      'objet'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'destinataires' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contenu'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sent_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'type'          => new sfWidgetFormFilterInput(),
      'sport_id'      => new sfWidgetFormFilterInput(),
      'activite_id'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cotisant_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('coCotisant'), 'column' => 'id')),
      'objet'         => new sfValidatorPass(array('required' => false)),
      'destinataires' => new sfValidatorPass(array('required' => false)),
      'contenu'       => new sfValidatorPass(array('required' => false)),
      'sent_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'type'          => new sfValidatorPass(array('required' => false)),
      'sport_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'activite_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('ml_mail_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mlMail';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'cotisant_id'   => 'ForeignKey',
      'objet'         => 'Text',
      'destinataires' => 'Text',
      'contenu'       => 'Text',
      'sent_at'       => 'Date',
      'type'          => 'Text',
      'sport_id'      => 'Number',
      'activite_id'   => 'Number',
    );
  }
}
