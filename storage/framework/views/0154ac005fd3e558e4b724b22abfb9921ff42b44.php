<?php /* /var/www/html/sispenka/resources/views/karyawan/nonadmin/editnilai.blade.php */ ?>
<?php $__env->startSection('modal-head'); ?>
<script type="text/javascript">
  $('.modal .modal-title').html("Nilai <?php echo e($namaKaryawan); ?>");
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal-body'); ?>
<form id="nilaiKaryawan" action="<?php echo e(route('NilaiKaryawan.update',$id_karyawan)); ?>">
  <div class="form-group">
    <table class="table">
    <?php $__currentLoopData = $nilaiKaryawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nK): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td hidden><input class="form-control" type="text" name="id_kriteria[<?php echo e($nK->id_kriteria); ?>]" id="id_kriteria[<?php echo e($nK->id_kriteria); ?>]" value="<?php echo e($nK->id_kriteria); ?>" required></td>
        <td><h5><b><?php echo e($nK->nama_kriteria); ?></b></h5></td>
        <td>
          <select class="form-control" type="text" name="nil[<?php echo e($nK->id_kriteria); ?>]" id="nil[<?php echo e($nK->id_kriteria); ?>]" required>
            <?php $__currentLoopData = $val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($nK->nilai_karyawan == $v->nilai_value): ?>
            <option value="<?php echo e($v->nilai_value); ?>" selected><?php echo e($v->alias_value); ?></option>
            <?php else: ?>
            <option value="<?php echo e($v->nilai_value); ?>"><?php echo e($v->alias_value); ?></option>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
  </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal-send-button'); ?>
<button type="button" class="btn btn-primary pull-right saveNilaiKaryawan">Simpan</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal-script'); ?>
<script type="text/javascript">
$(document).ready(function(){
  $.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });
  $(".saveNilaiKaryawan").click(function(e){
    e.preventDefault();
    var form_aksi  = $('#nilaiKaryawan').attr('action');
    form = $('#nilaiKaryawan').serialize();
    $.ajax({
      dataType:"json",
      type:$('meta[name="method"]').attr('content'),
      url:form_aksi,
      data:form,
      success: function(result){
          $('#karyawancrud').DataTable().ajax.reload(null, false);
          $('#modal-default').modal('hide');
      }});
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>