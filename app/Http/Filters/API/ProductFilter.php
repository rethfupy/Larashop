<?php

namespace App\Http\Filters\API;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    const CATEGORY = 'category';
    const PRICE = 'price';
    const TAGS = 'tags';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY => [$this, 'category'],
            self::PRICE => [$this, 'price'],
            self::TAGS => [$this, 'tags'],
        ];
    }

    protected function category(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }

    protected function price(Builder $builder, $value)
    {
        if (isset($value['from']) && isset($value['to'])) {
            $builder->whereBetween('price', [$value['from'], $value['to']]);
        }
    }

    protected function tags(Builder $builder, $value)
    {
        $builder->whereHas('tags', function($b) use($value) {
            $b->whereIn('tag_id', $value);
        });
    }
}