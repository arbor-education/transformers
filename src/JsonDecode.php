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
 * Transformer implementation that performs JSON decode on the input value.
 *
 * @package Dutek\Transformer
 * @author Dušan Vejin <dutekvejin@gmail.com>
 */
class JsonDecode implements Transformer
{
    /**
     * Decode a JSON string.
     *
     * @param string $value The input value to transform.
     * @return mixed The transformed result.
     */
    public function __invoke($value)
    {
        return json_decode($value, true);
    }
}
