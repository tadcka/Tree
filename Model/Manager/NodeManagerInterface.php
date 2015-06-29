<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Model\Manager;

use Tadcka\Component\Tree\Model\NodeInterface;
use Tadcka\Component\Tree\Model\TreeInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 */
interface NodeManagerInterface
{
    /**
     * Find node by id.
     *
     * @param int $id
     *
     * @return null|NodeInterface
     */
    public function findNodeById($id);

    /**
     * Find node parents.
     *
     * @param NodeInterface $node
     *
     * @return array|NodeInterface[]
     */
    public function findNodeParents(NodeInterface $node);

    /**
     * Find root node.
     *
     * @param TreeInterface $tree
     *
     * @return null|NodeInterface
     */
    public function findRootNode(TreeInterface $tree);

    /**
     * Find existing node types.
     *
     * @param TreeInterface $tree
     *
     * @return array
     */
    public function findExistingNodeTypes(TreeInterface $tree);

    /**
     * Find many nodes by type.
     *
     * @param string $type
     * @param TreeInterface $tree
     *
     * @return array|NodeInterface[]
     */
    public function findManyNodesByType($type, TreeInterface $tree);

    /**
     * Create new node object.
     *
     * @return NodeInterface
     */
    public function create();

    /**
     * Add node object to persistent layer.
     *
     * @param NodeInterface $node
     * @param bool $save
     */
    public function add(NodeInterface $node, $save = false);

    /**
     * Remove node object from persistent layer.
     *
     * @param NodeInterface $node
     * @param bool $save
     */
    public function remove(NodeInterface $node, $save = false);

    /**
     * Save persistent layer.
     */
    public function save();

    /**
     * Clear node objects from persistent layer.
     */
    public function clear();

    /**
     * Get node object class name.
     *
     * @return string
     */
    public function getClass();
}
