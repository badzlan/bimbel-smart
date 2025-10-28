<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function tutor()
    {
        return $this->hasOne(User::class, 'class_id', 'id')->where('role', 'tutor');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'class_id', 'id');
    }
}
