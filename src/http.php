<?php

class Http {

    public static function getRawPath() {
        return strtok($_SERVER["REQUEST_URI"], '?');
    }

}

?>