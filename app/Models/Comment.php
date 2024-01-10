<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'comments';

    protected $fillable = [
        'name',
        'email',
        'website',
        'comment',
        'post_id'
    ];

    public function getDate()
    {
        $created_at = Carbon::parse($this->created_at);
        return $created_at->format('d M, Y');
    }
}
