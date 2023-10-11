<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesananlain extends Model
{
    use HasFactory;
    protected $table = 'pesananlain';
    protected $guarded = [];

    public function relasiakun(){
        return $this->BelongsTo(Akunpengunjung::class, 'akun_id', 'id');
    }

    public function relasikecamatan(){
        return $this->BelongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }
    public function relasiteknisi(){
        return $this->BelongsTo(Teknisi::class, 'teknisi_id', 'id');
    }
    public function relasiwaktu(){
        return $this->BelongsTo(Waktu::class, 'waktu_datang_id', 'id');
    }
}
