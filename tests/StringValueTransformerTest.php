<?php
/**
 * This file is part of the transformers package.
 *
 * Copyright (c) dutekvejin
 *
 * For full copyright and license information, please refer to the LICENSE file,
 * located at the package root folder.
 */

namespace Dutek\Transformer;

use ArrayIterator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Test Dutek\Transformer\StringValueTransformer class.
 *
 * @package Dutek\Transformer
 * @author Dušan Vejin <dutekvejin@gmail.com>
 */
final class StringValueTransformerTest extends TestCase
{
    public function testNullValueTransformsToString()
    {
        $stringValueTransformer = $this->getTransformerInstance();
        $this->assertEquals('', $stringValueTransformer(null));
    }

    /**
     * @dataProvider scalarValueTransformsToStringDataProvider
     * @param mixed $testValue
     * @param string $expectedTransformedValue
     */
    public function testScalarValueTransformsToString($testValue, string $expectedTransformedValue)
    {
        $stringValueTransformer = $this->getTransformerInstance();
        $this->assertEquals($expectedTransformedValue, $stringValueTransformer($testValue));
    }

    public function testObjectImplementsToStringTransformsToString()
    {
        $objectImplementsToString = new class ()
        {
            public function __toString()
            {
                return 'test-message';
            }
        };

        $stringValueTransformer = $this->getTransformerInstance();
        $this->assertEquals('test-message', $stringValueTransformer($objectImplementsToString));
    }

    /**
     * @dataProvider valueNotCastableToStringThrowsErrorDataProvider
     * @param mixed $testValue
     */
    public function testValueNotCastableToStringThrowsError($testValue)
    {
        $this->expectException(InvalidArgumentException::class);

        $stringValueTransformer = $this->getTransformerInstance();
        $stringValueTransformer($testValue);
    }

    public function scalarValueTransformsToStringDataProvider() : array
    {
        return [
            [123, '123'],
            [123.01, '123.01'],
            ['test', 'test'],
            [true, '1'],
            [false, ''],
        ];
    }

    public function valueNotCastableToStringThrowsErrorDataProvider() : array
    {
        return [
            [[1, 2, 3]],
            [new ArrayIterator()],
        ];
    }

    protected function getTransformerInstance() : Transformer
    {
        return new StringValueTransformer();
    }
}
