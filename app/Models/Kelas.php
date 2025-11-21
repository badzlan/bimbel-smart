<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tutor_id'
    ];

    public function tutor()
    {
        return $this->hasOne(User::class, 'id', 'tutor_id')->where('role', 'tutor');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'class_id', 'id');
    }
}
