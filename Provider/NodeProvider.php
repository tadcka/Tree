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

use Tadcka\Component\Tree\Model\NodeInterface;
use Tadcka\Component\Tree\Model\TreeInterface;
use Tadcka\Component\Tree\ModelManager\NodeManagerInterface;
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
     * @var NodeValidator
     */
    private $nodeValidator;

    /**
     * Constructor.
     *
     * @param NodeManagerInterface $nodeManager
     * @param NodeValidator $nodeValidator
     */
    public function __construct(NodeManagerInterface $nodeManager, NodeValidator $nodeValidator)
    {
        $this->nodeManager = $nodeManager;
        $this->nodeValidator = $nodeValidator;
    }

    /**
     * {@inheritdoc}
     */
    public function getActiveNodeTypes(NodeInterface $node, TreeInterface $tree)
    {
        $nodeTypes = array();
        foreach ($this->nodeManager->findExistingNodeTypes($tree) as $nodeType) {
            if ($this->nodeValidator->isValidNodeType($nodeType, $node)) {
                $nodeTypes[] = $nodeType;
            }
        }

        return $nodeTypes;
    }
}
