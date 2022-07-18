<?php

namespace Webkul\Sale\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Attribute\Traits\CustomAttribute;
use Webkul\Sale\Contracts\Sale as SaleContract;

class Sale extends Model implements SaleContract
{
    protected $fillable = [
        'item_code',
        'item_name',
        'spec',
        'additional_spec',
        'remarks',
        'quantity',
        'price',
        'pretax_amount',
        'tax',
        'serial_no',
        'price_tax',
        'terms',
        'date',
        'job_ref_no',
        'sales_no',
    ];
}
