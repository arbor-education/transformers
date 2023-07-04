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

/**
 * Test Dutek\Transformer\ToInt class.
 *
 * @package Dutek\Transformer
 * @author Dušan Vejin <dutekvejin@gmail.com>
 */
final class ToIntTest extends TestCase
{
    public function testNullValueTransformsToInt()
    {
        $intValueTransformer = $this->getTransformerInstance();
        $this->assertEquals(0, $intValueTransformer(null));
    }

    /**
     * @dataProvider scalarValueTransformsToIntDataProvider
     * @param mixed $testValue
     * @param int $expectedTransformedValue
     */
    public function testScalarValueTransformsToInt($testValue, int $expectedTransformedValue)
    {
        $intValueTransformer = $this->getTransformerInstance();
        $this->assertEquals($expectedTransformedValue, $intValueTransformer($testValue));
    }

    /**
     * @dataProvider valueNotCastableToIntThrowsErrorDataProvider
     * @param mixed $testValue
     */
    public function testValueNotCastableToIntThrowsError($testValue)
    {
        $this->expectException(InvalidArgumentException::class);

        $intValueTransformer = $this->getTransformerInstance();
        $intValueTransformer($testValue);
    }

    public static function scalarValueTransformsToIntDataProvider() : array
    {
        return [
            [345, 345],
            [123.01, 123],
            ['test', 0],
            ['123test', 123],
            ['123', 123],
            [true, 1],
            [false, 0],
        ];
    }

    public static function valueNotCastableToIntThrowsErrorDataProvider() : array
    {
        return [
            [[1, 2, 3]],
            [new ArrayIterator()],
        ];
    }

    protected function getTransformerInstance() : Transformer
    {
        return new ToInt();
    }
}
