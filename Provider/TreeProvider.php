<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Provider;

use Tadcka\Component\Tree\Exception\TreeNotFoundException;
use Tadcka\Component\Tree\Model\Manager\TreeManagerInterface;
use Tadcka\Component\Tree\Registry\Tree\TreeRegistry;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/6/14 2:27 AM
 */
class TreeProvider implements TreeProviderInterface
{
    /**
     * @var TreeManagerInterface
     */
    private $treeManager;

    /**
     * @var TreeRegistry
     */
    private $treeRegistry;

    /**
     * Constructor.
     *
     * @param TreeManagerInterface $treeManager
     * @param TreeRegistry $treeRegistry
     */
    public function __construct(TreeManagerInterface $treeManager, TreeRegistry $treeRegistry)
    {
        $this->treeManager = $treeManager;
        $this->treeRegistry = $treeRegistry;
    }

    /**
     * {@inheritdoc}
     */
    public function getTree($slug)
    {
        $config = $this->getTreeConfig($slug);

        if (null === $config) {
            throw new TreeNotFoundException();
        }

        $tree = $this->treeManager->findTreeBySlug($config->getSlug());
        if (null === $tree) {
            $tree = $this->treeManager->create();
            $tree->setSlug($config->getSlug());
            $this->treeManager->add($tree);
        }

        return $tree;
    }

    /**
     * {@inheritdoc}
     */
    public function getTreeConfig($slug)
    {
        foreach ($this->treeRegistry->getConfigs() as $config) {
            if ($slug === $config->getSlug()) {
                return $config;
            }
        }

        return null;
    }
}
