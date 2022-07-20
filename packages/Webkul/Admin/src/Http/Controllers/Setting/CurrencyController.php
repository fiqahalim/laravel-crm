<?php

namespace Webkul\Admin\Http\Controllers\Setting;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Validator;
use Webkul\Setup\Repositories\CurrencyRepository;
use Webkul\Admin\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    protected $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(\Webkul\Admin\DataGrids\Setting\CurrencyDataGrid::class)->toJson();
        }

        return view('admin::settings.currencies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin::settings.currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'currency_name'    => 'required',
            'currency_code'    => 'nullable',
            'fx_rate'          => 'nullable',
            'decimal'          => 'nullable',
        ]);

        $data = request()->all();

        $data['status'] = isset($data['status']) ? 1 : 0;

        Event::dispatch('settings.currencies.create.before');

        $currency = $this->currencyRepository->create($data);
        $currency->save();

        Event::dispatch('settings.currencies.create.after', $admin);

        session()->flash('success', trans('admin::app.currencies.create-success'));

        return redirect()->route('admin.settings.currencies.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
