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
 * Transformer implementation that extract single value from the input array
 * based on the stored key.
 *
 * @package Dutek\Transformer
 * @author Dušan Vejin <dutekvejin@gmail.com>
 */
class ArrayColumn implements Transformer
{
    private $key;

    /**
     * ArrayColumn constructor.
     *
     * @param mixed $key The lookup key.
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Extract value from the input array based on the stored key.
     *
     * @param array|ArrayAccess $value The input value to transform.
     * @return mixed The transformed result.
     */
    public function __invoke($value)
    {
        if (!is_array($value) && !$value instanceof ArrayAccess) {
            throw new InvalidArgumentException(sprintf(
                'Argument 1 passed to %s must be an array, %s given',
                __METHOD__,
                is_object($value) ? get_class($value) : gettype($value)
            ));
        }

        return $value[$this->key] ?? null;
    }
}
