<?php

/**
 * sfWidgetFormTextareaMarkItUp represents a markItUp widget.
 *
 *
 * @package    BDS
 * @subpackage widget
 * @author
 * @version
 */
class sfWidgetFormEditor extends sfWidgetFormTextarea {

    /**
     * Configures the current widget.
     *
     * @param array $options     An array of options
     * @param array $attributes  An array of default HTML attributes
     *
     * @see sfWidgetForm
     */
    protected function configure($options = array(), $attributes = array()) {
        $this->addOption('width', '100%');
        $this->addOption('height', '280px');
        $this->addOption('controls', 'bold italic underline strikethrough removeformat | bullets numbering | undo redo | image link unlink | source');

        parent::configure($options, $attributes);
    }

    /**
     * @param  string $name        The element name
     * @param  string $value       The value selected in this widget
     * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
     * @param  array  $errors      An array of errors for the field
     *
     * @return string An HTML tag string
     *
     * @see sfWidgetForm
     */
    public function render($name, $value = null, $attributes = array(), $errors = array()) {
        $textarea = parent::render($name, $value, $attributes, $errors);
        $js = sprintf('<script type="text/javascript">$(document).ready(function(){$("textarea#%s").cleditor(%s);});</script>', $this->generateId($name), json_encode(array(
                            'width' => $this->getOption('width'),
                            'height' => $this->getOption('height'),
                            'controls' => $this->getOption('controls')))
        );

        return $textarea . $js;
    }

    /**
     * Gets the stylesheet paths associated with the widget.
     *
     * @return array An array of stylesheet paths
     */
    public function getStylesheets() {
        return array('/css/jquery.cleditor.css' => '');
    }

    /**
     * Gets the JavaScript paths associated with the widget.
     *
     * @return array An array of JavaScript paths
     */
    public function getJavascripts() {
        return array('/js/jquery.js', '/js/jquery.cleditor.min.js', '/js/jquery.cleditor.bbcode.min.js');
    }

}