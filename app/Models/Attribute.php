<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected  $fillable = [
        'name',
        'type',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'attribute_product');
    }
    public function getTypeAttribute($value)
    {
        return $value === 'text' ? 'text' : 'number';
    }
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = $value === 'text' ? 'text' : 'number';
    }
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
