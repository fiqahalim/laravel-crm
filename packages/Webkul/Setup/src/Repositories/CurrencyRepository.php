<?php

namespace Webkul\Setup\Repositories;

use Webkul\Core\Eloquent\Repository;

class CurrencyRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\Setup\Contracts\Currency';
    }
}
