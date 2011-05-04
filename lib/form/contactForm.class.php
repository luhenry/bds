<?php

/**
 * Used to send an email to the BDS
 *
 * @package    BDS
 * @subpackage form_custom
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactForm extends BaseForm {

    public function __construct($defaults = array(), $options = array(), $CSRFSecret = null) {
        parent::__construct($defaults, $options, false);
    }

    public function configure() {
        parent::configure();

        $user = $this->getOption('user');

        if ($user !== null) {
            $nom = (string) $user;
            $email = $user->getEmail();
        } else {
            $nom = $email = null;
        }

        $request = $this->getOption('request');

        $this->setDefaults(array(
            'nom' => $request->getParameter('nom', $nom),
            'email' => $request->getParameter('email', $email),
            'sujet' => $request->getParameter('sujet'),
            'contenu' => $request->getParameter('contenu')
        ));

        $this->widgetSchema->setNameFormat('contact[%s]');
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'nom' => new sfWidgetFormInputText(),
            'email' => new sfWidgetFormInputText(),
            'sujet' => new sfWidgetFormInputText(),
            'contenu' => new sfWidgetFormTextArea(array(), array('style' => 'width:100%', 'rows' => '20'))
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'nom' => new sfValidatorString(),
            'email' => new sfValidatorEmail(),
            'sujet' => new sfValidatorText(),
            'contenu' => new sfValidatorText()
        ));
    }

}