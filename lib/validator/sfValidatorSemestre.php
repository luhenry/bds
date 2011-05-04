<?php

/**
 * Description of sfValidatorSemestre
 *
 * @author ludovic
 */
class sfValidatorSemestre extends sfValidatorBase {

    protected function doClean($value) {
        if (!is_array($value))
            throw new sfValidatorError($this, 'invalid');

        try {
            $season = new sfValidatorString(array('min_length' => 1, 'max_length' => 1, 'required' => true));
            $value['season'] = $season->clean(isset($value['season']) ? $value['season'] : null);
            
            $year = new sfValidatorNumber(array('min' => 10, 'max' => date('y') + 3, 'required' => true));
            $value['year'] = $year->clean(isset($value['year']) ? $value['year'] : null);
        } catch (sfValidatorError $e) {
            throw new sfValidatorError($this, 'invalid');
        }

        return $value['season'] . substr($value['year'], -2);
    }

}