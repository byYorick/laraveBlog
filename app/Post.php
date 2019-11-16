<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    const ACTIVE = 1;
    const NO_ACTIVE = 0;
    const FEATURED = 1;
    const NO_FEATURED = 0;


    use Sluggable;

    protected $fillable = [
        'title', 'content',
        'description', 'date',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id','tag_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }



    public static function add($fillable){
        $post = new static();
        $post->fill($fillable);
        $post->save();

        return  $post;
    }

    public function getCategory()
    {
       if ($this->category_id == null){
           return 'Нет категории';
       }

       return $this->category->title;
    }

    public function getTags()
    {
        if ($this->tags()->pluck('title')->all() == null){
            return 'Нет тегов';
        }

        return implode(', ', $this->tags()->pluck('title')->all());
    }

    public function setCategory($category)
    {

        if ($category == null){ return; }
        $this->category_id = $category;
        $this->save();
    }

    public function setTags($tags){

        if ($tags == null){ return; }
        $this->tags()->sync($tags);
        $this->save();
    }

    public function toggleStatus($status)
    {
        if($status == null){
            $this->setStatusNoActive();
        }else{
            $this->setStatusActive();
        }

    }

    public function setStatusNoActive()
    {
        $this->status = self::ACTIVE;
        $this->save();
    }

    public function setStatusActive()
    {
        $this->status = self::NO_ACTIVE;
        $this->save();
    }

    public function toggleIsFeatured($status)
    {
        if($status == null){
            $this->setNoFeatured();
        }else{
            $this->setFeatured();
        }

    }

    public function setNoFeatured()
    {
        $this->is_featured = self::NO_FEATURED;
        $this->save();
    }

    public function setFeatured()
    {
        $this->is_featured = self::FEATURED;
        $this->save();
    }

    public function uploadImage($image)
    {
        if($image == null){
            return;
        }
        //$this->removeAvatar();
        $imageName = Str::random(10) . '.' . $image->extension();
        $image->storeAs('public/upload/image/', $imageName);
        $this->image = $imageName;
        $this->save();
    }

    public function getImage()
    {
        if($this->image == null){
            return Storage::url('public/upload/image/' . 'no-image.png');
        }

        return Storage::url('public/upload/image/' . $this->image);
    }

    public function removeImage()
    {
        if($this->image == null){
            return;
        }
        Storage::delete('/public/upload/avatars/' . $this->image);
    }



}
