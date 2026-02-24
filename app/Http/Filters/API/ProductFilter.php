<?php

namespace App\Http\Filters\API;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    const CATEGORY = 'category';
    const PRICE = 'price';
    const TAGS = 'tags';
    const SORT = 'sort';
    const EXCLUDE_ID = 'exclude_id';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY => [$this, 'category'],
            self::PRICE => [$this, 'price'],
            self::TAGS => [$this, 'tags'],
            self::SORT => [$this, 'sort'],
            self::EXCLUDE_ID => [$this, 'excludeId'],
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

    protected function sort(Builder $builder, $value)
    {
        switch ($value) {
            case 'price_asc':
                $builder->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $builder->orderBy('price', 'desc');
                break;
            case 'newest':
                $builder->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $builder->orderBy('created_at', 'asc');
                break;
            case 'name_asc':
                $builder->orderBy('title', 'asc');
                break;
            case 'name_desc':
                $builder->orderBy('title', 'desc');
                break;
            default:
                $builder->orderBy('id', 'desc');
        }
    }

    protected function excludeId(Builder $builder, $value)
    {
        $builder->where('id', '!=', $value);
    }
}