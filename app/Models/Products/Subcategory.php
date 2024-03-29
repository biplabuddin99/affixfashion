<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function child_category(){
        return $this->hasMany(Childcategory::class,'subcategory_id','id');
    }
}
