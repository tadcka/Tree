<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Tests\Registry;

use Tadcka\Component\Tree\Registry\NodeType\NodeTypeConfig;
use Tadcka\Component\Tree\Registry\NodeType\NodeTypeRegistry;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/5/14 12:52 AM
 */
class NodeTypeRegistryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NodeTypeRegistry
     */
    private $nodeTypeRegistry;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->nodeTypeRegistry = new NodeTypeRegistry();
    }

    public function testEmpty()
    {
        $this->assertEmpty($this->nodeTypeRegistry->getConfigs());
    }

    public function testAddConfig()
    {
        $this->nodeTypeRegistry->add(new NodeTypeConfig('Test', 'test'));

        $configs = $this->nodeTypeRegistry->getConfigs();

        $this->assertCount(1, $configs);
        $this->assertEquals('test', $configs[0]->getType());
    }

    public function testAddConfigDuplicate()
    {
        $config = new NodeTypeConfig('Test', 'test');
        $this->nodeTypeRegistry->add($config);
        $this->nodeTypeRegistry->add($config);

        $configs = $this->nodeTypeRegistry->getConfigs();

        $this->assertCount(1, $configs);
        $this->assertEquals('test', $configs[0]->getType());
    }
}
