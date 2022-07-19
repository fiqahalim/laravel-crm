<?php

namespace Webkul\Setup\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Attribute\Traits\CustomAttribute;
use Webkul\Setup\Contracts\Currency as CurrencyContract;

class Currency extends Model implements CurrencyContract
{
    use CustomAttribute;

    protected $table = 'currencies';

    protected $fillable = [
        'currency_name',
        'currency_code',
        'fx_rate',
        'decimal',
    ];
}
