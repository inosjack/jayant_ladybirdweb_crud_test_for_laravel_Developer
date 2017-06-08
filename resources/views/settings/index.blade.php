@extends(settings('theme_folder').'user.layouts.user')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <!-- END PAGE TITLE -->
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Settings</h3>
                                </div>
                                    {!! Form::open(['url' => '', 'method' => 'post', 'id' => 'social-form']) !!}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Facebook Client ID</label>
                                            <input name = "facebookClientID" type="text" class="form-control" placeholder="Enter Facebook Client ID" value = "{{$user->facebookClientID or ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Facebook Client Secret</label>
                                            <input name = "facebookClientSecret" type="text" class="form-control" placeholder="Enter Facebook Client Secret" value = "{{$user->facebookClientSecret or ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Google Client ID</label>
                                            <input name = "googleClientID" type="text" class="form-control" placeholder="Enter Google Client ID" value = "{{$user->googleClientID or ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Google Client Secret</label>
                                            <input name = "googleClientSecret" type="text" class="form-control" placeholder="Enter Google Client Secret" value = "{{$user->googleClientSecret or ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter Client ID</label>
                                            <input name = "twitterClientID" type="text" class="form-control" placeholder="Enter Twitter Client ID" value = "{{$user->twitterClientID or ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter Client Secret</label>
                                            <input name = "twitterClientSecret" type="text" class="form-control" placeholder="Enter Twitter Client Secret" value = "{{$user->twitterClientSecret or ''}}">
                                        </div>
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-primary" onclick="addEditSocial({{$user->id}})">Submit</button>
                                            <button type="button" class="btn btn-default">Cancel</button>
                                        </div>
                                    </div>
                                    {!! Form::close()!!}
                            </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
            </section>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection

@section('scripts-footer')
    <script>
        function addEditSocial(id) {
            var url = "{{route('user.settings.update',':id')}}";
            url = url.replace(':id',id);
            var method = 'PUT';
            $.easyAjax({
                type: method,
                url: url,
                data: $('#social-form').serialize(),
                container: "#social-form"
            });
        }
    </script>
@endsection

