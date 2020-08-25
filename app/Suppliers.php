<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table = 'suppliers';

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'type', 'photo' , 'shopname', 'account_name', 'account_number', 'routing_number', 'bank_name', 'branch_name'
    ];
}
