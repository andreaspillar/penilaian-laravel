@extends('layouts/modals')

@section('modal-head')
<script type="text/javascript">
  $('.modal .modal-title').html("Nilai {{$namaKaryawan}}");
</script>
@endsection

@section('modal-body')
<form id="nilaiKaryawan" action="{{route('NilaiKaryawan.update',$id_karyawan)}}">
  <div class="form-group">
    <table class="table">
    @foreach ($nilaiKaryawan as $nK)
      <tr>
        <td hidden><input class="form-control" type="text" name="id_kriteria[{{$nK->id_kriteria}}]" id="id_kriteria[{{$nK->id_kriteria}}]" value="{{$nK->id_kriteria}}" required></td>
        <td><h5><b>{{ $nK->nama_kriteria }}</b></h5></td>
        <td>
          <select class="form-control" type="text" name="nil[{{$nK->id_kriteria}}]" id="nil[{{$nK->id_kriteria}}]" required>
            @foreach ($val as $v)
            @if ($nK->nilai_karyawan == $v->nilai_value)
            <option value="{{$v->nilai_value}}" selected>{{$v->alias_value}}</option>
            @else
            <option value="{{$v->nilai_value}}">{{$v->alias_value}}</option>
            @endif
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
      type:$('meta[name="method"]').attr('content'),
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
