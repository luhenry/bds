<?php

/**
 * Laigu Admin Theme
 *
 * @author: Jordi Llonch <jordi@laigu.net>
 *
 */
class laiguDoctrineGenerator extends sfDoctrineGenerator
{
  // LAIGU Theme
  /**
   * Returns HTML code for a field.
   *
   * @param sfModelGeneratorConfigurationField $field The field
   *
   * @return string HTML code
   */
  public function renderField($field)
  {
    $html = $this->getColumnGetter($field->getName(), true);

    if ($renderer = $field->getRenderer())
    {
      $html = sprintf("$html ? call_user_func_array(%s, array_merge(array(%s), %s)) : '&nbsp;'", $this->asPhp($renderer), $html, $this->asPhp($field->getRendererArguments()));
    }
    else if ($field->isComponent())
    {
      return sprintf("get_component('%s', '%s', array('type' => 'list', '%s' => \$%s))", $this->getModuleName(), $field->getName(), $this->getSingularName(), $this->getSingularName());
    }
    else if ($field->isPartial())
    {
      return sprintf("get_partial('%s', array('type' => 'list', '%s' => \$%s))", $field->getName(), $this->getSingularName(), $this->getSingularName());
    }
    else if ('Date' == $field->getType())
    {
      $html = sprintf("false !== strtotime($html) ? format_date(%s, \"%s\") : '&nbsp;'", $html, $field->getConfig('date_format', 'f'));
    }
    else if ('Boolean' == $field->getType())
    {
      $html = sprintf("get_partial('%s/list_field_boolean', array('value' => %s))", $this->getModuleName(), $html);
    }

    if ($field->isLink())
    {
      $html = sprintf("link_to(%s, '%s', array_merge(array('sf_subject' => \$%s), laiguAdminTheme::xGetArray()), array('class'=>'laigu_ajax'))", $html, $this->getUrlForAction('edit'), $this->getSingularName());
    }

    return $html;
  }
}
