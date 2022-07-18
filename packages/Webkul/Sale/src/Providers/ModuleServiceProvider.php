<?php

namespace Webkul\Sale\Providers;

use Webkul\Core\Providers\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \Webkul\Sale\Models\Sale::class,
    ];
}
