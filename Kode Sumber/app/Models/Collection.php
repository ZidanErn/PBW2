<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaKoleksi',
        'jenisKoleksi',
        'createdAt',
        'jumlahKoleksi',
    ];

    protected $casts = [
        'jenisKoleksi' => 'integer',
    ];
}
// 6706223117 Muhammad Zidan Ernandiaz D3IF-4604