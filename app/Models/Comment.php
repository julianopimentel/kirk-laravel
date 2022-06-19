<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $connection = 'tenant';
    protected $table = 'comments';
    
    protected $fillable = [
        'comment',
        'user_id',
        'post_id',
        'sermons_id',
        'group_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
