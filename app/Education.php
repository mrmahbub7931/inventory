<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $fillable = [
        'education_level','employee_id','major','board','institute_name','cgpa','scale_of_cgpa','year_of_passing','duration'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
