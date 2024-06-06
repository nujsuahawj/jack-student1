<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];

    // sql command
    // CREATE TABLE categories (
    //     id int not null AUTO_INCREMENT PRIMARY KEY,
    //     name varchar(255) null,
    //     created_at timestamp,
    //     updated_at timestamp
    //   );
}
