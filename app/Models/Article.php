<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['song_name', 'artist_name', 'song_address', 'song_id', 'lyrics', 'updated_at'];

    public function song() {
        return $this->belongsTo(Song::class);
    }
}
