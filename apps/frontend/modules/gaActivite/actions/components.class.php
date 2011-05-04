<?php

/**
 * Description of gaActiviteComponents
 *
 * @author ludovic
 */
class gaActiviteComponents extends sfComponents {

    public function executeMenu() {
        $this->activites = gaActiviteTable::getInstance()->getList(ListDetail::NONE);
    }

}