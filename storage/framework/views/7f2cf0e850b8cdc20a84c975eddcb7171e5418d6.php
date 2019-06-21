<?php /* /opt/lampp/htdocs/sispenka/resources/views/karyawan/create.blade.php */ ?>
<form id="createKaryawan" action="<?php echo e(route('karyawan.store')); ?>">
  <div class="form-group">
    <label for="nik">NIK</label>
    <input class="form-control" type="text" name="nik" id="nik" value="" required>
    <label for="nama_karyawan">Nama Karyawan</label>
    <input class="form-control" type="text" name="nama_karyawan" id="nama_karyawan" value="" required>
    <label for="departemen">Departemen</label>
    <select class="form-control" name="departemen" id="departemen">
      <option value=""></option>
    </select>
    <label for="jabatan">Jabatan</label>
    <select class="form-control" name="jabatan" id="jabatan">
      <option value=""></option>
    </select>
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
      type:"POST",
      url:form_aksi,
      data:form,
      success: function(result){
        if (result == 'success') {
          $('#modal-default').modal('hide');
          swal("Berhasil", "Karyawan telah ditambahkan", "success");
        } else {
          swal("Gagal", "Karyawan sudah pernah ditambahkan", "error");
        }
      }});
    });
  });
</script>
