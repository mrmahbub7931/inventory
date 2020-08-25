<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'name','name_slug','email','phone','address','age','birth_date','hired_date','national_id','designation','department_name','experience','salary','yearly_holiday','photo'
    ];

    public function educations()
    {
        return $this->hasMany('App\Education');
    }
}
