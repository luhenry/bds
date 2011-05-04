<?php

/**
 * mlActivite form.
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mlActiviteForm extends BasemlActiviteForm {

    protected function removeFields() {
        mlMailForm::removeFields();

        unset($this['destinataires']);
    }

    public function doUpdateObject($values) {
        sfFormDoctrine::doUpdateObject($values);

        if ($this->isNew()) {
            $emails = array();

            foreach ($this->getObject()->getGaActivite()->getCoCotisants() as $cotisant)
                $emails[] = $cotisant->getEmail();

            $this->getObject()->setDestinataires(implode(', ', $emails));
        }
    }

}
