<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\DependencyInjection;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/5/14 12:40 AM
 */
class RegisterNotTypeConfigPass extends AbstractConfigPass
{
    /**
     *{@inheritdoc}
     */
    protected function methodCall()
    {
        return 'register';
    }
}
