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
 * Transformer implementation that performs casting to int on the input value.
 *
 * @package Dutek\Transformer
 * @author Dušan Vejin <dutekvejin@gmail.com>
 */
class ToInt implements Transformer
{
    /**
     * Transforms the input to integer.
     *
     * @param mixed $value The input value to transform.
     * @return int The transformed result.
     */
    public function __invoke($value) : int
    {
        if ($value !== null && !is_scalar($value)) {
            throw new InvalidArgumentException('Value could not be converted to int.');
        }

        return (int) $value;
    }
}
