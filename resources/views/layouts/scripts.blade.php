<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('bower_components/chart.js/Chart.js')}}"></script>
<!-- SweetAlert -->
<script src="{{asset('bower_components/sweetalert/sweetalert.min.js')}}"></script>

<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

<!-- https://www.tutsmake.com/how-to-install-yajra-datatables-in-laravel/ -->
<script>
$(function () {
    var table = $('#kriteria').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'processing': false,
        'serverSide': true,
        'ajax': "{{ route('getData') }}",
        'columns': [
            {
                "data": "nama_kriteria"
            }, {
                "data": "nilai_kriteria"
            }, {
                "data": "action",
                name: "action",
                'orderable': false,
                'searchable': false
            }
        ]
    });
    // setInterval(function () {
    //     $('#kriteria').DataTable().ajax.reload(null, false)
    // }, 5000)
});
</script>
<script>
$(function () {
    var detkar = $('#karyawan').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'processing': false,
        'serverSide': true,
        'ajax': "{{ route('getKaryawan') }}",
        'columns': [
            {
                "data": "nomor_karyawan"
            }, {
                "data": "nama_karyawan"
            }, {
                "data": "role"
            }, {
                "data": "departemen"
            }, {
                "data": "status",
                name: "status",
                'orderable': false,
                'searchable': false
            }
        ]
    });
    setInterval(function () {
        detkar.ajax.reload(null, false)
    }, 5000)
});
</script>
<script>
// https://github.com/iamelking/laravel_crud/blob/master/resources/views/index.blade.php
$('#kriteria')
    .on('click', '.updateKriteria[data-href]', function (e) {
        e.preventDefault();
        var link = $(this).data("href");
        $('.modal').modal("show");
        $('.modal .modal-content').load(link);
    });
$(".insertKriteria").click(function () {
    var link = $(this).data("href");
    $('.modal').modal("show");
    $(".modal .modal-content").load(link);
});
$("#kriteria").on('click', '.deleteKriteria[data-href]', function (e) {
    e.preventDefault();
    var link = $(this).data("href");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    swal({
        title: "Kriteria ini apakah akan dihapus?",
        text: "Kriteria yang terhapus, tidak dapat kembali lagi",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Iya, Lanjutkan",
        cancelButtonText: "Batal",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: link,
                type: 'DELETE',
                dataType: 'json',
                data: {
                    method: '_DELETE',
                    submit: true
                },
                success: function (result) {
                    if (result == 'Success') {
                        swal("Terhapus", "Kriteria telah terhapus", "success");
                        $('#kriteria').DataTable().ajax.reload(null, false);
                    }
                }
            })
        } else {
            swal("Batal", "Kriteria batal terhapus", "error")
        }
    })
});
</script>
