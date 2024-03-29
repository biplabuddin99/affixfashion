<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function sub_category(){
        return $this->hasMany(Subcategory::class,'category_id','id');
    }
}
