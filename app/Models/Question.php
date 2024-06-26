<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['service_id', 'question_text'];
    protected $primaryKey = 'id';

    // tgl 29 aku ubah ini
    public function service()
    {
        return $this->belongsTo(Service::class);
    }


    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function result()
    {
        return $this->hasMany(Result::class);
    }
}
