<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Result extends Model
{
    use HasFactory;
    protected $table = 'result_admin';

    // protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = ['id', 'saran'];
    public function resultRespondent()
    {
        return $this->hasMany(Respondent::class);
    }

    public function resultService()
    {
        return $this->hasMany(Service::class);
    }
    public function resultOption()
    {
        return $this->belongsToMany(Option::class)->withPivot(['option_id', 'question_id', 'saran', 'points']);
    }
}
