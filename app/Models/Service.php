<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    // protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['service_text'];
    protected $primaryKey = 'id';

    public function questions()
    {
        return $this->hasMany(Question::class);
    }








    
    // public function serviceQuestion()
    // {
    //     return $this->hasMany(Question::class);
    // }
    // public function serviceResult()
    // {
    //     return $this->belongsTo(Result::class);
    // }
}
