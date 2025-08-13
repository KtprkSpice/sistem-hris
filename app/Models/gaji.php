<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class gaji extends Model
{

    use SoftDeletes, HasFactory;
    protected $table = "gaji";
    protected $fillable = [
        "id_karyawan",
        "gaji",
        "bonus",
        "potongan",
        "total_gaji",
        "tanggal_gaji",
    ] ;

    public function karyawan(): BelongsTo {
        return $this->belongsTo(karyawan::class, "id_karyawan");
    }
}
