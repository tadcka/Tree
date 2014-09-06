<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Provider;

use Tadcka\Component\Tree\Exception\TreeNotFoundException;
use Tadcka\Component\Tree\Model\TreeInterface;
use Tadcka\Component\Tree\Registry\Tree\TreeConfig;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/6/14 2:27 AM
 */
interface TreeProviderInterface
{
    /**
     * Get tree.
     *
     * @param string $slug
     *
     * @return TreeInterface
     *
     * @throws TreeNotFoundException
     */
    public function getTree($slug);

    /**
     * Get tree config.
     *
     * @param string $slug
     *
     * @return null|TreeConfig
     */
    public function getTreeConfig($slug);
}
