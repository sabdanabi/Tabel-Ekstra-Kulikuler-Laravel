<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['updated_at', 'created_at', 'nama'];
    public function student(){
        return $this->hasMany(Student::class);
    }
}
