<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Validator;

use Tadcka\Component\Tree\Model\NodeInterface;
use Tadcka\Component\Tree\ModelManager\NodeManagerInterface;
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

    public function __construct(NodeManagerInterface $nodeManager, NodeTypeRegistry $nodeTypeRegistry)
    {
        $this->nodeManager = $nodeManager;
        $this->nodeTypeRegistry = $nodeTypeRegistry;
    }

    public function isValidNodeType($nodeType, NodeInterface $node)
    {
        $nodeTypeConfig = $this->getNodeTypeConfig($node->getType());
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
