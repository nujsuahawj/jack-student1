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
        'price_order',
        'price_sale',
        'qty',
        'category_name',
        'description',
        'created_at',
        'updated_at'
    ];

    // sql command
    // CREATE TABLE products (
    //     id int not null AUTO_INCREMENT PRIMARY KEY,
    //     name varchar(255) null,
    //     img varchar(255) null,
    //     price_order int null,
    //     price_sale int null,
    //     qty int null,
    //     category_name varchar(255) null,
    //     description varchar(255) null,
    //     created_at timestamp,
    //     updated_at timestamp
    //   );
}