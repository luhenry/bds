<?php

/**
 * Laigu Admin Theme
 *
 * @author: Magí Carbonell <mcarbonell@laigu.net>
 *
 */
class laiguAdminTheme
{
  /*
   * Agafa els parametres que tenim per get i els prepara en forma de url
   */
  public static function xGet()
  {
    $perGet = sfContext::getInstance()->getRequest()->getParameter('xget');

    if(empty($perGet)) return '';
    $petGetString = '';
    foreach($perGet as $key => $value)
    {
      $petGetString .= "xget[$key]=$value&";
    }
    return substr($petGetString, 0, -1);
  }

  public static function xGetArray()
  {
    $perGet = sfContext::getInstance()->getRequest()->getParameter('xget');

    if(empty($perGet)) return array();
    $petGetString = array();
    foreach($perGet as $key => $value)
    {
      $petGetString["xget[$key]"] = $value;
    }
    return $petGetString;
  }

  /*
   * Agafa els parametres que tenim per get i els preparaper posar en un formulari
   */
  public static function xGetSubmit()
  {
    $perGet = sfContext::getInstance()->getRequest()->getParameter('xget');

    if(empty($perGet)) return '';

    $petGetString = '';
    foreach($perGet as $key => $value)
    {
      $petGetString .= '<input type="hidden" value="'.$value.'" name="xget['.$key.']" /> ';
    }

    return $petGetString;
  }

}
