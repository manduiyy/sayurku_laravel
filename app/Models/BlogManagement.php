<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogManagement extends Model
{
    protected $table = 'BlogManagement';
    protected $guarded = ['created_at', 'updated_at'];
    protected $dates = ['created_at', 'updated_at'];
}
