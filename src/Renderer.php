<?php

namespace App;

/**
 *  render an view
 */
class Renderer
{
    const DEFAULT_NAMESPACE = '__MAIN';

    private $paths = [];

    public function addPath(string $namespace, string $path): void
    {
        if (is_null($path)) {
            $this->paths[self::DEFAULT_NAMESPACE] = $namespace;
        } else {
            $this->paths[$namespace] = $path . '/' . $namespace;
        }
    }

    public function render(string $view): string
    {
        if ($this->hasNamespace($view)) {
            $path = $this->replaceNamespace($view) . '.php';
        } else {
            $path = $this->paths[self::DEFAULT_NAMESPACE] . DIRECTORY_SEPARATOR . $view . '.php';
        }
        ob_start();
        require $this->replaceNamespace($view) . '.php';
        return ob_get_clean();
    }

    public function hasNamespace(string $view): bool
    {
        return $view[0] === '@';
    }

    public function getNamespace(string $view): string
    {
        return substr($view, 1, strpos($view, '/') - 1);
    }

    public function replaceNamespace(string $view): string
    {
        $namespace = $this->getNamespace(($view));
        return str_replace('@' . $namespace, $this->paths[$namespace], $view);
    }
}
