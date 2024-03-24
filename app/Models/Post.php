<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title','slug', 'content', 'image', 'is_published'];

    public function getFormaterDate($column, $format = 'd-m-Y'){
        return Carbon::create($this->$column)->format($format);
    }
}
