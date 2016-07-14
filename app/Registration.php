<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations';

    protected $fillable = ['first_name', 'last_name', 'address1', 'addresss2', 'city', 'state', 'zip', 'country'];
}
