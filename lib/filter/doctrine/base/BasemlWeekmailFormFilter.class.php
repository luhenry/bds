<?php

/**
 * mlWeekmail filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemlWeekmailFormFilter extends mlMailFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('ml_weekmail_filters[%s]');
  }

  public function getModelName()
  {
    return 'mlWeekmail';
  }
}
