<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Tests\Validator;

use Tadcka\Component\Tree\Model\Node;
use Tadcka\Component\Tree\Tests\AbstractNodeValidatorTest;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/5/14 2:05 AM
 */
class NodeValidatorTest extends AbstractNodeValidatorTest
{
    public function testValidateNodeType()
    {
        $node = new Node();
        $node->setParent(new Node());
        $node->setType('test');

        $this->assertTrue($this->nodeValidator->validateCurrentNodeType('test', array(), $node));
        $this->assertFalse($this->nodeValidator->validateCurrentNodeType('mock', array('mock'), $node));
        $this->assertFalse($this->nodeValidator->validateCurrentNodeType('fake', array('fake'), $node));
    }

    /**
     * @expectedException \Tadcka\Component\Tree\Exception\NodeTypeRuntimeException
     */
    public function testHasNodeTypeWithoutParent()
    {
        $this->nodeValidator->isNodeType(new Node());
    }

    public function testHasNodeType()
    {
        $node = new Node();
        $node->setParent(new Node());

        $this->assertFalse($this->nodeValidator->isNodeType($node));

        $node->setType('test');
        $this->assertTrue($this->nodeValidator->isNodeType($node));

        $node->setType('mock');
        $this->assertFalse($this->nodeValidator->isNodeType($node));

        $node->getParent()->setType('test');
        $this->assertTrue($this->nodeValidator->isNodeType($node));
    }
}
