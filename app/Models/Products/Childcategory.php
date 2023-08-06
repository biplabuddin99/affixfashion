<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    use HasFactory;
    public function sub_category(){
        return $this->belongsTo(Subcategory::class,'subcategory_id','id');
    }
}
