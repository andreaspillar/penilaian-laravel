<?php /* /var/www/html/sispenka/resources/views/karyawan/nonadmin/edit.blade.php */ ?>
<script type="text/javascript">
  $('.modal .modal-title').html("Nilai <?php echo e($karyawan->nama_karyawan); ?> - <?php echo e($karyawan->departemen); ?>");
</script>
<form class="" action="#" method="post">
  <div class="form-group">
    <table class="table">
    <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $krit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><h5><b><?php echo e($krit->nama_kriteria); ?></b></h5></td>
        <td><input class="form-control" type="text" name="nama_kriteria" id="nama_kriteria" value="" required></td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
  </div>
</form>
<script type="text/javascript">
$(document).ready(function(){
  $.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });
  $(".savemod").click(function(e){
    e.preventDefault();
    var form_aksi  = $('#createKaryawan').attr('action');
    form = $('#createKaryawan').serialize();
    $.ajax({
      dataType:"json",
      type:$('meta[name=method]').attr('content'),
      url:form_aksi,
      data:form,
      success: function(result){
          $('#modal-default').modal('hide');
      }});
    });
  });
</script>
