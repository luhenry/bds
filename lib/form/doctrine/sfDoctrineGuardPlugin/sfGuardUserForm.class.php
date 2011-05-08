<?php

/**
 * sfGuardUser form.
 *
 * @package    BDS
 * @subpackage form_doctrine
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm {

    protected function removeFields() {
        unset(
                $this['id'],
                $this['photo_id'],
                $this['username'],
                $this['slug'],
                $this['email'],
                $this['algorithm'],
                $this['salt'],
                $this['password'],
                $this['last_login'],
                $this['created_at'],
                $this['updated_at'],
                $this['sp_sports_list'],
                $this['ga_activites_list'],
                $this['postes_list'],
                $this['nom'],
                $this['prenom'],
                $this['branche'],
                $this['semestre'],
                $this['semestre_debut_cotisation'],
                $this['semestre_fin_cotisation'],
                $this['date_certificat'],
                $this['certificat'],
                $this['certificat_content_type'],
                $this['is_actif']
        );
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'groups_list' => new sfWidgetFormDoctrineSelectDoubleList(array('model' => 'sfGuardGroup')),
            'permissions_list' => new sfWidgetFormDoctrineSelectDoubleList(array('model' => 'sfGuardPermission'))
        ));
    }

}
