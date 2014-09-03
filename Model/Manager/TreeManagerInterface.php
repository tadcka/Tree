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

use Tadcka\Component\Tree\Model\TreeInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 */
interface TreeManagerInterface
{
    /**
     * Find tree by slug.
     *
     * @param string $slug
     *
     * @return null|TreeInterface
     */
    public function findTreeBySlug($slug);

    /**
     * Find many tree by slugs.
     *
     * @param array $slugs
     *
     * @return array|TreeInterface[]
     */
    public function findManyTreeBySlugs(array $slugs);

    /**
     * Create new tree object.
     *
     * @return TreeInterface
     */
    public function create();

    /**
     * Add tree object to persistent layer.
     *
     * @param TreeInterface $tree
     * @param bool $save
     */
    public function add(TreeInterface $tree, $save = false);

    /**
     * Remove tree object from persistent layer.
     *
     * @param TreeInterface $tree
     * @param bool $save
     */
    public function remove(TreeInterface $tree, $save = false);

    /**
     * Save persistent layer.
     */
    public function save();

    /**
     * Clear tree objects from persistent layer.
     */
    public function clear();

    /**
     * Get tree object class name.
     *
     * @return string
     */
    public function getClass();
}
