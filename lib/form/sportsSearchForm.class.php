<?php

/**
 * Description of sportsSearchForm
 *
 * @author ludovic
 */
class sportsSearchForm extends BaseForm {

    public function configure() {
        $this->setWidget('recherche', new sfWidgetFormInputText());
        $this->setDefault('recherche', $this->getOption('recherche'));
        $this->setValidator('recherche', new sfValidatorString());     
    }

}