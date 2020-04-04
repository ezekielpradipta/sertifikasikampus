<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Produk extends Model
{
    protected $fillable = ['title','image','price','stock','description'];
    protected static function boot()
    {
        parent::boot();
        static::deleted(function(Product $produk){
            Storage::disk('images')->delete($produk->image);
        });
    }
}
