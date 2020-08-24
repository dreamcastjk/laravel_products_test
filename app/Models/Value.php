<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $guarded = ['id'];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function properties()
    {
        return $this->belongsTo(Property::class);
    }
}
