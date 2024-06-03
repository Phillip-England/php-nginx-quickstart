<?php

include 'src/http.php';
include 'src/components.php';
include 'src/router.php';
include 'src/templates.php';
include 'src/err.php';
include 'src/middleware.php';


$path = Http::getRawPath();

Router::add('/', function() {
    Middleware::chain(Templates::base('home'));
});

$err = Router::handleRequest($path);
if ($err->isSome()) {
    Router::notFound();
}

?>