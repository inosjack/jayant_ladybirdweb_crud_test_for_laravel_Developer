<script src="{{ asset('admin-lte/plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('admin-lte/plugins/select2/select2.js')}}"></script>

<script src="{{ asset('admin-lte/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin-lte/plugins/fastclick/fastclick.js') }}"></script>
{{--Pace--}}
<script src="{{asset('admin-lte/plugins/pace/pace.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('admin-lte/js/app.min.js') }}"></script>

<script src="{{ asset('admin-lte/plugins/froiden-helper/helper.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/iCheck/icheck.min.js')}}"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function editAdminModal(id) {
        var url  ="{{route('profile.edit',':id')}}"
        url      = url.replace(':id',id);
        $.ajaxModal('#AdminEditModal',url);
    }

    function UpdateAdmin(id) {

            var url  ="{{route('profile.update',':id')}}"
            url      = url.replace(':id',id);

        $.easyAjax({
            type: 'PUT',
            url: url,
            data: $('#user-edit-form').serialize(),
            container: "#user-edit-form",
            success: function(response) {
                if (response.status == "success") {
                    $('#AdminEditModal').modal('hide');

                }
            }
        });
    }

</script>
@yield('footerjs')