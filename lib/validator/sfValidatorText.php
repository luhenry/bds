<?php

/**
 * Description of sfValidatorInputText
 *
 * @author ludovic
 */
class sfValidatorText extends sfValidatorString {

    protected function doClean($value) {
        return sfValidatorString::doClean(strip_tags(html_entity_decode($value)), true);
    }

}