<?php

namespace Core\Discipline\Models;

use Illuminate\Database\Eloquent\Model;
use Core\Teacher\Models\Teacher;
use Core\Activity\Models\Activity;

class Discipline extends Model
{
    protected $table = 'disciplines';

    protected $fillable = ['name', 'description', 'teacher_id'];

    public function professor()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
