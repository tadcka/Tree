<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Tree\Model\Manager;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 */
abstract class NodeTranslationManager implements NodeTranslationManagerInterface
{
    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $className = $this->getClass();
        $translation = new $className;

        return $translation;
    }
}
