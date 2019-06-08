<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{

  use SoftDeletes;

  protected $fillable = [
    'title','description','contant','image','category_id', 'user_ids'
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

  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }

  /**
   * Check the post have a tag.
   *
   * @return bool
   *
   */

  public function hashTag($tagId)
  {
    return in_array($tagId, $this->tags->pluck('id')->toArray() );
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
