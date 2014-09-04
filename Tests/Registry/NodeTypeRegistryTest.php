<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Tests\Registry;

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
}
