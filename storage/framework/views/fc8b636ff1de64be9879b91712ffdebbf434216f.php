<?php /* /opt/lampp/htdocs/sispenka/resources/views/kriteria/create.blade.php */ ?>
<form id="kirkri" action="<?php echo e(route('kriteria.store')); ?>">
  <div class="form-group">
    <label for="kriteria">Kriteria</label>
    <input class="kriteria form-control" type="text" name="kriteria" id="kriteria" value="" required>
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
    var krit  = $('.kriteria').val();
    var form_aksi  = $('#kirkri').attr('action');
    $.ajax({
      dataType:"json",
      type:"POST",
      url:form_aksi,
      data:{
        kriteria:krit,
      },
      success: function(result){
        if (result == 'exceed') {
          swal("Gagal", "Kriteria sudah pernah ditambahkan", "error");
        } else {
          $('#modal-default').modal('hide');
          swal("Berhasil", "Kriteria telah ditambahkan", "success");
        }
      }});
    });
  });
</script>
