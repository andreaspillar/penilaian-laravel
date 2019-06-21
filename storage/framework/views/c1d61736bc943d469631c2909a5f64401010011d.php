<?php /* /var/www/html/sispenka/resources/views/karyawan/nonadmin/read.blade.php */ ?>
<?php $__env->startSection('apps'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Halaman Karyawan
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Daftar Karyawan</h3>
          </div>
          <div class="box-body table-responsive">
            <table id="karyawancrud" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nomor Karyawan</th>
                  <th>Nama Karyawan</th>
                  <th>Jabatan</th>
                  <th>Departemen</th>
                  <th>Nilai Karyawan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            </table>
          </div>
          <script type="text/javascript">
          // https://github.com/iamelking/laravel_crud/blob/master/resources/views/index.blade.php
          $('#karyawancrud').on('click','.updateKaryawan[data-href]',function(e){
            e.preventDefault();
            var link = $(this).data("href");
            $('.modal').modal("show");
            $('.modal .modal-content').load(link);
          });
          </script>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
$(function () {
  var detkar = $('#karyawancrud').DataTable({
      language: {
        search : "Cari Karyawan: ",
        lengthMenu: "Tampilkan _MENU_ Entri",
        info:           "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        infoEmpty:      "Tabel Tanpa Entri",
        infoFiltered:   "(Dari total _MAX_ entri)",
        infoPostFix:    "",
        loadingRecords: "Mencari entri",
        zeroRecords:    "Tidak ada hasil pencarian",
        emptyTable:     "Tabel Kosong",
        paginate: {
            first:      "Awal",
            previous:   "Sebelumnya",
            next:       "Selanjutnya",
            last:       "Akhir"
        },
      },
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': false,
      'processing': false,
      'serverSide': true,
      'ajax': "<?php echo e(route('getKaryawanNonAdmin')); ?>",
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
              "data": "nilai"
          }, {
              "data": "action",
              name: "action",
              'orderable': false,
              'searchable': false
          }
      ]
  });
//   setInterval(function () {
//       detkar
//           .ajax
//           .reload(null, false)
//   }, 5000)
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>