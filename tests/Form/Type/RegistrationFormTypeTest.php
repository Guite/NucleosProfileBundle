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

use Nucleos\ProfileBundle\Form\Type\RegistrationFormType;
use Nucleos\ProfileBundle\Tests\App\Entity\TestUser;

final class RegistrationFormTypeTest extends ValidatorExtensionTypeTestCase
{
    public function testSubmit(): void
    {
        $user = new TestUser();

        $form     = $this->factory->create(RegistrationFormType::class, $user);
        $formData = [
            'username'      => 'bar',
            'email'         => 'john@doe.com',
            'plainPassword' => [
                'first'  => 'test',
                'second' => 'test',
            ],
        ];
        $form->submit($formData);

        static::assertTrue($form->isSynchronized());
        static::assertSame($user, $form->getData());
        static::assertSame('bar', $user->getUsername());
        static::assertSame('john@doe.com', $user->getEmail());
        static::assertSame('test', $user->getPlainPassword());
    }

    /**
     * @return mixed[]
     */
    protected function getTypes(): array
    {
        return array_merge(parent::getTypes(), [
            new RegistrationFormType(TestUser::class),
        ]);
    }
}
