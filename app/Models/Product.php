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

    // order_log command
    // CREATE TABLE order_log (
    //     id int not null AUTO_INCREMENT PRIMARY KEY,
    //     supplier varchar(255) null,
    //     created_by varchar(255) null,
    //     status int not null, // 0: waitingAdd, 1: pending, 2: success, 3: cancel
    //     total_qty int not null,
    //     total_price int not null,
    //     created_at timestamp,
    //     updated_at timestamp
    //   );

    // order_log_item command
    // CREATE TABLE order_log_item (
    //     id int not null AUTO_INCREMENT PRIMARY KEY,
    //     order_log_id int not null,
    //     p_id int not null,
    //     p_qty int not null,
    //     created_at timestamp,
    //     updated_at timestamp
    //   );
}
