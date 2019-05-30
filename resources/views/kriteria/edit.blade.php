@extends('layouts/modals')

@section('modal-head')
<script type="text/javascript">
  $('.modal .modal-title').html("Ubah Kriteria {{$kriteria->nama_kriteria}}");
</script>
@endsection

@section('modal-body')
<form id="editKriteria" action="{{route('kriteria.update',$kriteria->id_kriteria)}}">
  <div class="form-group">
    <label for="kriteria">Kriteria</label>
    <input class="kriteria form-control" type="text" name="kriteria" id="kriteria" value="{{$kriteria->nama_kriteria}}" required>
  </div>
</form>
@endsection

@section('modal-send-button')
<button type="button" class="btn btn-primary pull-right updateKriteria">Simpan</button>
@endsection

@section('modal-script')
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
@endsection
