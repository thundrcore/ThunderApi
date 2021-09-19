<?php

namespace ThunderCore\Language;

interface LanguageModulesInterface{
    /**
     * @return array
     */
    public static function getPermissionList();

    /**
     * @param $key
     * @param string $lang
     * @return string
     */
    public function trans($key, $lang = '');

    /**
     * @return array
     */
    public function getUrls();
}
