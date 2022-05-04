<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBenefit extends Model
{
    use HasFactory;
    protected $table='UserBenefits';
    protected $primarykey='id';
}
