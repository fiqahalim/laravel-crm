<?php

namespace Webkul\Setup\Providers;

use Webkul\Core\Providers\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \Webkul\Setup\Models\Currency::class,
    ];
}
