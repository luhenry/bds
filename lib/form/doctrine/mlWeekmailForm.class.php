<?php

/**
 * mlWeekmail form.
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mlWeekmailForm extends BasemlWeekmailForm {

    protected function configureWidgets() {
        $this->setWidgets(array(
            'objet' => new sfWidgetFormInputText(),
            'contenu' => new sfWidgetFormTextareaTinyMCE(array('width' => '100%', 'height' => '800px', 'config' => '
               convert_urls : false,
               plugins : "autolink,lists,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
               theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
               theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,preview,|,forecolor,backcolor",
               theme_advanced_buttons3 : "tablecontrols,|,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,|,fullscreen"
             '))
        ));
    }

}