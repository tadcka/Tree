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
use Tadcka\Component\Tree\Model\NodeTranslationInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 6/1/14 8:03 PM
 */
interface NodeTranslationManagerInterface
{
    /**
     * Find node translation by node and language.
     *
     * @param NodeInterface $node
     * @param string $lang
     *
     * @return null|NodeTranslationInterface
     */
    public function findTranslationByNodeAndLang(NodeInterface $node, $lang);

    /**
     * Find many node translations by node.
     *
     * @param NodeInterface $node
     *
     * @return array|NodeTranslationInterface[]
     */
    public function findManyTranslationsByNode(NodeInterface $node);

    /**
     * Create new node translation.
     *
     * @return NodeTranslationInterface
     */
    public function create();

    /**
     * Add node translation object to persistent layer.
     *
     * @param NodeTranslationInterface $translation
     * @param bool $save
     */
    public function add(NodeTranslationInterface $translation, $save = false);

    /**
     * Remove node translation object from persistent layer.
     *
     * @param NodeTranslationInterface $translation
     * @param bool $save
     */
    public function remove(NodeTranslationInterface $translation, $save = false);

    /**
     * Save persistent layer.
     */
    public function save();

    /**
     * Clear node translation objects from persistent layer.
     */
    public function clear();

    /**
     * Get node translation object class name.
     *
     * @return string
     */
    public function getClass();
}
