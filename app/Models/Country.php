<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'name', 'slug'
    ];

    protected $hidden = [];

    protected $casts = [
        'category_id' => 'integer'
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVE = 0;
    const DEFAULT = 1;

    public function places()
    {
        return $this->hasMany(Place::class, 'country_id');
    }

    public static function getAll()
    {
        return self::query()
            ->orderBy('id', 'asc')
            ->get();
    }

    public function getFullList()
    {
        return self::query()
            ->orderBy('id', 'asc')
            ->get();
    }
}