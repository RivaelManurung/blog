<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'number',
        'deskripsi',
        'image',
        'id_categories',
    ];

    public function categori()
    {
        return $this->belongsTo(Categori::class, 'id_categories');
    }
}
