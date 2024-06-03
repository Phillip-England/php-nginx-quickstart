# php-nginx-quickstart

This repo is intended to give you a quick foundation to build php applications intended to be deployed using nginx.

## Installation

Clone the repo:

```bash
git clone https://github.com/phillip-england/php-nginx-quickstart
```

Install dependencies:

```bash
composer install
```

Serve locally:

```bash
php -S localhost:8080
```

## Nginx Config

Your local nginx configuration file is located at `./site.conf`

To copy the local configuration over to your systems default nginx configuration file, from the root of your project run:

```bash
./scripts/conf.sh
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

This project repo can be copied into an nginx server. After updating the nginx config on the server and ensuring the proper version of php is installed, you should be solid.

### Railway

I've testing this and it deploys to [Railway](https://railway.app) very easily. Simply connect railway to your github repo and it will autoread the Dockerfile and set up your server. Only caveat is you need to set a `PORT=8080` as an env in railway for your application.