<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;
    protected $table = 'result_admin';

    protected $primaryKey = 'id';
    protected $fillable = ['repondent_id', 'service_id', 'question_id', 'option_id', 'saran'];
    public function respondent()
    {
        return $this->belongsTo(Respondent::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }


    // public function question()
    // {
    //     return $this->belongsToMany(Question::class)->withPivot(['option_id', 'points']);
    // }
}
