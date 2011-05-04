<?php

/**
 * mlMailer actions.
 *
 * @package    BDS
 * @subpackage mlMailer
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mlMailerActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->form = new mailerForm();

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));

            if ($this->form->isValid()) {
                $values = $this->form->getValues();

                switch ($values['destinataires']) {
                    case 'cotisants':
                        $data = Doctrine_Query::create()->select('email')->from('coCotisant')->fetchArray();
                        break;
                    case 'cotisants.actif':
                        $data = Doctrine_Query::create()->select('email')->from('coCotisant')->where('is_actif = true')->fetchArray();
                        break;
                    case 'cotisants.inactif':
                        $data = Doctrine_Query::create()->select('email')->from('coCotisant')->where('is_actif = false')->fetchArray();
                        break;
                }

                $emails = array();

                foreach ($data as $row)
                    $emails[] = $row['email'];

                $message = Swift_Message::newInstance()
                                ->setSender('bds@utbm.fr')
                                ->setBcc($emails)
                                ->setSubject($values['objet'])
                                ->setBody($values['message'])
                                ->setContentType('text/html')
                                ->setCharset('utf-8');

                $this->getMailer()->send($message);
            }
        }
    }

}
