<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Tests;

use Tadcka\Component\Tree\Registry\NodeType\NodeTypeConfig;
use Tadcka\Component\Tree\Registry\NodeType\NodeTypeRegistry;
use Tadcka\Component\Tree\Validator\NodeValidator;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/5/14 11:07 PM
 */
abstract class AbstractNodeValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NodeTypeRegistry
     */
    protected $nodeTypeRegistry;

    /**
     * @var NodeValidator
     */
    protected $nodeValidator;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->nodeTypeRegistry = $this->getMock('Tadcka\\Component\\Tree\\Registry\\NodeType\\NodeTypeRegistry');
        $this->nodeTypeRegistry
            ->expects($this->any())
            ->method('getConfigs')
            ->will(
                $this->returnValue(
                    array(
                        new NodeTypeConfig('Test', 'test'),
                        new NodeTypeConfig('Mock', 'mock', array('test'), true)
                    )
                )
            );

        $this->nodeValidator = new NodeValidator($this->nodeTypeRegistry);
    }
}
