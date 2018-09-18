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
 * Test Dutek\Transformer\TransformerAggregate class.
 *
 * @package Dutek\Transformer
 * @author Dušan Vejin <dutekvejin@gmail.com>
 */
final class TransformerAggregateTest extends TestCase
{
    public function testGetPredicates()
    {
        $transformers = [$this->createMock(Transformer::class), $this->createMock(Transformer::class)];
        $transformer = new TransformerAggregate(...$transformers);
        $this->assertEquals($transformers, $transformer->getTransformers());
    }

    public function testInputTransformsToOutput()
    {
        $input = 'test';
        $output = 1;

        $mock = $this->createMock(Transformer::class);
        $mock->method('__invoke')
            ->with($input)
            ->willReturn($output);

        $transformer = new TransformerAggregate($mock);
        $transformedValue = $transformer($input);

        $this->assertEquals($output, $transformedValue);
    }

    public function testTransformersExecutionOrder()
    {
        $expectedTransformedValue = [1, 2, 3];
        $transformers = [];

        foreach ($expectedTransformedValue as $id) {
            $mock = $this->createMock(Transformer::class);
            $mock->method('__invoke')
                ->willReturnCallback(function ($value) use ($id) {
                    array_push($value, $id);
                    return $value;
                });
            array_push($transformers, $mock);
        }

        $transformer = new TransformerAggregate(...$transformers);
        $actualTransformedValue = $transformer([]);

        $this->assertEquals($expectedTransformedValue, $actualTransformedValue);
    }
}
