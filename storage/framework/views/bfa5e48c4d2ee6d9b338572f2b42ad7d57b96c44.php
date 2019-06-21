<?php /* /var/www/html/sispenka/resources/views/kriteria/read.blade.php */ ?>
<?php $__env->startSection('apps'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Halaman Kriteria
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Daftar Kriteria</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-sm btn-default insertKriteria" data-href="<?php echo e(route('kriteria.create')); ?>"><i class="fa fa-plus"></i>&nbsp&nbsp&nbsp<b>Tambah Kriteria</b></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="kriteria" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama Kriteria</th>
                  <th>Nilai Kriteria</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            </table>
            <script type="text/javascript">
              // https://github.com/iamelking/laravel_crud/blob/master/resources/views/index.blade.php
              // $(".updateKriteria").click(function(){
              //   var link = $(this).data("href");
              //   $('.modal').modal("show");
              //   $('.modal .modal-title').html("Edit Kriteria");
              //   $(".modal .modal-body").load(link);
              // });
            </script>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>