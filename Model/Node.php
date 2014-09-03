<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Model;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 */
class Node implements NodeInterface
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var int
     */
    protected $priority;

    /**
     * @var NodeInterface
     */
    protected $parent;

    /**
     * @var array|NodeInterface[]
     */
    protected $children;

    /**
     * @var array|NodeTranslationInterface[]
     */
    protected $translations;

    /**
     * @var TreeInterface
     */
    protected $tree;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->children = array();
        $this->translations = array();
        $this->priority = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * {@inheritdoc}
     */
    public function setParent(NodeInterface $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * {@inheritdoc}
     */
    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * {@inheritdoc}
     */
    public function addChild(NodeInterface $child)
    {
        $this->children[] = $child;
    }

    /**
     * {@inheritdoc}
     */
    public function removeChild(NodeInterface $child)
    {
        // TODO: Implement removeChild() method.
    }

    /**
     * {@inheritdoc}
     */
    public function setTranslations($translations)
    {
        $this->translations = $translations;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * {@inheritdoc}
     */
    public function getTranslation($lang)
    {
        foreach ($this->translations as $translation) {
            if ($lang === $translation->getLang()) {
                return $translation;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function addTranslation(NodeTranslationInterface $translation)
    {
        $this->translations[] = $translation;
    }

    /**
     * {@inheritdoc}
     */
    public function removeTranslation(NodeTranslationInterface $translation)
    {
        // TODO: Implement removeTranslation() method.
    }

    /**
     * {@inheritdoc}
     */
    public function setTree(TreeInterface $tree)
    {
        $this->tree = $tree;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTree()
    {
        return $this->tree;
    }
}
