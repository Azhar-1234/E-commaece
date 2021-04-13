<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BackEnd\SubCategory;
class Category extends Model
{
    use HasFactory;
    public function subCategories(){
        return $this->hasMany(subCategory::class, 'category_id');
    }
    
}
