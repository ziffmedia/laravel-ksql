<?php

namespace ZiffMedia\LaravelKsql;

class ResourceManager extends \ArrayObject
{
    public function __get(string $name)
    {
        return $this[$name];
    }

    public function __set(string $name, $value): void
    {
        $this[$name] = $value;
    }
}
