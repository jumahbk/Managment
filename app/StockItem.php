<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    public $vendorName = '';
    public $productName = '';
    public $amountLeft = 0;
    public $productID = -1;


}
