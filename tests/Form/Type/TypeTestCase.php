<?php

/*
 * This file is part of the NucleosProfileBundle package.
 *
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nucleos\ProfileBundle\Tests\Form\Type;

use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Test\TypeTestCase as BaseTypeTestCase;

/**
 * Class TypeTestCase.
 *
 * Could be removed for using directly base class since PR: https://github.com/symfony/symfony/pull/14506
 */
abstract class TypeTestCase extends BaseTypeTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->factory = Forms::createFormFactoryBuilder()
            ->addTypes($this->getTypes())
            ->addExtensions($this->getExtensions())
            ->addTypeExtensions($this->getTypeExtensions())
            ->getFormFactory()
        ;

        $this->builder = new FormBuilder(null, null, $this->dispatcher, $this->factory);
    }

    /**
     * @return mixed[]
     */
    protected function getTypeExtensions(): array
    {
        return [];
    }

    /**
     * @return mixed[]
     */
    protected function getTypes(): array
    {
        return [];
    }
}
