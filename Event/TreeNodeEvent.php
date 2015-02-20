<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
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
     * @var string
     */
    private $locale;

    /**
     * Constructor.
     *
     * @param string $locale
     * @param NodeInterface $node
     */
    public function __construct($locale, NodeInterface $node)
    {
        $this->locale = $locale;
        $this->node = $node;
    }

    /**
     * Get locale.
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
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
