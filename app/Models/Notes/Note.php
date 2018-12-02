<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 28.11.18
 * Time: 18:28
 */

namespace App\Models\Notes;


use App\Models\Upload\Upload;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function upload()
    {
        return $this->hasOne(Upload::class);
    }
}
