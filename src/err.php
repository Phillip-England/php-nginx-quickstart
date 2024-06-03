<?php

class Result {
    private $value;
    private $error;
    private $isOk;

    private function __construct($value = null, $error = null, bool $isOk = true) {
        $this->value = $value;
        $this->error = $error;
        $this->isOk = $isOk;
    }

    public static function ok($value) {
        return new self($value, null, true);
    }

    public static function err($error) {
        return new self(null, $error, false);
    }

    public function isOk(): bool {
        return $this->isOk;
    }

    public function isErr(): bool {
        return !$this->isOk;
    }

    public function unwrap() {
        if ($this->isOk) {
            return $this->value;
        }
        throw new Exception("Tried to unwrap an Err value: " . $this->error);
    }

    public function unwrapErr() {
        if (!$this->isOk) {
            return $this->error;
        }
        throw new Exception("Tried to unwrapErr an Ok value: " . $this->value);
    }
}




class Option {
    private $value;
    private $isSome;

    private function __construct($value = null, bool $isSome = true) {
        $this->value = $value;
        $this->isSome = $isSome;
    }

    public static function some($value) {
        return new self($value, true);
    }

    public static function none() {
        return new self(null, false);
    }

    public function isSome(): bool {
        return $this->isSome;
    }

    public function isNone(): bool {
        return !$this->isSome;
    }

    public function unwrap() {
        if ($this->isSome) {
            return $this->value;
        }
        throw new Exception("Tried to unwrap a None value");
    }

    public function unwrapOr($default) {
        return $this->isSome ? $this->value : $default;
    }
}
