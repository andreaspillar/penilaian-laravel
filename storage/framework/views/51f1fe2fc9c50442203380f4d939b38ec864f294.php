<?php /* /var/www/html/sispenka/resources/views/analisa/core.blade.php */ ?>
<?php $__env->startSection('apps'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Analisa Karyawan
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h4 class="box-title">Jabatan</h4>
            <select class="searchJabatan" name="">
              <option selected disabled> Pilih Jabatan </option>
              <?php $__currentLoopData = $getJabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($jabatan->id_jabatan); ?>"><?php echo e($jabatan->role); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-sm btn-default nilaiEmployer" data-href="<?php echo e(route('karyawan.create')); ?>"><i class="fa fa-plus"></i>&nbsp&nbsp&nbspAnalisa</button>
            </div>
          </div>
          <div class="tableResult">

          </div>
          <script type="text/javascript">
            $(document).ready(function(){
              $('.searchJabatan').on("change",function(){
                var search = $('.searchJabatan').val();
                var urlResult = 'tabelanalisa/';
                if (search != '') {
                  $('.tableResult').load(urlResult+search);
                }
              });
            });
          </script>
          <div class="box-footer">
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-sm btn-default nilaiEmployer"><i class="fa fa-plus"></i>&nbsp&nbsp&nbspAnalisa</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>