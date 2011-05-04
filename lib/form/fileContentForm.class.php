<?php

/**
 * Description of fileContentForm
 *
 * @author ludovic
 */
class fileContentForm extends BaseForm {

    public function configure() {
        BaseForm::configure();

        $this->widgetSchema->setNameFormat('file_content[%s]');
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'contenu' => new sfWidgetFormTextarea(array('default' => file_get_contents($this->getOption('file'))), array('rows' => '', 'cols' => '', 'style' => 'width:100%;min-width:500px;min-height:400px'))
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'contenu' => new sfValidatorString(array('required' => false))
        ));
    }

}