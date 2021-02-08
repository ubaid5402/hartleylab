<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee_details';
    protected $primaryKey = 'employee_id';

    public function payroll(){
        return $this->hasMany('App\Payroll','p_employee_id');
    }

    public function timesheet(){
        return $this->hasMany('App\TimeSheet','t_employee_id');
    }
}
