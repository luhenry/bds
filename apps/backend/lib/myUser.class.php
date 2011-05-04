<?php

class myUser extends sfGuardSecurityUser {

    public function getGuardUser() {
        if ( !$this->user && $id = $this->getAttribute('user_id', null, 'sfGuardSecurityUser') ) {
            $this->user = Doctrine_Core::getTable('coCotisant')->find($id);

            if ( !$this->user ) {
                // the user does not exist anymore in the database
                $this->signOut();

                throw new sfException('The user does not exist anymore in the database.');
            }
        }

        return $this->user;
    }

}
