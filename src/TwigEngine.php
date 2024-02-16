<?php

namespace Fignon\Extra;

use Fignon\Extra\ViewEngine;

/**
 * This is just a bridge between Fignon framework and Twig
 *
 * For more customization, @see https://twig.symfony.com/
 *
 * When using this engine, you have to give the template with the extension
 *
 * E.g: 'example' for 'example.twig' or 'example.html.twig' or 'example.xml.twig'
 */
class TwigEngine implements ViewEngine
{
    protected $loader;
    protected $twig;

    public function init(string $templatePath = null, string $templateCachedPath = null, array $options = []): TwigEngine
    {
        if (null === $templateCachedPath || null === $templatePath) {
            throw new \Fignon\Error\TunnelError('Template path or cached path is not set');
        }

        $this->loader = new \Twig\Loader\FilesystemLoader($templatePath);

        $this->twig = new \Twig\Environment($this->loader, [
            'cache' => $templateCachedPath
        ]);

        return $this;
    }

    public function render(string $viewPath = '', $locals = [], array $options = []): string
    {
        if (null === $this->twig || null === $this->loader) {
            throw new \Fignon\Error\TunnelError('Template path or cached path is not set');
        }

        if (!\is_array($locals)) {
            throw new \Fignon\Error\TunnelError('Locals must be an array');
        }

        if ('' === $viewPath) {
            throw new \Fignon\Error\TunnelError('View path is empty');
        }

        return $this->twig->render($viewPath, $locals);
    }
}
