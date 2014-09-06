<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Provider;

use Tadcka\Component\Tree\Model\TreeInterface;
use Tadcka\Component\Tree\Model\NodeInterface;
use Tadcka\Component\Tree\Model\Manager\NodeManagerInterface;
use Tadcka\Component\Tree\Registry\NodeType\NodeTypeRegistry;
use Tadcka\Component\Tree\Validator\NodeValidator;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/5/14 1:51 AM
 */
class NodeProvider implements NodeProviderInterface
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
     * @var NodeValidator
     */
    private $nodeValidator;

    /**
     * Constructor.
     *
     * @param NodeManagerInterface $nodeManager
     * @param NodeTypeRegistry $nodeTypeRegistry
     * @param NodeValidator $nodeValidator
     */
    public function __construct(
        NodeManagerInterface $nodeManager,
        NodeTypeRegistry $nodeTypeRegistry,
        NodeValidator $nodeValidator
    ) {
        $this->nodeManager = $nodeManager;
        $this->nodeTypeRegistry = $nodeTypeRegistry;
        $this->nodeValidator = $nodeValidator;
    }

    /**
     * {@inheritdoc}
     */
    public function getActiveNodeTypes(NodeInterface $node)
    {
        $nodeTypes = $this->nodeManager->findExistingNodeTypes($node->getTree());

        $data = array();
        foreach ($nodeTypes as $nodeType) {
            if (($node->getType() === $nodeType) ||
                $this->nodeValidator->validateCurrentNodeType($nodeType, $nodeTypes, $node)
            ) {
                $data[] = $nodeType;
            }
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getNodeTypeConfig($nodeType)
    {
        foreach ($this->nodeTypeRegistry->getConfigs() as $nodeTypeConfig) {
            if ($nodeType === $nodeTypeConfig->getType()) {
                return $nodeTypeConfig;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getRootNode(TreeInterface $tree)
    {
        return $this->nodeManager->findRootNode($tree);
    }
}
