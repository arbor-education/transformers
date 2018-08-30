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

/**
 * Defines interface implemented by classes that transform one object into another.
 *
 * A Transformer converts the input object to the output object. The input object should be left unchanged.
 * Transformers are typically used for type conversions, or extracting data from an object.
 *
 * @package Dutek\Transformer
 * @author Dušan Vejin <dutekvejin@gmail.com>
 */
interface Transformer
{
    /**
     * Transforms the input value (leaving it unchanged) into some output value.
     *
     * @param mixed $value The value to be transformed, should be left unchanged.
     * @return mixed A transformed object.
     */
    public function __invoke($value);
}
