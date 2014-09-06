<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Event;

use Symfony\Component\EventDispatcher\Event;
use Tadcka\Component\Tree\Model\NodeInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/6/14 2:12 PM
 */
class TreeNodeEvent extends Event
{
    /**
     * @var NodeInterface
     */
    private $node;

    /**
     * Constructor.
     *
     * @param NodeInterface $node
     */
    public function __construct(NodeInterface $node)
    {
        $this->node = $node;
    }

    /**
     * Get node.
     *
     * @return NodeInterface
     */
    public function getNode()
    {
        return $this->node;
    }
}
