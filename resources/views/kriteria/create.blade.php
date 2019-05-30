@extends('layouts/modals')

@section('modal-head')
<script type="text/javascript">
  $('.modal .modal-title').html("Tambah Kriteria");
</script>
@endsection

@section('modal-body')
<form id="createKriteria" action="{{route('kriteria.store')}}">
  <div class="form-group">
    <label for="kriteria">Kriteria</label>
    <input class="kriteria form-control" type="text" name="kriteria" id="kriteria" value="" required>
  </div>
</form>
@endsection

@section('modal-send-button')
<button type="button" class="btn btn-primary pull-right storeKriteria">Simpan</button>
@endsection

@section('modal-script')
<script type="text/javascript">
$(document).ready(function(){
  $.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });
  $(".storeKriteria").click(function(e){
    e.preventDefault();
    var form_aksi = $('#createKriteria').attr('action');
    var krit  = $('.kriteria').val();
    $.ajax({
      dataType:"json",
      type:"POST",
      url:form_aksi,
      data:{
        kriteria:krit,
      },
      success: function(result){
        $('#kriteria').DataTable().ajax.reload(null, false);
        $('#modal-default').modal('hide');
        return false;
        // if (result == 'exceed') {
        //   swal("Gagal", "Kriteria sudah pernah ditambahkan", "error");
        // } else if (result == 'success') {
        //   swal("Berhasil", "Kriteria telah ditambahkan", "success");
        // }
      }
    });
    });
  });
</script>
@endsection
