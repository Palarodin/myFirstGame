<?php

class BodyArmor extends BaseItem {
    public function __construct()
    {
        parent::__construct('Нагрудник', 'body');

        $this->setArmor(50);
        $this->setEndurance(70);
    }
}