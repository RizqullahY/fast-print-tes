<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $incrementing = false;

    protected $fillable = [
        'id_produk',
        'nama_produk',
        'harga',
        'kategori_id',
        'status_id'
    ];
    
    public function category()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
