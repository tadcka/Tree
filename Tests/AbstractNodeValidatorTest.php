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

use Tadcka\Component\Tree\Model\Manager\NodeManagerInterface;
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
     * @var NodeManagerInterface
     */
    protected $nodeManager;

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
        $this->nodeManager = $this->getMock('Tadcka\\Component\\Tree\\Model\\Manager\\NodeManagerInterface');
        $this->nodeManager
            ->expects($this->any())
            ->method('findExistingNodeTypes')
            ->will($this->returnValue(array('test', 'mock', 'fake')));

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

        $this->nodeValidator = new NodeValidator($this->nodeManager, $this->nodeTypeRegistry);
    }
}
