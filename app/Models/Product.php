<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\MainTrait;
class Product extends Model
{
    use HasFactory;
    use MainTrait;
    protected $guarded = ['id'];
    protected $hidden =['created_at', 'updated_at'];

    Public function getImageAttribute($value)
    {
        return $this->image_full_path($value);
    }

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
