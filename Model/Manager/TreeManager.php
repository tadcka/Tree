<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\ModelManager;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 */
abstract class TreeManager implements TreeManagerInterface
{
    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $className = $this->getClass();
        $root = new $className;

        return $root;
    }
}
