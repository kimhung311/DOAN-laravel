<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    /**
     * Get the posts for the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the posts for the category.
     */
    public function limitProducts()
    {
        return $this->hasMany(Product::class)
            ->take(8);
    }
}
