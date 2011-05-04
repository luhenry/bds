<?php

/**
 * sfWidgetFormSemestre
 *
 * @package    BDS
 * @subpackage widget
 * @author     Ludovic Henry
 */
class sfWidgetFormSemestre extends sfWidgetForm {

    public function __construct($options = array(), $attributes = array()) {
        $this->addOption('season', array(
            'choices' => array('A' => 'A', 'P' => 'P')
        ));

        $this->addOption('year', array(
            'choices' => array_combine($range = range(10, date('y') + 3), $range)
        ));

        parent::__construct($options, $attributes);
    }

    /**
     * @param  string $name        The element name
     * @param  string $value       The date and time displayed in this widget. Must be of the form 1 letter representing the season and a year ( e.g: A2010, A10, P42, A1998 )
     * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
     * @param  array  $errors      An array of errors for the field
     *
     * @return string An HTML tag string
     *
     * @see sfWidgetForm
     */
    public function render($name, $value = null, $attributes = array(), $errors = array()) {
        if (is_array($value))
            $value = implode('', $value);

        return strtr('<div id="%div.id%">%season.widget%%year.widget%</div>', array(
            '%div.id%' => $this->generateId($name),
            '%season.widget%' => $this->getSeasonWidget($attributes)->render($name . '[season]', ( $value !== null ? substr($value, 0, 1) : (($m = date('m')) > 1 && $m < 8 ? 'P' : 'A'))),
            '%year.widget%' => $this->getYearWidget($attributes)->render($name . '[year]', $value != null ? substr($value, 1) : date('y'))
        ));
    }

    /**
     *
     * @param array $attributes
     * @return sfWidgetFormChoice
     */
    protected function getSeasonWidget($attributes = array()) {
        return new sfWidgetFormChoice($this->getOptionsFor('season'), $this->getAttributesFor('season', $attributes));
    }

    /**
     *
     * @param array $attributes
     * @return sfWidgetFormDate
     */
    protected function getYearWidget($attributes = array()) {
        return new sfWidgetFormChoice($this->getOptionsFor('year'), $this->getAttributesFor('year', $attributes));
    }

    /**
     * Returns an array of options for the given type.
     *
     * @param  string $type  The type (date or time)
     *
     * @return array  An array of options
     *
     * @throws InvalidArgumentException when option date|time type is not array
     */
    protected function getOptionsFor($type) {
        $options = $this->getOption($type);

        if (!is_array($options)) {
            throw new InvalidArgumentException(sprintf('You must pass an array for the %s option.', $type));
        }

        // add id_format if it's not there already
        $options += array('id_format' => $this->getOption('id_format'));

        return $options;
    }

    /**
     * Returns an array of HTML attributes for the given type.
     *
     * @param  string $type        The type (date or time)
     * @param  array  $attributes  An array of attributes
     *
     * @return array  An array of HTML attributes
     */
    protected function getAttributesFor($type, $attributes) {
        $defaults = isset($this->attributes[$type]) ? $this->attributes[$type] : array();

        return isset($attributes[$type]) ? array_merge($defaults, $attributes[$type]) : $defaults;
    }

}