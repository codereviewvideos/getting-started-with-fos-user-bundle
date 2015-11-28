<?php

namespace ChrisUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ChrisUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
