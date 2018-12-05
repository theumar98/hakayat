<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Categories extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'user_id', 'name', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function post()
    {
        return $this->hasOne(Post::class);
    }
}
