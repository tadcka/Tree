<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Model;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 */
interface TreeInterface
{
    /**
     * Set slug.
     *
     * @param string $slug
     *
     * @return TreeInterface
     */
    public function setSlug($slug);

    /**
     * Get slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get createdAt.
     *
     * @return \Datetime
     */
    public function getCreatedAt();

    /**
     * Set updatedAt.
     *
     * @param \Datetime $updatedAt
     *
     * @return TreeInterface
     */
    public function setUpdatedAt(\DateTime $updatedAt);

    /**
     * Get updatedAt.
     *
     * @return \Datetime
     */
    public function getUpdatedAt();

    /**
     * Set nodes.
     *
     * @param array|NodeInterface[] $nodes
     *
     * @return TreeInterface
     */
    public function setNodes($nodes);

    /**
     * Get nodes.
     *
     * @return array|NodeInterface[]
     */
    public function getNodes();

    /**
     * Add node.
     *
     * @param NodeInterface $node
     */
    public function addNode(NodeInterface $node);

    /**
     * Remove node.
     *
     * @param NodeInterface $node
     */
    public function removeNode(NodeInterface $node);
}
