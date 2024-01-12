<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'title',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tracks()
    {
        return $this->BelongsToMany(Track::class);
    }
}
