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
 * Test Dutek\Transformer\CallableTransformer class.
 *
 * @package Dutek\Transformer
 * @author Dušan Vejin <dutekvejin@gmail.com>
 */
final class CallableTransformerTest extends TestCase
{
    public function test()
    {
        $callableTransformer = new CallableTransformer("trim");
        $this->assertEquals('test value', $callableTransformer(' test value '));
    }
}
