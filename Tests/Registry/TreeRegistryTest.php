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

use Tadcka\Component\Tree\Registry\Tree\TreeRegistry;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/5/14 12:52 AM
 */
class TreeRegistryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TreeRegistry
     */
    private $treeRegistry;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->treeRegistry = new TreeRegistry();
    }

    public function testEmpty()
    {
        $this->assertEmpty($this->treeRegistry->getConfigs());
    }
}
