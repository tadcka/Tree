<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
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
     * @var null|string
     */
    private $iconPath;

    /**
     * Constructor.
     *
     * @param string $name
     * @param null|string $iconPath
     */
    public function __construct($name, $iconPath = null)
    {
        $this->name = $name;
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
     * Get icon path.
     *
     * @return null|string
     */
    public function getIconPath()
    {
        return $this->iconPath;
    }
}
