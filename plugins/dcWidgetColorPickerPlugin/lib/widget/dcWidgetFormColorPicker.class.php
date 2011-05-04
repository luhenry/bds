<?php
/*
 * This file is part of the dcWidgetColorPickerPlugin package.
 * (c) Daniele Cesarini <daniele.cesarini@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * dcWidgetFormColorPicker: generates a Jquery Colorpicker widget. Javascript from http://www.eyecon.ro/colorpicker/
 *
 * @package    symfony
 * @subpackage form
 * @author     Daniele Cesarini <daniele.cesarini@gmail.com>
 */

class dcWidgetFormColorPicker extends sfWidgetFormInput
{
  /**
   * Gets the Stylesheets paths associated with the widget.
   *
   * @return array An array of Stylesheets paths
   */
  public function getStylesheets()
  {
    return array('/dcWidgetColorPickerPlugin/css/colorpicker.css' => 'screen');
  }

  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavascripts()
  {
    return array('/dcWidgetColorPickerPlugin/js/colorpicker.js');
  }

 public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    use_helper("jQuery");

    $attributes['style'] = "width: 4em;";
    $html = parent::render($name, $value, $attributes, $errors);

    $html .= "
   <script type=\"text/javascript\">
     $(document).ready(function() {
       $('#" . $this->generateId($name) . "').css('backgroundColor', '#' + '" . (($value) ? $value : 'ffffff') . "');

       $('#" . $this->generateId($name) . "').ColorPicker({
          onShow: function (colpkr) {
            $(colpkr).fadeIn(500);
            return false;
          },
          onHide: function (colpkr) {
            $(colpkr).fadeOut(500);
            return false;
          },
          onChange: function (hsb, hex, rgb) {
            $('#" . $this->generateId($name) . "').css('backgroundColor', '#' + hex);
          },
          onSubmit: function(hsb, hex, rgb, el) {
            $(el).val(hex);
            $(el).ColorPickerHide();
          },
          onBeforeShow: function () {
            $(this).ColorPickerSetColor(this.value);
          }

       })
       .bind('keyup', function(){
         $(this).ColorPickerSetColor(this.value);
       });
     });
   </script>
    ";

    return $html;
  }
}
