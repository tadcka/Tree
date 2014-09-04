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
 * @since 6/24/14 9:02 PM
 */
class NodeTypeRegistry implements NodeTypeRegistryInterface
{
    /**
     * @var array|NodeTypeConfig[]
     */
    private $configs = array();

    /**
     * Register node type loader.
     *
     * @param NodeTypeLoaderInterface $loader
     */
    public function register(NodeTypeLoaderInterface $loader)
    {
        $loader->register($this);
    }

    /**
     * {@inheritdoc}
     */
    public function add(NodeTypeConfig $config)
    {
        $this->configs[$config->getType()] = $config;
    }

    /**
     * Get node configs.
     *
     * @return array|NodeTypeConfig[]
     */
    public function getConfigs()
    {
        return array_values($this->configs);
    }
}
