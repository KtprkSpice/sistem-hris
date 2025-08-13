<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class cuti extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cuti';
    protected $fillable = ['id_karyawan', 'jenis_cuti', 'awal_cuti', 'akhir_cuti', 'status'];

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(karyawan::class, 'id_karyawan');
    }
}
