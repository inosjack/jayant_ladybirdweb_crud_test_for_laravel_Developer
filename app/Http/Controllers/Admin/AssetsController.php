<?php

namespace App\Http\Controllers\Admin;
use App\Classes\Reply;
use App\Http\Controllers\AdminBaseController;
use App\Http\Requests;
use App\Asset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;

class AssetsController extends AdminBaseController
{

    public function __construct() {
        parent::__construct();
        $this->pageTitle = "Assets Management";
    }

    /**
     * @return mixed
     * To show index page
     */
    public function index() {
        return \View::make('assets.index', $this->data);
    }

    /**
     * @return mixed
     * to show add asset model
     */
    public function create() {
        return \View::make('assets.create-edit', $this->data);
    }


    public function ajax_assets()
    {
        $assets = Asset::select('id', 'name', 'type', 'serial_number', 'condition');
        $data = Datatables::of($assets)
            ->addColumn(
                'lend_to',
                function ($row) {
                    return "Asset Not Lend";
                }
            )
            ->addColumn(
                'action',
                function ($row) {
                    // Edit Button
                    $string = '<button onclick="editModal(' . $row->id . ')" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</button> ';
                    //Delete Button
                    $string .= '<button onclick="deleteAlert(' . $row->id . ',\'' . addslashes($row->name) . '\')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>';
//
//                    $string .= ' <button onclick="lendModal(' . $row->id . ')" class="btn btn-xs btn-success"><i class="fa fa-paper-plane"></i> Lend</button>';
//
//                    $string .= ' <button onclick="editModal(' . $row->id . ',\'' . addslashes($row->name) . '\')" class="btn btn-xs btn-warning"><i class="fa fa-share-square-o"></i> Return</button>';
                    return $string;
                }

            )
            ->make(true);
        return $data;
    }

    /**
     * @param Requests\AssetStoreRequest $request
     * @return array
     * Store A a new asset
     */
    public function store(Requests\AssetStoreRequest $request) {

        $asset = new Asset();
        $asset->name  = $request->get('name');
        $asset->serial_number = $request->get('serial_number');
        $asset->type = $request->get('type');
        $asset->condition = $request->get('condition');
        $asset->asset_value   = $request->get('asset_value');
        $asset->description   = $request->get('description');
        $asset->save();

        return Reply::success('Created Successfully');
    }

    /**
     * @param $id
     * @return mixed
     * Show Asset Edit Asset Model
     */
    public function edit($id) {
        $this->asset = Asset::find($id);
        return $this->create();
    }

    /**
     * @param Requests\AssetUpdateRequest $request
     * @param $id
     * @return array
     *
     * Update a Assets
     */

    public function update(Requests\AssetUpdateRequest $request,$id) {

        $asset = Asset::find($id);
        $asset->name  = $request->get('name');
        $asset->serial_number = $request->get('serial_number');
        $asset->type = $request->get('type');
        $asset->condition = $request->get('condition');
        $asset->asset_value   = $request->get('asset_value');
        $asset->description   = $request->get('description');
        $asset->save();
        
        return Reply::success('Updated Successfully');
    }

    /**
     * @param $id
     * @return array
     * Delete Asset Form Table
     */
    public function destroy($id) {
        Asset::destroy($id);
        return Reply::success('Successfully Deleted');
    }


}
