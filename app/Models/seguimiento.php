<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seguimiento extends Model
{
    use HasFactory;
    protected $table='seguimientos';
    protected $primaryKey ='id';
}
