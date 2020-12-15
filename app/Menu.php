<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = ["title", "slug", "description", "image", "price", "category_id"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function sales()
    {
        return $this->belongsToMany(Sales::class);
    }
}
