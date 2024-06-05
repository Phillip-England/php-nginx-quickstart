<?php

class Middleware {

    public static function chain($handler, callable ...$middleware) {
        foreach ($middleware as $m) {
            $m();
        }
        $handler;
    }

}