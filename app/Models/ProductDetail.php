<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'product_details';

    protected $fillable = [
        'content',
        'product_id',
    ];

    /**
     * Get the post that owns the post_detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
