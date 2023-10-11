<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;
    protected $table = 'teknisi';
    protected $guarded = [];

    public function relasikecamatan(){
        return $this->BelongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }

    public function relasiwaktu(){
        return $this->BelongsTo(Waktu::class, 'waktu_datang_id', 'id');
    }
    public function relasipesanan(){
        return $this->BelongsTo(Pesananlain::class, 'id', 'teknisi_id');
    }
}
