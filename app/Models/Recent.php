<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recent extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function content(){
        return $this->belongsTo(Content::class,'content_id')->whereStatus(1);
    }
}
