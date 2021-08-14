<?php

namespace app\core;

class Route
{
    private string $name;
    private string $path;
    private $callback;

    public function __construct(string $path, $callback)
    {
        $this->path = $path;
        $this->callback = $callback;
    }

    public function name($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getCallback()
    {
        return $this->callback ?? false;
    }
}

?>