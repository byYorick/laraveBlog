<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function add($fillable){
        $user = new static();
        $user->fill($fillable);
        $user->password = $user->generateHashPassword($user->password);
        $user->save();

        return $user;
    }

    public function uploadAvatar($avatar)
    {
        if($avatar == null){
            return;
        }
        $this->removeAvatar();
        $avatarName = Str::random(9) . '.' . $avatar->extension();
        $avatar->storeAs('public/upload/avatars/', $avatarName);
        $this->avatar = $avatarName;
        $this->save();
    }

    public function getAvatar()
    {
        if($this->avatar == null){
            return Storage::url('public/upload/avatars/' . 'no-avatar.png');
        }

        return Storage::url('public/upload/avatars/' . $this->avatar);
    }

    public function removeAvatar()
    {
        if($this->avatar == null){
            return;
        }
        Storage::delete('/public/upload/avatars/' . $this->avatar);

        return redirect()->route('users.index');
    }

    public function generateHashPassword($pass)
    {
        return bcrypt($pass);
    }

    public function updatePassword($requestPass)
    {
        if($requestPass == null){
            return $this->password;
        }

        return $this->generateHashPassword($requestPass);
    }

}
