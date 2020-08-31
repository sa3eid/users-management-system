<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    protected $fillable = ['Name', 'Age', 'Nationality', 'Residence', 'Email', 'Birthdate'];
}
