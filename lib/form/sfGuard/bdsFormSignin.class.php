<?php

/**
 * Description of sfGuardFormSignin
 *
 * @author ludovic
 */
class bdsFormSignin extends sfGuardFormSignin {

    protected $_sites = array('bds' => 'bds', 'ae' => 'ae');

    /**
     * @see sfForm
     */
    public function configure() {
        $this->setWidget('site', new sfWidgetFormChoice(array('choices' => $this->_sites, 'label' => 'Identifiants')));
        $this->setValidator('site', new sfValidatorChoice(array('choices' => array_keys($this->_sites))));
        $this->setDefault('site', 'bds');

        $this->validatorSchema->setPostValidator(new bdsValidatorUser());
    }

}