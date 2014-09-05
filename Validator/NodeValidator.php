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

use Tadcka\Component\Tree\Exception\NodeTypeRuntimeException;
use Tadcka\Component\Tree\Model\NodeInterface;
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
     * @var NodeTypeRegistry
     */
    private $nodeTypeRegistry;

    /**
     * Constructor.
     *
     * @param NodeTypeRegistry $nodeTypeRegistry
     */
    public function __construct(NodeTypeRegistry $nodeTypeRegistry)
    {
        $this->nodeTypeRegistry = $nodeTypeRegistry;
    }

    /**
     * Validate current node type.
     *
     * @param string $currentNodeType
     * @param array $nodeTypes
     * @param NodeInterface $node
     *
     * @return bool
     */
    public function validateCurrentNodeType($currentNodeType, array $nodeTypes, NodeInterface $node)
    {
        $config = $this->getNodeTypeConfig($currentNodeType);
        if ((null !== $config) && (!$config->isOnlyOne() || !in_array($currentNodeType, $nodeTypes)) && $this->isNodeType($node)) {
            return true;
        }

        return false;
    }

    /**
     * Check if is node type.
     *
     * @param NodeInterface $node
     *
     * @return bool
     *
     * @throws NodeTypeRuntimeException
     */
    public function isNodeType(NodeInterface $node)
    {
        if (null === $node->getParent()) {
            throw new NodeTypeRuntimeException('Node parent can\'t be empty!');
        }

        $config = $this->getNodeTypeConfig($node->getType());
        if (null === $config) {
            return false;
        }

        if (0 === count($config->getParentTypes())) {
            return true;
        }

        return in_array($node->getParent()->getType(), $config->getParentTypes());
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
