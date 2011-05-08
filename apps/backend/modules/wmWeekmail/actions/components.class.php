<?php

class wmWeekmailComponents extends sfComponents {

    public function executeRender() {
        sfProjectConfiguration::getActive()->loadHelpers(array('Text'));

        $paragraphes = '';
        $paragraphe_layout = file_get_contents(sfConfig::get('sf_data_dir') . '/mailer/weekmail/layout_paragraphe.html');

        foreach ($this->weekmail->getParagraphes() as $p) {
            $paragraphes .= strtr($paragraphe_layout, array('%titre%' => $p->getTitre(), '%contenu%' => parse_bbcode($p->getContenu())));
        }

        $this->render = strtr(file_get_contents(sfConfig::get('sf_data_dir') . '/mailer/weekmail/layout.html'), array(
                    '%introduction%' => parse_bbcode($this->weekmail->getIntroduction()),
                    '%blague%' => parse_bbcode($this->weekmail->getBlague()),
                    '%conclusion%' => parse_bbcode($this->weekmail->getConclusion()),
                    '%paragraphes%' => $paragraphes
                ));
    }

}