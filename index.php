<?php

include 'src/http.php';

$path = Http::getRawPath();

if ($path == "/about") {
    echo "About";
} else {
    echo "Home";
}

?>