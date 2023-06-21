<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "company";
    protected $primaryKey = "company_id";
    public $incrementing = false;
    public $timestamps = false;

}
