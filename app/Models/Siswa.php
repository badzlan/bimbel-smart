<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school',
        'enter_date',
        'class_id'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'class_id', 'id');
    }
}
