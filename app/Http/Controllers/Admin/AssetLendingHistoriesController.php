<?php

namespace App\Http\Controllers\Admin;

use App\Asset;
use App\AssetLendingHistory;
use App\Classes\Reply;
use App\Employee;
use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\LendAssetRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssetLendingHistoriesController extends AdminBaseController
{
    //
    public function __construct() {
        parent::__construct();
        $this->pageTitle = "Assets Lending Histories";
    }

    /**
     * @return mixed
     * to show Lend asset model
     */
    public function show_lend($id) {

        $this->asset = Asset::find($id);

        $this->employees = Employee::select('id','name')->get();

        return \View::make('assets.lend-return', $this->data);
    }
    /**
     * @return mixed
     * to show Lend asset model
     */
    public function show_return($id) {

        $this->asset_return = AssetLendingHistory::find($id);

        $this->asset = Asset::find($this->asset_return->asset_id);

        $this->employees = Employee::select('id','name')->get();

        return \View::make('assets.lend-return', $this->data);
    }

    /**
     * @param LendAssetRequest $request
     */
    public function lend(LendAssetRequest $request){

        $asset = Asset::find($request->get('asset_id'));

        // Asset Condition Change update Assets
        if($asset->condition != $request->get('condition')) {
            $asset->condition =  $request->get('condition');
            $asset->save();
        }

        $asset_lend_history = new AssetLendingHistory();

        $asset_lend_history->employee_id = $request->get('employee_id');
        $asset_lend_history->asset_id = $request->get('asset_id');
        $asset_lend_history->date_given  = Carbon::parse($request->get('date_given'))->format('Y-m-d');
        $asset_lend_history->date_of_return   = Carbon::parse($request->get('date_of_return'))->format('Y-m-d') ;
        $asset_lend_history->notes = $request->get('notes');

        $asset_lend_history->save();

        return Reply::success('Asset Lend Successfully');
    }

}
