<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/5/14 9:21 PM
 */
abstract class AbstractConfigPass implements CompilerPassInterface
{
    /**
     * @var string
     */
    private $serviceId;

    /**
     * @var string
     */
    private $tagName;

    /**
     * Constructor.
     *
     * @param string $serviceId
     * @param string $tagName
     */
    public function __construct($serviceId, $tagName)
    {
        $this->serviceId = $serviceId;
        $this->tagName = $tagName;
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition($this->serviceId)) {
            return;
        }

        $definition = $container->getDefinition($this->serviceId);

        $calls = $definition->getMethodCalls();
        $definition->setMethodCalls(array());
        foreach ($container->findTaggedServiceIds($this->tagName) as $id => $attributes) {
            $definition->addMethodCall($this->methodCall(), array(new Reference($id)));
        }
        $definition->setMethodCalls(array_merge($definition->getMethodCalls(), $calls));
    }

    /**
     * Method call.
     *
     * @return string
     */
    abstract protected function methodCall();
}
