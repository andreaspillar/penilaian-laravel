<?php /* /opt/lampp/htdocs/sispenka/resources/views/kriteria/edit.blade.php */ ?>
<form id="kirkri" action="<?php echo e(route('kriteria.update',$kriteria->id_kriteria)); ?>">
  <div class="form-group">
    <label for="kriteria">Kriteria</label>
    <input class="kriteria form-control" type="text" name="kriteria" id="kriteria" value="<?php echo e($kriteria->nama_kriteria); ?>" required>
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
      type:$('meta[name="method"]').attr('content'),
      url:form_aksi,
      data:{
        kriteria:krit,
      },
      success: function(result){
          $('#modal-default').modal('hide');
          // window.location.reload();
      }});
    });
  });
</script>
