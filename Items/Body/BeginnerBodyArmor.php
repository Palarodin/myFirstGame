<?php

class BeginnerBodyArmor extends BaseBodyArmor{
    public function __construct()
    {
        parent::__construct('Броня Новичка');
        $this->setArmor(10);
    }
}