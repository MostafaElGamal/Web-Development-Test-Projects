<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


class Post extends Model
{

  use SoftDeletes;

  protected $fillable = [
    'title','description','contant','image','category_id'
  ];

  /**
    * Delete Post image from storage
    *@return void
  */

  public function deleteImage()
  {
    Storage::delete($this->image);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
