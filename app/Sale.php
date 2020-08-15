<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sale';

    public $primaryKey = 'id';

    public $fillable = ['id', 'seller_id', 'sale_value'];
}
