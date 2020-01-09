<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Student extends Model
{
    use Userstamps;
    
    protected $guarded = ['id'];
    protected $connection = 'student';

    public function detail()
    {
        return $this->hasOne(StudentDetail::class);
    }

    public function parents()
    {
        return $this->belongsToMany(StudentParent::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class);
    }

    public function dorm()
    {
        return $this->belongsToMany('App\Dorm', 'dorm_student', 'student_id', 'dorm_id');
    }
}
