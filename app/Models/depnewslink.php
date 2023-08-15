<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class depnewslink extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'description',
        'edescription',
        'link',
        'link_id',
        'order_id'
    ];
}
