<?php

namespace ThunderCore\Language;

class TranslatableListener extends \Gedmo\Translatable\TranslatableListener
{
    public function __construct()
    {
        parent::__construct();
        $this->setDefaultLocale('en');
    }
}
