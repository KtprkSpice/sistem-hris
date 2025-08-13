<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class karyawan extends Model
{
    // Disini ada protected table karena laravel baca plural bukan singular jadi karena di db di tulis sebagai singular maka harus kasih tau kalo tablenya itu singular bukan plural
    protected $table = 'karyawan';

    use SoftDeletes, HasFactory;
    // Fillable seperti data apa yang bisa diisi atau diambil
    protected $fillable = ['nama_lengkap', 'email', 'no_telepon', 'alamat', 'tgl_lahir', 'tgl_kerja', 'departemen_id', 'roles_id', 'status', 'gaji'];

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(jabatan::class, 'roles_id');
    }

    public function departemen(): BelongsTo
    {
        return $this->belongsTo(departemen::class, 'departemen_id');
    }
}
