<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tugas extends Model
{

    // Penggunaan soft deleted disini agar data gak bener bener ke hapus jadi dia cuma update data di deleted_at, tapi di table frontend datanya akan gak ada atau hidden
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "nama_tugas",
        "deksripsi",
        "ditugaskan",
        "tenggat_waktu",
        "status",
    ];

    // Ini Function untuk menandakan, ditugaskan itu konteknya foreginId jadi di function ini kita berikan semacam logika atau penjelasan ke kode kalo ditugaskan itu foregnKey
    
        public function karyawan(): BelongsTo
        {
            return $this->belongsTo(karyawan::class, 'ditugaskan');
        }
}
