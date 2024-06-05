<?php

include 'src/http.php';
include 'src/components.php';
include 'src/router.php';
include 'src/template.php';
include 'src/err.php';
include 'src/middleware.php';
include 'src/view.php';

$path = Http::getMethodAndPath();

Router::add('GET /', View::home());

$err = Router::handleRequest($path);
if ($err->isSome()) {
    Router::notFound();
}

?>