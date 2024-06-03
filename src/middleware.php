<?php

class Middleware {

    public static function chain(null $handler, callable ...$middleware) {
        foreach ($middleware as $m) {
            $m();
        }
        $handler;
    }

}