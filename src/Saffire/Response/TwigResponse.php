<?php

namespace Saffire\Response;

use Symfony\Component\HttpFoundation\Response;

class TwigResponse extends Response
{
    /**
     * @var mixed|string
     */
    private $template;

    /**
     * @var array
     */
    private $context = [];

    /**
     * @param string $template template name
     * @param array  $context
     * @param int    $status
     * @param array  $headers
     */
    public function __construct($template, $context = [], $status = 200, $headers = [])
    {
        parent::__construct(null, $status, $headers);
        $this->template = $template;
        $this->context = $context;
    }

    /**
     * @param \Twig_Environment $twig
     */
    public function renderContent(\Twig_Environment $twig)
    {
        $this->setContent($twig->render($this->getTemplate(), $this->getContext()));
    }

    /**
     * @return mixed|string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed|string $template
     *
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @return array
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param array $context
     *
     * @return $this
     */
    public function setContext(array $context)
    {
        $this->context = $context;

        return $this;
    }
}
