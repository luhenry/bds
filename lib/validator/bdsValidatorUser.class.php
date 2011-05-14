<?php

/**
 * Description of bdsValidatorUser
 *
 * @author ludovic
 */
class bdsValidatorUser extends sfGuardValidatorUser {

    protected function doClean($values) {
        $username = isset($values[$this->getOption('username_field')]) ? $values[$this->getOption('username_field')] : '';
        $password = isset($values[$this->getOption('password_field')]) ? $values[$this->getOption('password_field')] : '';
        $site = isset($values['site']) ? $values['site'] : 'bds';

        $allowEmail = sfConfig::get('app_sf_guard_plugin_allow_login_with_email', true);
        $method = $allowEmail ? 'retrieveByUsernameOrEmailAddress' : 'retrieveByUsername';

        // don't allow to sign in with an empty username
        if ($username) {
            if (($callable = sfConfig::get('app_sf_guard_plugin_retrieve_by_username_callable'))) {
                $user = call_user_func_array($callable, array($username));
            } else {
                $user = $this->getTable()->$method($username);
            }

            // user exists?
            if ($user && $user->getIsActive()) {
                // password is ok?
                switch ($site) {
                    case 'bds':
                        if ($user->checkPassword($password)) {
                            return array_merge($values, array('user' => $user));
                        }

                        break;
                    case 'ae':
                        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
                            throw new sfValidatorError($this, "Pour se connecter avec les identifiants AE, une adresse email doit être utiliser");
                        }

                        $client = new Zend_Http_Client('https://ae.utbm.fr/sso.php');
                        $client->setParameterPost('api_key', sfConfig::get('app_ae_sso_api_key'));
                        $client->setParameterPost('mode', 0);
                        $client->setParameterPost('username', $username);
                        $client->setParameterPost('password', $password);
                        $response = $client->request(Zend_Http_Client::POST);

                        if ($response->getBody() === '1') {
                            return array_merge($values, array('user' => $user));
                        }

                        break;
                    default:
                        throw new sfValidatorError($this, 'invalid');
                }
            }
        }

        if ($this->getOption('throw_global_error')) {
            throw new sfValidatorError($this, 'invalid');
        }

        throw new sfValidatorErrorSchema($this, array($this->getOption('username_field') => new sfValidatorError($this, 'invalid')));
    }

}
