<?php

class Http {

    public static function getRawPath() {
        return strtok($_SERVER["REQUEST_URI"], '?');
    }

    public static function getMethodAndPath() {
        return $_SERVER["REQUEST_METHOD"] . " " . self::getRawPath();
    }

}

?>