<?php

/**
 * Project filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterBaseTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class BaseFormFilterDoctrine extends sfFormFilterDoctrine {

    public function setup() {

    }

    protected function addTextQuery(Doctrine_Query $query, $field, $values) {
        $fieldName = $this->getFieldName($field);

        if (is_array($values) && isset($values['is_empty']) && $values['is_empty']) {
            $query->addWhere(sprintf('(%s.%s IS NULL OR %1$s.%2$s = ?)', $query->getRootAlias(), $fieldName), array(''));
        } else if (is_array($values) && isset($values['text']) && '' != $values['text']) {
            $query->addWhere(sprintf('lower(%s.%s) LIKE ?', $query->getRootAlias(), $fieldName), '%' . strtolower($values['text']) . '%');
        }
    }

}
