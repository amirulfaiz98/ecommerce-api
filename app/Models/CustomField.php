<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $fillable = [
        'name',
        'type', // text, number, boolean, etc.
        'is_required',
    ];

    public function values()
    {
        return $this->hasMany(CustomFieldValue::class);
    }
}
