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

use ArrayAccess;
use ArrayIterator;
use ArrayObject;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * Test Dutek\Transformer\ArrayColumn class.
 *
 * @package Dutek\Transformer
 * @author Dušan Vejin <dutekvejin@gmail.com>
 */
final class ArrayColumnTest extends TestCase
{
    /**
     * @dataProvider arrayTransformsDataProvider
     * @param array|ArrayAccess $testValue
     * @param mixed $expectedTransformedValue
     */
    public function testArrayTransforms($testValue, $expectedTransformedValue)
    {
        $stringValueTransformer = $this->getTransformerInstance();
        $this->assertEquals($expectedTransformedValue, $stringValueTransformer($testValue));
    }

    public function testKeyNotFoundTransformsToNull()
    {
        $stringValueTransformer = $this->getTransformerInstance();
        $this->assertEquals(null, $stringValueTransformer([]));
    }

    /**
     * @dataProvider nonArrayValueThrowsErrorDataProvider
     * @param mixed $testValue
     */
    public function testNonArrayValueThrowsError($testValue)
    {
        $this->expectException(InvalidArgumentException::class);

        $stringValueTransformer = $this->getTransformerInstance();
        $stringValueTransformer($testValue);
    }

    public static function arrayTransformsDataProvider() : array
    {
        return [
            [['test' => 1], 1],
            [new ArrayObject(['test' => 'test string']), 'test string'],
        ];
    }

    public static function nonArrayValueThrowsErrorDataProvider() : array
    {
        return [
            [1],
            ['some non array input'],
        ];
    }

    protected function getTransformerInstance() : Transformer
    {
        return new ArrayColumn('test');
    }
}
