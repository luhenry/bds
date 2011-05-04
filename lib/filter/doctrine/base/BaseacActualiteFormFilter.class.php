<?php

/**
 * acActualite filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseacActualiteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cotisant_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('coCotisant'), 'add_empty' => true)),
      'titre'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contenu'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_visible'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'        => new sfWidgetFormFilterInput(),
      'tags_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'acTag')),
    ));

    $this->setValidators(array(
      'cotisant_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('coCotisant'), 'column' => 'id')),
      'titre'       => new sfValidatorPass(array('required' => false)),
      'contenu'     => new sfValidatorPass(array('required' => false)),
      'is_visible'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'        => new sfValidatorPass(array('required' => false)),
      'tags_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'acTag', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ac_actualite_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addTagsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.acActualiteTag acActualiteTag')
      ->andWhereIn('acActualiteTag.tag_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'acActualite';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'cotisant_id' => 'ForeignKey',
      'titre'       => 'Text',
      'contenu'     => 'Text',
      'is_visible'  => 'Boolean',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
      'slug'        => 'Text',
      'tags_list'   => 'ManyKey',
    );
  }
}
