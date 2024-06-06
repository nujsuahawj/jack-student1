<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'img',
        'price',
        'qty',
        'category_name',
        'unit_name',
        'created_at',
        'updated_at'
    ];

    // sql command
    // CREATE TABLE products (
    //     id int not null AUTO_INCREMENT PRIMARY KEY,
    //     name varchar(255) null,
    //     img varchar(255) null,
    //     price int null,
    //     qty int null,
    //     category_name varchar(255) null,
    //     unit_name varchar(255) null,
    //     created_at timestamp,
    //     updated_at timestamp
    //   );
}