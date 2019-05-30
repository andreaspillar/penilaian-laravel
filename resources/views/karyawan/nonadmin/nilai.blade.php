@extends('layouts/modals')

@section('modal-head')
<script type="text/javascript">
  $('.modal .modal-title').html("Nilai {{$karyawan->nama_karyawan}} - {{$karyawan->departemen}}");
</script>
@endsection

@section('modal-body')
<form id="nilaiKaryawan" action="{{route('NilaiKaryawan.nilai', $karyawan->id_karyawan)}}">
  <div class="form-group">
    <table class="table">
    @foreach ($kriteria as $krit)
      <tr>
        <td hidden><input class="form-control" type="text" name="id_kriteria[{{$krit->id_kriteria}}]" id="id_kriteria[{{$krit->id_kriteria}}]" value="{{$krit->id_kriteria}}" required></td>
        <td><h5><b>{{ $krit->nama_kriteria }}</b></h5></td>
        <td>
          <select class="form-control" type="text" name="nil[{{$krit->id_kriteria}}]" id="nil[{{$krit->id_kriteria}}]" required>
            @foreach ($val as $v)
            <option value="{{$v->nilai_value}}">{{$v->alias_value}}</option>
            @endforeach

          </select>
        </td>
      </tr>
    @endforeach
  </table>
  </div>
</form>
@endsection

@section('modal-send-button')
<button type="button" class="btn btn-primary pull-right saveNilaiKaryawan">Simpan</button>
@endsection

@section('modal-script')
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
      type:"POST",
      url:form_aksi,
      data:form,
      success: function(result){
          $('#karyawancrud').DataTable().ajax.reload(null, false);
          $('#modal-default').modal('hide');
      }});
    });
  });
</script>
@endsection
