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

use InvalidArgumentException;

/**
 * Transformer implementation that performs casting to string on the input value.
 *
 * @package Dutek\Transformer
 * @author Dušan Vejin <dutekvejin@gmail.com>
 */
class ToString implements Transformer
{
    /**
     * Transforms the input to string.
     *
     * @param mixed $value The input value to transform,
     * @return string The transformed result.
     */
    public function __invoke($value) : string
    {
        if ($value !== null && !is_scalar($value) && !(is_object($value) && method_exists($value, '__toString'))) {
            throw new InvalidArgumentException('Value could not be converted to string');
        }

        return (string) $value;
    }
}
