<?php

namespace mvc\core\router;

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

    public function check($path)
    {
        $pattern = "@^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($this->getPath())) . "$@D";
        return preg_match($pattern, $path);
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