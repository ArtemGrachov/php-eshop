<?php
$locale = isset($_COOKIE[$LOCALE]) ? $_COOKIE[$LOCALE] : 'en';

require_once(__DIR__ . "/../i18n/$locale.php");

class ServiceI18n {
    private static $instance = null;

    public static function getInstance() {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct() {}

    public static function t($key, $params = null) {
        global $TRANSLATIONS;

        $translationKeys = explode('.', $key);

        $result = $TRANSLATIONS;

        foreach ($translationKeys as $trKey) {
            if (isset($result[$trKey])) {
                $result = $result[$trKey];
            } else {
                break;
            }
        }

        if (!is_string($result)) {
            return $key;
        }

        if (!is_null($params)) {
            foreach ($params as $pKey => $pValue) {
                $intpKey = '{' . $pKey . '}';
                 $result = str_replace($intpKey, $pValue, $result);
            }
        }

        return $result;
    }
}
