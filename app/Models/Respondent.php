<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    use HasFactory;

    protected $table = 'respondents';

    protected $fillable = [
        "umur",
        "jenis_kelamin",
        "pendidikan",
        "pekerjaan",
    ];

    public function result()
    {
        return $this->hasMany(Result::class);
    }
}
