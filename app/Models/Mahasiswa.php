<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table='mahasiswa';
    protected $primaryKey='nim';
    protected $keyType='string';
    public $incrementing=false;
    public $timestamps=true;

    protected $fillable=[
        'nama',
        'angkatan',
        'jurusan',
    ];
}
