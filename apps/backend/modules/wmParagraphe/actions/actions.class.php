<?php

require_once dirname(__FILE__).'/../lib/wmParagrapheGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/wmParagrapheGeneratorHelper.class.php';

/**
 * wmParagraphe actions.
 *
 * @package    BDS
 * @subpackage wmParagraphe
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wmParagrapheActions extends autoWmParagrapheActions
{
    public function executeListValidate (){
       $paragraphe = $this->getRoute()->getObject();

       $paragraphe->setIsValide(!$paragraphe->getIsValide());
       
       $paragraphe->save();

       $this->redirect('wm_paragraphe');
    }
}
