<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Schema;

class Option extends Model
{
    use HasFactory;
    protected $table = 'options';

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['question_id', 'option_text', 'points'];
    protected $primaryKey = 'id';

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function result()
    {
        return $this->hasMany(Result::class);
    }
}
