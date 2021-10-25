<?php

class BeginnerHelmet extends BaseHelmet {
    public function __construct()
    {
        parent::__construct('Шлем Новичка');
        $this->setArmor(5);
    }
}