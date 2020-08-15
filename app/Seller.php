<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = 'seller';

    public $primaryKey = 'id';

    public $fillable = ['id', 'name', 'email'];
}
