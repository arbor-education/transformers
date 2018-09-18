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
 * Transformer that decorates one or more other transformers.
 *
 * @package Dutek\Transformer
 * @author Dušan Vejin <dutekvejin@gmail.com>
 */
class TransformerAggregate implements Transformer
{
    private $transformers;

    /**
     * @param Transformer ...$transformers The transformers to execute.
     */
    public function __construct(Transformer ...$transformers)
    {
        $this->transformers = $transformers;
    }

    /**
     * Gets the transformers.
     *
     * @return Transformer[] The transformers being decorated.
     */
    public function getTransformers(): array
    {
        return $this->transformers;
    }

    /**
     * Transforms the input.
     *
     * @param mixed $value The input value to transform,
     * @return mixed The transformed result.
     */
    public function __invoke($value)
    {
        foreach ($this->transformers as $transformer) {
            $value = $transformer($value);
        }

        return $value;
    }
}
