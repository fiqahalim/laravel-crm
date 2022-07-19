<?php

namespace Webkul\Admin\DataGrids\Setting;

use Webkul\Admin\Traits\ProvideDropdownOptions;
use Illuminate\Support\Facades\DB;
use Webkul\UI\DataGrid\DataGrid;

class CurrencyDataGrid extends DataGrid
{
    use ProvideDropdownOptions;

    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('products')
            ->addSelect(
                'products.id',
                'products.sku',
                'products.name',
                'products.price',
                'products.quantity'
            );

        $this->addFilter('id', 'products.id');

        $this->setQueryBuilder($queryBuilder);
    }

    /**
     * Add columns.
     *
     * @return void
     */
    public function addColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('admin::app.datagrid.id'),
            'type'       => 'string',
            'searchable' => false,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('admin::app.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => false,
            'closure'    => function ($row) {
                $html = '<span style="background: ' . ($row->color ?? '#546E7A') . ';width: 15px;height: 15px;margin-top: 3px;border-radius: 50%;float: left;margin-right: 10px;box-shadow: 0px 4px 15.36px 0.75px rgb(0 0 0 / 10%), 0px 2px 6px 0px rgb(0 0 0 / 15%);"></span>';


                return $html . htmlspecialchars($row->name);
            },
        ]);

        $this->addColumn([
            'index'            => 'user_name',
            'label'            => trans('admin::app.datagrid.user'),
            'type'             => 'dropdown',
            'dropdown_options' => $this->getUserDropdownOptions(),
            'searchable'       => false,
            'sortable'         => true,
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => trans('admin::app.datagrid.created_at'),
            'type'       => 'date_range',
            'searchable' => false,
            'sortable'   => true,
            'closure'    => function ($row) {
                return core()->formatDate($row->created_at);
            },
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        $this->addAction([
            'title'  => trans('ui::app.datagrid.edit'),
            'method' => 'GET',
            'route'  => 'admin.settings.tags.edit',
            'icon'   => 'pencil-icon',
        ]);

        $this->addAction([
            'title'        => trans('ui::app.datagrid.delete'),
            'method'       => 'DELETE',
            'route'        => 'admin.settings.tags.delete',
            'confirm_text' => trans('ui::app.datagrid.massaction.delete', ['resource' => 'source']),
            'icon'         => 'trash-icon',
        ]);
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {
        $this->addMassAction([
            'type'   => 'delete',
            'label'  => trans('ui::app.datagrid.delete'),
            'action' => route('admin.settings.tags.mass_delete'),
            'method' => 'PUT',
        ]);
    }
}
