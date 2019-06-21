<?php /* /var/www/html/sispenka/resources/views/karyawan/edit.blade.php */ ?>
<?php $__env->startSection('modal-head'); ?>
<script type="text/javascript">
  $('.modal .modal-title').html("Ubah Detail Karyawan");
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal-body'); ?>
<form id="editKaryawan" action="<?php echo e(route('karyawan.update', $karyawan->id_karyawan)); ?>">
  <div class="form-group">
    <label for="nik">NIK</label>
    <input class="form-control" type="text" name="nomor_karyawan" id="nomor_karyawan" value="<?php echo e($karyawan->nomor_karyawan); ?>" required>
    <label for="nama_karyawan">Nama Karyawan</label>
    <input class="form-control" type="text" name="nama_karyawan" id="nama_karyawan" value="<?php echo e($karyawan->nama_karyawan); ?>" required>
    <label for="departemen">Departemen</label>
    <select class="form-control" name="departemen" id="departemen">
      <?php use App\Departemen;
      $dep = Departemen::all(); ?>
      <?php $__currentLoopData = $dep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($d->id_departemen==$karyawan->id_departemen): ?>
      <option value="<?php echo e($d->id_departemen); ?>" selected><?php echo e($d->departemen); ?></option>
      <?php else: ?>
      <option value="<?php echo e($d->id_departemen); ?>"><?php echo e($d->departemen); ?></option>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <label for="jabatan">Jabatan</label>
    <select class="form-control" name="jabatan" id="jabatan">
      <?php use App\Jabatan;
      $jab = Jabatan::where('id_jabatan','>','1')->get()?>
      <?php $__currentLoopData = $jab; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if(($j->id_jabatan)==($karyawan->id_jabatan)): ?>
      <option value="<?php echo e($j->id_jabatan); ?>" selected><?php echo e($j->role); ?></option>
      <?php else: ?>
      <option value="<?php echo e($j->id_jabatan); ?>" ><?php echo e($j->role); ?></option>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal-send-button'); ?>
<button type="button" class="btn btn-primary pull-right updateKaryawan">Simpan</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal-script'); ?>
<script type="text/javascript">
$(document).ready(function(){
  $.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });
  $(".updateKaryawan").click(function(e){
    e.preventDefault();
    var form_aksi  = $('#editKaryawan').attr('action');
    form = $('#editKaryawan').serialize();
    $.ajax({
      dataType:"json",
      type:$('meta[name=method]').attr('content'),
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