<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ["title", "slug"];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
