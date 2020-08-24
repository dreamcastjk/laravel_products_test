<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected $perPage = 40;

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
        foreach ($properties as $property_title => $property_values) {

            $query->whereHas('properties', function (Builder $properties_query) use ($property_values, $property_title) {
                $properties_query
                    ->where(['title' => $property_title])
                    ->whereHas('values', function (Builder $values_query) use ($property_values) {
                        $values_query->whereIn('name', $property_values);
                    });
            });
        }

        return $query;
    }
}
