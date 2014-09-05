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

use Tadcka\Component\Tree\Model\NodeInterface;
use Tadcka\Component\Tree\Registry\NodeType\NodeTypeConfig;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/5/14 1:51 AM
 */
interface NodeProviderInterface
{
    /**
     * Get active node types.
     *
     * @param NodeInterface $node
     *
     * @return array
     */
    public function getActiveNodeTypes(NodeInterface $node);

    /**
     * Get node type config.
     *
     * @param string $nodeType
     *
     * @return null|NodeTypeConfig
     */
    public function getNodeTypeConfig($nodeType);
}
