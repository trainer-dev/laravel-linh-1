<?php
/**
 * Created by PhpStorm.
 * User: Linh
 * Date: 5/26/2018
 * Time: 12:55 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
class Post  extends Model
{
    protected $table = 'post';
    protected $primaryKey="id";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}