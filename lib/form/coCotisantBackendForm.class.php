<?php

class coCotisantBackendForm extends CoCotisantForm {

    protected function removeFields() {
        unset(
                $this['photo_id'],
                $this['certificat_content_type'],
                $this['deleted_at'],
                $this['algorithm'],
                $this['salt'],
                $this['username'],
                $this['slug'],
                $this['is_active'],
                $this['is_super_admin'],
                $this['updated_at'],
                $this['created_at'],
                $this['last_login'],
                $this['groups_list'],
                $this['permissions_list'],
                $this['password'],
                $this['sp_sports_list'],
                $this['ga_activites_list'],
                $this['postes_list']
        );
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'nom' => new sfWidgetFormInputText(),
            'prenom' => new sfWidgetFormInputText(),
            'email' => new sfWidgetFormInputText(),
            'semestre_debut_cotisation' => new sfWidgetFormSemestre(),
            'semestre_fin_cotisation' => new sfWidgetFormSemestre(),
            'duree_cotisation' => new sfWidgetFormChoice(array(
                'choices' => array('' => '', '1' => 'Semestre', '2' => 'Année')
            )),
            'date_certificat' => new sfWidgetFormDate(array(
                'format' => '%day%/%month%/%year%',
                'can_be_empty' => false,
                'years' => array_combine(range(date('Y') - 1, date('Y') + 2), range(date('Y') - 1, date('Y') + 2)),
                'empty_values' => array('year' => date('Y'), 'month' => date('m'), 'day' => date('j'))
            )),
            'certificat' => is_null($this->getObject()->getCertificat()) ? new sfWidgetFormInputFile() : new sfWidgetFormInputFileEditable(array(
                        'file_src' => sprintf('/uploads/certificats/%s', $this->getObject()->getCertificat()),
                        'edit_mode' => !$this->isNew,
                        'with_delete' => false,
                        'is_image' => false,
                        'template' => '%input%<span style="margin-left:30px"><a href="%file%">Lien vers le fichier</a></span>'
                    ))
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'certificat' => new sfValidatorFile(array('required' => false), array('invalid' => 'Ce certificat est invalide')),
            'email' => new sfValidatorEmail(array('required' => false), array('invalid' => 'Cette adresse email est invalide')),
            'nom' => new sfValidatorText(array(), array('required' => 'Un nom est requis', 'invalid' => 'Ce nom est invalide')),
            'prenom' => new sfValidatorText(array(), array('required' => 'Un prénom est requis', 'invalid' => 'Ce prénom est invalide')),
            'semestre_fin_cotisation' => new sfValidatorSemestre(),
            'semestre_debut_cotisation' => new sfValidatorSemestre(),
            'duree_cotisation' => new sfValidatorChoice(array('choices' => array('', '1', '2'), 'required' => false))
        ));
    }

    protected function configureRelations() {
        $this->embedRelation('phPhoto as photo', 'phPhotoCoCotisantForm');
    }

    public function doUpdateObject($values) {
        sfProjectConfiguration::getActive()->loadHelpers(array('Text'));
        
        if (!($values['certificat'] instanceof sfValidatedFile))
            unset($values['certificat']);

        if ($values['duree_cotisation'] !== '') {
            switch ($values['duree_cotisation']) {
                case '1':
                    $values['semestre_fin_cotisation'] = $values['semestre_debut_cotisation'];
                    break;
                case '2':
                    if (substr($values['semestre_debut_cotisation'], 0, 1) === 'A')
                        $values['semestre_fin_cotisation'] = 'P' . (substr($values['semestre_debut_cotisation'], 1, 2) + 1);
                    else
                        $values['semestre_fin_cotisation'] = 'A' . substr($values['semestre_debut_cotisation'], 1, 2);
                    break;
            }

            unset($values['duree_cotisation']);
        }

        if ($values['email'] === '')
            $values['email'] = Doctrine_Inflector::urlize($values['prenom']) . '.' . Doctrine_Inflector::urlize($values['nom']) . '@utbm.fr';

        $values['nom'] = uppercase($values['nom']);
        $values['prenom'] = uppercase($values['prenom']);

        parent::doUpdateObject($values);

        if (isset($values['certificat']) && ( $certificat = $values['certificat'] )) {
            $path = sfConfig::get('sf_upload_dir') . '/certificats/';
            $filename = $certificat->generateFilename();

            if (file_exists($path . $this->getObject()->getCertificat()))
                unlink($path . $this->getObject()->getCertificat());

            $certificat->save($path . $filename);

            $this->getObject()->setCertificat($filename);
            $this->getObject()->setCertificatContentType($certificat->getType());
        }

        $this->getObject()->setUniqueUsername($values['prenom'], $values['nom']);

        if (is_null($this->getObject()->getAlgorithm()))
            $this->getObject()->setAlgorithm('sha1');
    }

    public function updateObject($values = null) {
        if (null === $values)
            $values = $this->values;

        $this->updateObjectEmbeddedForms($values);

        $values = $this->processValues($values);

        $this->doUpdateObject($values);

        return $this->getObject();
    }

}
