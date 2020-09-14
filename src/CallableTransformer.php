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
use InvalidArgumentException;

/**
 * Transformer implementation that pass value to callable and return value from it.
 *
 * @package Dutek\Transformer
 * @author Dušan Vejin <dutekvejin@gmail.com>
 */
class CallableTransformer implements Transformer
{
    private $callable;

    /**
     * CallableTransformer constructor.
     * @param callable $callable
     */
    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    /**
     * Pass value to callable and return value from it.
     *
     * @param mixed $value The input value to transform.
     * @return mixed The transformed result.
     */
    public function __invoke($value)
    {
        return ($this->callable)($value);
    }
}
