<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class jabatan extends Model
{
    protected $table = "jabatan";

    use SoftDeletes, HasFactory;

    protected $fillable = [
        "nama_jabatan",
        "deskripsi",
    ];
}
