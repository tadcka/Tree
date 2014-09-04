<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Registry\NodeType;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 6/24/14 9:00 PM
 */
class NodeTypeConfig
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $iconPath;

    /**
     * @var array
     */
    private $parentTypes = array();

    /**
     * @var bool
     */
    private $isOnlyOne;

    /**
     * Constructor.
     *
     * @param string $name
     * @param string $type
     * @param array $parentTypes
     * @param bool $isOnlyOne
     * @param null|string $iconPath
     */
    public function __construct($name, $type, array $parentTypes = array(), $isOnlyOne = false, $iconPath = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->parentTypes = $parentTypes;
        $this->isOnlyOne = $isOnlyOne;
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
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get icon path.
     *
     * @return string
     */
    public function getIconPath()
    {
        return $this->iconPath;
    }

    /**
     * Get parentTypes.
     *
     * @return array
     */
    public function getParentTypes()
    {
        return $this->parentTypes;
    }

    /**
     * Is only one.
     *
     * @return bool
     */
    public function isOnlyOne()
    {
        return $this->isOnlyOne;
    }
}
