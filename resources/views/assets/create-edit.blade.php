<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">@if(isset($asset)) Edit @else Add @endif Asset </h4>
</div>
{!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'add-edit-form']) 	 !!}
<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>

            <div class="col-sm-10">
                <input type="text" name="name" class="form-control"  placeholder="Enter Asset Name" value="{{$asset->name or ''}}">
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">Serial_No</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="serial_number" placeholder="Enter Asset Serial Number" id="serial_number" value="{{$asset->serial_number or ''}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Type</label>
            <div class="col-sm-4">
                {!! Form::select('type',['Software' => 'Software','Hardware'=>'Hardware' ],isset($asset)?$asset->type:'',["class" => "form-control"]) !!}
            </div>
            <label class="col-sm-2 control-label">Condition</label>
            <div class="col-sm-4">
                {!! Form::select('condition',['Functional' => 'Functional','Damaged' => 'Damaged','Stolen'=>'Stolen','Retired'=>'Retired' ],isset($asset)?$asset->condition:'',["class" => "form-control"]) !!}
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">Asset_Value</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="asset_value" placeholder="Enter Asset Value" id="asset_value" value="{{$asset->asset_value or ''}}">
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" placeholder="Asset description goes here..." name="description">{!! $asset->description or '' !!}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button id="save" type="submit" class="btn btn-success" onclick="addEditAsset({{$asset->id or ''}});return false">Submit</button>
    <button class="btn default" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
{{Form::close()}}