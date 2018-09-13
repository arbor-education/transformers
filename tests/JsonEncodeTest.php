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

use PHPUnit\Framework\TestCase;

/**
 * Test Dutek\Transformer\JsonEncode class.
 *
 * @package Dutek\Transformer
 * @author Dušan Vejin <dutekvejin@gmail.com>
 */
final class JsonEncodeTest extends TestCase
{
    public function testNullValueTransformsToNullString()
    {
        $transformer = $this->getTransformerInstance();
        $this->assertEquals('null', $transformer(null));
    }

    public function testArrayTransformsToJsonStringValue()
    {
        $transformer = $this->getTransformerInstance();
        $this->assertEquals('{"test":1}', $transformer(['test' => 1]));
    }

    protected function getTransformerInstance() : Transformer
    {
        return new JsonEncode();
    }
}
