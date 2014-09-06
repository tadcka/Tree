<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Tests\Provider;

use Tadcka\Component\Tree\Model\Node;
use Tadcka\Component\Tree\Model\Tree;
use Tadcka\Component\Tree\Model\Manager\NodeManagerInterface;
use Tadcka\Component\Tree\Provider\NodeProvider;
use Tadcka\Component\Tree\Tests\AbstractNodeValidatorTest;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/5/14 2:06 AM
 */
class NodeProviderTest extends AbstractNodeValidatorTest
{
    /**
     * @var NodeManagerInterface
     */
    private $nodeManager;

    /**
     * @var NodeProvider
     */
    private $nodeProvider;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->nodeManager = $this->getMock('Tadcka\\Component\\Tree\\Model\\Manager\\NodeManagerInterface');
        $this->nodeManager
            ->expects($this->any())
            ->method('findExistingNodeTypes')
            ->will($this->returnValue(array('test', 'mock', 'fake')));

        $this->nodeManager
            ->expects($this->any())
            ->method('findRootNode')
            ->will($this->returnValue(new Node()));

        $this->nodeProvider = new NodeProvider($this->nodeManager, $this->nodeTypeRegistry, $this->nodeValidator);
    }

    /**
     * @expectedException \Tadcka\Component\Tree\Exception\NodeTypeRuntimeException
     */
    public function testGetActiveNodeTypesWithEmptyNodeType()
    {
        $node = new Node();
        $node->setTree(new Tree());

        $this->assertEmpty($this->nodeProvider->getActiveNodeTypes($node));
    }

    public function testGetActiveNodeTypes()
    {
        $node = new Node();
        $node->setTree(new Tree());
        $node->setParent(new Node());
        $node->setType('type');

        $this->assertCount(0, $this->nodeProvider->getActiveNodeTypes($node));

        $node->setType('test');
        $this->assertCount(1, $this->nodeProvider->getActiveNodeTypes($node));
    }

    public function testGetNodeTypeConfig()
    {
        $this->assertNotEmpty($this->nodeProvider->getNodeTypeConfig('test'));
        $this->assertNotEmpty($this->nodeProvider->getNodeTypeConfig('mock'));
        $this->assertEmpty($this->nodeProvider->getNodeTypeConfig('fake'));
    }

    public function testGetRootNode()
    {
        $this->assertNotEmpty($this->nodeProvider->getRootNode(new Tree()));
    }
}
