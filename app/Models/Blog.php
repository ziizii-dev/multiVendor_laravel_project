<?php

namespace App\Models;

use App\Models\BlogCategory;
use App\Traits\FillableTraits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory,FillableTraits;
protected $with = ['category'];
    public function category(){
       return $this->belongsTo(BlogCategory::class,'blog_category_id','id')->where('status',1);
    }

}
