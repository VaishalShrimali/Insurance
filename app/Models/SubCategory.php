<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = "sub_category";
    protected $primaryKey = "sub_category_id";
    public $incrementing = false;
}