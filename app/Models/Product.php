<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const DEFAULT_PAGINATION = 40;  // пагинация для списка

    protected $guarded = ['id'];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    public $timestamps = false;

    /**
     * Свойства продукта
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    /**
     * Добавляем фильтры по заданным колонкам
     *
     * @param array $properties
     * @param Builder $query
     * @return Builder
     */
    public static function addFilters(array $properties, Builder $query)
    {
        array_map(function ($column, $column_values) use ($query) {
            $query->whereHas('properties', function (Builder $query) use ($column, $column_values) {
                $query->whereIn($column, $column_values);
            });
        }, array_keys($properties), $properties);

        return $query;
    }
}
