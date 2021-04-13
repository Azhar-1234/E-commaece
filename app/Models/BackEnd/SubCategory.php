<?php

namespace App\Models\BackEnd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BackEnd\Category;
class SubCategory extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo('App\Models\backEnd\Category');
    }
}
