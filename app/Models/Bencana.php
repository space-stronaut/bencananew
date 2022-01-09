<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bencana extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(KategoriBencana::class, 'kategori_id', 'id');
    }
}
