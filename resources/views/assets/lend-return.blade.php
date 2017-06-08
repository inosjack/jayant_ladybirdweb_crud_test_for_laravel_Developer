<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">@if(isset($asset_return)) Return @else Lend @endif Asset </h4>
</div>
{!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'add-edit-form']) 	 !!}
<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>

            <div class="col-sm-4">
                <input type="hidden" name="asset_id" value="{{ $asset->id }}">
                <label class="col-sm-2 control-label">{{ $asset->name }}</label>
            </div>

            <label class="col-sm-2 control-label">Type</label>

            <div class="col-sm-4">
                <label class="col-sm-2 control-label">{{ $asset->type }}</label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Condition</label>
            <div class="col-sm-10">
                {!! Form::select('condition',['Functional' => 'Functional','Damaged' => 'Damaged','Stolen'=>'Stolen','Retired'=>'Retired' ],isset($asset)?$asset->condition:'',["class" => "form-control"]) !!}
            </div>

        </div>

        <div class="from-group">
            <label class="col-sm-2 control-label">Lend To</label>
            <div class="col-sm-10">
                <select name="employee_id" id="employeeSelect2" class="form-control select2" style="width: 100%;" >
                    {{--<option value="">Select Employee Name</option>--}}
                    @foreach($employees as $employee)
                        <option @if(isset($asset_return) and $employee->id == $asset_return->employee_id) selected @endif value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">Date_Given</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="date_given" id="datepicker" value="{{ isset($asset_return->date_given)?Carbon\Carbon::parse($asset_return->date_given)->format('Y-m-d'):Carbon\Carbon::now()->format('Y-m-d')  }}">
            </div>
        </div>

        @if(isset($asset_return))
        <div class="form-group">
            <label  class="col-sm-2 control-label">Return_Date</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="return_date" id="datepicker" value="{{ isset($asset_return->return_date)?Carbon\Carbon::parse($asset_return->return_date)->format('Y-m-d'):Carbon\Carbon::now()->format('Y-m-d') or "" }}">
            </div>
        </div>
        @endif

        <div class="form-group">
            <label  class="col-sm-2 control-label">Date_Of_Return</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="date_of_return" id="datepicker" value="{{ isset($asset_return->date_of_return)?Carbon\Carbon::parse($asset_return->date_of_return)->format('Y-m-d'):Carbon\Carbon::now()->format('Y-m-d') or "" }}">
            </div>
        </div>


        <div class="form-group">
            <label  class="col-sm-2 control-label">Notes</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" placeholder="Asset Note goes here..." name="notes">{!! $asset_return->description or '' !!}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button id="save" type="submit" class="btn btn-success" onclick="lendReturnAsset({{$asset_return->id or ''}});return false">Lend</button>
    <button class="btn default" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
{{Form::close()}}

<script type="text/javascript">
    $(document).ready(function() {
        $("#employeeSelect2").select2();
    });
</script>