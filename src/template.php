<?php

class Template {

    public static function base(string $title, callable $content) {
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title><?= $title ?></title>
            </head>
            <body>
                <div>
                    <?= $content() ?>
                </div>
            </body>
            </html>
        <?php

    }

}

?>