<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable= ['cat_id','title','description','image'];
    
    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }
}
