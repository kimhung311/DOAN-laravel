<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'image', // dat la so it ay : image hoac thumbnail ---> sua lai file migrate, reset lai DB
        'price',
        'status',
        'quantity',
        'hot',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }
    /**
     * Get the post_detail for the post.
     */
    public function product_detail()
    {
        return $this->hasOne(ProductDetail::class);
    }

    public function order_detail()
    {
        return $this->hasOne(OrderDetail::class);
    }

    public function promotion()
    {
        return $this->hasOne(Promotion::class);
    }

}
