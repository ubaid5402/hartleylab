<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $table = 'employee_payroll';
    protected $primaryKey = 'payroll_id';

    // public function emp(){
    //    return $this->hasMany('App\Employee','employee_id');
    // }
}
