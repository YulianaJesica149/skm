<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\RespondetsController;
use Illuminate\Database\Eloquent\Casts\ArrayObject;

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

    public function Result()
    {
        return $this->belongsTo(Result::class);
    }
}
