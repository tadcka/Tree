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
interface NodeTranslationInterface
{
    /**
     * Set treeItem.
     *
     * @param NodeInterface $node
     *
     * @return NodeTranslationInterface
     */
    public function setNode(NodeInterface $node);

    /**
     * Get treeItem.
     *
     * @return NodeInterface
     */
    public function getNode();

    /**
     * Set lang.
     *
     * @param string $lang
     *
     * @return NodeTranslationInterface
     */
    public function setLang($lang);

    /**
     * Get lang.
     *
     * @return string
     */
    public function getLang();

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return NodeTranslationInterface
     */
    public function setTitle($title);

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return NodeTranslationInterface
     */
    public function setDescription($description);

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription();
}
