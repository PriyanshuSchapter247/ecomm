<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $name
 */
class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = [
        'name',
//        'slug',
        'description',
        'status',
        'popular',
        'image',
        'meta_title',
        'meta_descrip',
        'meta_keywords',
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');

    }

    public function products()
    {

        return $this->hasMany(Product::class, 'cate_id', 'id');

    }
}
