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
use Tadcka\Component\Tree\Model\Tree;
use Tadcka\Component\Tree\Tests\AbstractNodeValidatorTest;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/5/14 2:05 AM
 */
class NodeValidatorTest extends AbstractNodeValidatorTest
{
    public function testValidateByOnlyOne()
    {
        $tree = new Tree();

        $this->assertTrue($this->nodeValidator->validateByOnlyOne('', $tree));
        $this->assertFalse($this->nodeValidator->validateByOnlyOne('fake', $tree));
        $this->assertTrue($this->nodeValidator->validateByOnlyOne('test', $tree));
        $this->assertFalse($this->nodeValidator->validateByOnlyOne('mock', $tree));
    }

    public function testValidateByParent()
    {
        $this->assertTrue($this->nodeValidator->validateByParent(''));
        $this->assertFalse($this->nodeValidator->validateByParent('fake'));
        $this->assertTrue($this->nodeValidator->validateByParent('test'));

        $parent = new Node();
        $this->assertTrue($this->nodeValidator->validateByParent('test', $parent));

        $parent->setType('test');
        $this->assertTrue($this->nodeValidator->validateByParent('mock', $parent));

        $parent->setType('mock');
        $this->assertFalse($this->nodeValidator->validateByParent('mock', $parent));
    }
}
