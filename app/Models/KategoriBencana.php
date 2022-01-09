<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBencana extends Model
{
    use HasFactory;

    protected $table = 'kategori_bencanas';

    protected $fillable = ['nama'];

}
