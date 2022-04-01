<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [

        'cate_id',
        'name',
//        'slug',
         'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'taxsss',
        'status',
        'trending',
        'meta_title',
        'meta_descrip',
        'meta_keywords',

    ];

    public function category()
    {
        return $this->belongsTo(category::class, 'user_id', 'id');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}


