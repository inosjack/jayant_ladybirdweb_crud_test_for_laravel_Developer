<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">@if(isset($employee)) Edit {{ $employee->name }} @else Add New @endif Employee </h4>
</div>
{!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'add-edit-form']) 	 !!}
<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>

            <div class="col-sm-10">
                <input type="text" name="name" class="form-control"  placeholder="Enter Employee Name" value="{{$employee->name or ''}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" placeholder="Enter Employee Email Address" value="{{$employee->email or ''}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Designation</label>

            <div class="col-sm-10">
                <input type="text" name="designation" class="form-control"  placeholder="Enter Employee Designation" value="{{$employee->designation or ''}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Contact_No</label>

            <div class="col-sm-10">
                <input type="number" name="contact_number" class="form-control"  placeholder="Enter Employee Contact Number" value="{{$employee->contact_number or ''}}">
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">Date_Of_Birth</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="date_of_birth" id="datepicker" value="{{ isset($employee->date_of_birth)?Carbon\Carbon::parse($employee->date_of_birth)->format('Y-m-d'):Carbon\Carbon::now()->format('Y-m-d')}}">
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">Gender</label>
            <div class="col-sm-10">
                {!! Form::select('gender',['male'=>'Male','female'=>'Female'],isset($employee)?$employee->gender:'',['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                @if(isset($employee->id))
                    <div class="help-block">Leave Blank if you do not want to change password.</div>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">Joining_Date</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="joining_date" id="datepicker" value="{{ isset($employee->joining_date)?Carbon\Carbon::parse($employee->joining_date)->format('Y-m-d'):Carbon\Carbon::now()->format('Y-m-d') or "" }}">
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">Exit_Date</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="exit_date" id="datepicker" value="{{ isset($employee->exit_date)?Carbon\Carbon::parse($employee->exit_date)->format('Y-m-d'):Carbon\Carbon::now()->format('Y-m-d') or "" }}">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button id="save" type="submit" class="btn btn-success" onclick="addEditEmployee({{$employee->id or ''}});return false">Submit</button>
    <button class="btn default" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
{{Form::close()}}