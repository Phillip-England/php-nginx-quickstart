# php-nginx-quickstart

This repo is intended to give you a quick foundation to build php applications intended to be deployed using nginx.

## Installation

Clone the repo:

```bash
git clone https://github.com/phillip-england/php-nginx-quickstart
```

Install dependencies:

```bash
composer install -d config
```

Serve locally:

```bash
php -S localhost:8080
```

## Nginx Config

Your local nginx configuration file is located at `./config/site.conf`

To copy the local configuration over to your systems default nginx configuration file, from the root of your project run:

```bash
./update.sh
```

## Single Entry-Point

This application style assumes `./index.php` will be the entrypoint for your application. If you intend to keeps things traditional and use the file system for routing, this approach will not work.

A utility function has been prepared to get the raw path:

```php
<?php

include 'src/http.php';

$path = Http::getRawPath();

if ($path == "/about") {
    echo "About";
} else {
    echo "Home";
}

?>
```

From here you can establish routing using an approach of your choice.

## Deployment

This project repo can be copied into an nginx server. After updating the config on the server and ensuring the proper version of php is installed, you should be solid.

The config provided will ensure all files on the server are secure minus `./update.sh` and `./README.md` which can be easily removed.