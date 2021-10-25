<?php

class BaseHelmet extends BaseItem {
    public function __construct(string $name)
    {
        parent::__construct($name, 'helmet');
        $this->setStrength(5);
    }
}