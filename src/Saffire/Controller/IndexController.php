<?php

namespace Saffire\Controller;

use Saffire\Response\TwigResponse;

class IndexController
{
    public function indexAction()
    {
        return (new TwigResponse('controllers/index.twig', [], 200))
            ->setTtl(10) // Cache does not invalidate in production mode!
            ;
    }
}
