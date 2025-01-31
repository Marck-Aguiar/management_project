<?php

namespace Core\Teacher\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = ['name', 'email', 'discipline_id'];

    public function discipline()
    {
        return $this->belongsTo(\Core\Discipline\Models\Discipline::class);
    }
}
