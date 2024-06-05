<?php


class View {

    public static function home() {
        Template::base('home', function() {
            ?>
                <h1>Home</h1>
            <?php
        });
    }


}