<?php /* /var/www/html/sispenka/resources/views/karyawan/create.blade.php */ ?>
<?php $__env->startSection('modal-head'); ?>
<script type="text/javascript">
  $('.modal .modal-title').html("Tambah Karyawan");
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal-body'); ?>
<form id="createKaryawan">
  <div class="form-group">
    <label for="nik">NIK</label>
    <input class="form-control" type="text" name="nomor_karyawan" id="nomor_karyawan" value="" required>
    <label for="nama_karyawan">Nama Karyawan</label>
    <input class="form-control" type="text" name="nama_karyawan" id="nama_karyawan" value="" required>
    <label for="departemen">Departemen</label>
    <select class="form-control" name="departemen" id="departemen">
      <?php use App\Departemen;
      $dep = Departemen::all(); ?>
      <?php $__currentLoopData = $dep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($d->id_departemen); ?>"><?php echo e($d->departemen); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <label for="jabatan">Jabatan</label>
    <select class="form-control" name="jabatan" id="jabatan">
      <?php use App\Jabatan;
      $jab = Jabatan::where('id_jabatan','>','1')->get()?>
      <?php $__currentLoopData = $jab; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($j->id_jabatan); ?>"><?php echo e($j->role); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal-send-button'); ?>
<button type="button" class="btn btn-primary pull-right storeKaryawan">Simpan</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal-script'); ?>
<script type="text/javascript">
$(document).ready(function(){
  $.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });
  $(".storeKaryawan").click(function(e){
    e.preventDefault();
    form = $('#createKaryawan').serialize();
    $.ajax({
      dataType:"json",
      type:"POST",
      url:"<?php echo e(route('karyawan.store')); ?>",
      data:form,
      success: function(result){
        if (result == 'success') {
          $('#karyawancrud').DataTable().ajax.reload(null, false);
          $('#modal-default').modal('hide');
          swal("Berhasil", "Karyawan telah ditambahkan", "success");
        } else {
          swal("Gagal", "Karyawan sudah pernah ditambahkan", "error");
        }
      }});
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>