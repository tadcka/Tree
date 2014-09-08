<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Tests\Provider;

use Tadcka\Component\Tree\Model\Manager\TreeManagerInterface;
use Tadcka\Component\Tree\Model\Tree;
use Tadcka\Component\Tree\Provider\TreeProvider;
use Tadcka\Component\Tree\Registry\Tree\TreeConfig;
use Tadcka\Component\Tree\Registry\Tree\TreeRegistry;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/6/14 2:37 AM
 */
class TreeProviderTest extends \PHPUnit_Framework_TestCase
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
     * @var TreeProvider
     */
    private $treeProvider;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->treeManager = $this->getMock('Tadcka\\Component\\Tree\\Model\\Manager\\TreeManagerInterface');
        $this->treeManager
            ->expects($this->any())
            ->method('create')
            ->will($this->returnValue(new Tree()));

        $this->treeManager
            ->expects($this->any())
            ->method('getClass')
            ->will($this->returnValue('Tadcka\\Component\\Tree\\Model\\Tree'));

        $this->treeRegistry = $this->getMock('Tadcka\\Component\\Tree\\Registry\\Tree\\TreeRegistry');
        $this->treeRegistry
            ->expects($this->any())
            ->method('getConfigs')
            ->will(
                $this->returnValue(
                    array(
                        new TreeConfig('Test', 'test'),
                        new TreeConfig('Mock', 'mock')
                    )
                )
            );

        $this->treeProvider = new TreeProvider($this->treeManager, $this->treeRegistry);
    }

    /**
     * @expectedException \Tadcka\Component\Tree\Exception\TreeNotFoundException
     */
    public function testGetFakeTree()
    {
        $this->treeProvider->getTree('fake');
    }

    public function testGetTree()
    {
        $this->assertEquals('test', $this->treeProvider->getTree('test')->getSlug());
        $this->assertEquals('mock', $this->treeProvider->getTree('mock')->getSlug());
    }

    public function testGetTreeConfig()
    {
        $this->assertNotEmpty($this->treeProvider->getTreeConfig('test'));
        $this->assertNotEmpty($this->treeProvider->getTreeConfig('mock'));
        $this->assertEmpty($this->treeProvider->getTreeConfig('fake'));
    }
}
