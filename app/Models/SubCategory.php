<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function contents(){
        return $this->hasMany(Content::class,'sub_cat_id');
    }
    
}
