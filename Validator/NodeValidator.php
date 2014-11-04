<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Validator;

use Tadcka\Component\Tree\Exception\NodeTypeRuntimeException;
use Tadcka\Component\Tree\Model\Manager\NodeManagerInterface;
use Tadcka\Component\Tree\Model\NodeInterface;
use Tadcka\Component\Tree\Model\TreeInterface;
use Tadcka\Component\Tree\Registry\NodeType\NodeTypeConfig;
use Tadcka\Component\Tree\Registry\NodeType\NodeTypeRegistry;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/5/14 1:47 AM
 */
class NodeValidator
{
    /**
     * @var NodeManagerInterface
     */
    private $nodeManager;

    /**
     * @var NodeTypeRegistry
     */
    private $nodeTypeRegistry;

    /**
     * Constructor.
     *
     * @param NodeManagerInterface $nodeManager
     * @param NodeTypeRegistry $nodeTypeRegistry
     */
    public function __construct(NodeManagerInterface $nodeManager, NodeTypeRegistry $nodeTypeRegistry)
    {
        $this->nodeManager = $nodeManager;
        $this->nodeTypeRegistry = $nodeTypeRegistry;
    }

    /**
     * Validate by only one.
     *
     * @param string $nodeType
     * @param TreeInterface $tree
     *
     * @return bool
     */
    public function validateByOnlyOne($nodeType, TreeInterface $tree)
    {
        if (!$nodeType) {
            return true;
        }

        $config = $this->getNodeTypeConfig($nodeType);
        if (null === $config) {
            return false;
        }

        if ($config->isOnlyOne()) {
            return !in_array($nodeType, $this->nodeManager->findExistingNodeTypes($tree));
        }

        return true;
    }

    /**
     * Validate by parent.
     *
     * @param string $nodeType
     * @param NodeInterface $parent
     *
     * @return bool
     */
    public function validateByParent($nodeType, NodeInterface $parent = null)
    {
        if (!$nodeType) {
            return true;
        }

        $config = $this->getNodeTypeConfig($nodeType);
        if (null === $config) {
            return false;
        }

        if ((null !== $parent) && $parent->getType()) {
            return in_array($parent->getType(), $config->getParentTypes());
        }

        return false;
    }

    /**
     * Get node type config.
     *
     * @param string $nodeType
     *
     * @return null|NodeTypeConfig
     */
    private function getNodeTypeConfig($nodeType)
    {
        foreach ($this->nodeTypeRegistry->getConfigs() as $nodeTypeConfig) {
            if ($nodeType === $nodeTypeConfig->getType()) {
                return $nodeTypeConfig;
            }
        }

        return null;
    }
}
