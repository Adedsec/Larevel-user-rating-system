<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = ['title', 'description', 'required_number', 'type', 'icon_url'];
}
