<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Registry\Tree;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 5/29/14 10:51 PM
 */
class TreeConfig
{
    /**
     * Unique tree name.
     *
     * @var string.
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var null|string
     */
    private $iconPath;

    /**
     * @var string
     */
    private $translationDomain;

    /**
     * Constructor.
     *
     * @param string $name
     * @param string $slug
     * @param null|string $iconPath
     */
    public function __construct($name, $slug, $iconPath = null)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->iconPath = $iconPath;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get icon path.
     *
     * @return null|string
     */
    public function getIconPath()
    {
        return $this->iconPath;
    }

    /**
     * Set translation domain.
     *
     * @param string $translationDomain
     *
     * @return TreeConfig
     */
    public function setTranslationDomain($translationDomain)
    {
        $this->translationDomain = $translationDomain;

        return $this;
    }

    /**
     * Get translation domain.
     *
     * @return string
     */
    public function getTranslationDomain()
    {
        return $this->translationDomain;
    }
}
