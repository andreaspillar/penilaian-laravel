<?php /* /var/www/html/sispenka/resources/views/kriteria/edit.blade.php */ ?>
<?php $__env->startSection('modal-head'); ?>
<script type="text/javascript">
  $('.modal .modal-title').html("Ubah Kriteria <?php echo e($kriteria->id_kriteria); ?>");
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal-body'); ?>
<form id="editKriteria" action="<?php echo e(route('kriteria.update',$kriteria->id_kriteria)); ?>">
  <div class="form-group">
    <label for="kriteria">Kriteria</label>
    <input class="kriteria form-control" type="text" name="kriteria" id="kriteria" value="<?php echo e($kriteria->nama_kriteria); ?>" required>
  </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal-send-button'); ?>
<button type="button" class="btn btn-primary pull-right updateKriteria">Simpan</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal-script'); ?>
<script type="text/javascript">
$(document).ready(function(){
  $.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });
  $(".updateKriteria").click(function(e){
    e.preventDefault();
    var form_aksi = $('#editKriteria').attr('action');
    var krit  = $('.kriteria').val();
    $.ajax({
      dataType:"json",
      type:$('meta[name="method"]').attr('content'),
      url:form_aksi,
      data:{
        kriteria:krit,
      },
      success: function(result){
        $('#kriteria').DataTable().ajax.reload(null, false);
        $('#modal-default').modal('hide');
      }});
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>