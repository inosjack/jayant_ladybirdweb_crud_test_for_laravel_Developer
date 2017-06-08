@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('page-header')
    <section class="content-header">
        <h1>
            {{$pageTitle}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Employee</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="javascript:;" onclick="addModal()" class="btn btn-success">
                        <span class="hidden-xs"> Add Employee </span><i class="fa fa-plus"></i>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <table id="employees" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Designation</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Created_At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

@endsection

@section('modals')
    <!-- Add FORM -->
    <div id="addEditModal" class="modal fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{--Content to inserted by ajax data--}}
            </div>
        </div>
    </div>

    @include('include.delete-modal')
@endsection

@section('footerjs')
    <!-- DataTables -->
    <script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin-lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript">
                {{----Datatable loading --}}
        var  table = $('#employees').dataTable({
                    "sScrollY": "100%",
                "scrollCollapse": true,
                    "responsive": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{route('admin.employees.ajax')}}",
                    "columns": [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'designation', name: 'designation'},
                        {data: 'date_of_birth', name: 'date_of_birth'},
                        {data: 'gender', name: 'gender'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ],
                    "oLanguage": {
                        "sProcessing": '<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>'
                    }
                });

//        Show Delete Modal
        function deleteAlert(id, name) {

            $('#deleteModal').modal('show');

            var confirmMsg = 'Are you sure you want to delete <strong>:name</strong>? This action cannot be undone.';
            confirmMsg = confirmMsg.replace(":name", name);

            $("#deleteModal").find('#info').html(confirmMsg);

            $('#deleteModal').find("#delete").off().click(function () {
                var url = "{{ route('admin.employees.destroy',':id') }}";
                url = url.replace(':id', id);

                var token = "{{ csrf_token() }}";

                $.easyAjax({
                    type: 'DELETE',
                    url: url,
                    data: {'_token': token},
                    container: "#deleteModal",
                    success: function (response) {
                        if (response.status == "success") {
                            $('#deleteModal').modal('hide');
                            table._fnDraw();
                        }
                    }
                });

            });
        }

//        Show Add modal
        function addModal() {
            $.ajaxModal('#addEditModal','{{route('admin.employees.create')}}');
        }

//        Show Edit Modal
        function editModal(id) {
            var url  ="{{route('admin.employees.edit',':id')}}"
            url      = url.replace(':id',id);
            $.ajaxModal('#addEditModal',url);
        }

//        Update Employee Function ajax request
        function addEditEmployee(id) {
            if(typeof id!='undefined'){
                var url  ="{{route('admin.employees.update',':id')}}"
                url      = url.replace(':id',id);
                var method = 'PUT';
            }else{
                url = "{{ route('admin.employees.store') }}";
                var method = 'POST';
            }

            $.easyAjax({
                type: method,
                url: url,
                data: $('#add-edit-form').serialize(),
                container: "#add-edit-form",
                success: function(response) {
                    if (response.status == "success") {
                        $('#addEditModal').modal('hide');
                        table._fnDraw();

                    }
                }
            });
        }


    </script>
@endsection