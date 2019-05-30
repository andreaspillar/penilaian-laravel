@extends('layouts/modals')

@section('modal-head')
<script type="text/javascript">
  $('.modal .modal-title').html("Ubah Detail Karyawan");
</script>
@endsection

@section('modal-body')
<form id="editKaryawan" action="{{route('karyawan.update', $karyawan->id_karyawan)}}">
  <div class="form-group">
    <label for="nik">NIK</label>
    <input class="form-control" type="text" name="nomor_karyawan" id="nomor_karyawan" value="{{$karyawan->nomor_karyawan}}" required>
    <label for="nama_karyawan">Nama Karyawan</label>
    <input class="form-control" type="text" name="nama_karyawan" id="nama_karyawan" value="{{$karyawan->nama_karyawan}}" required>
    <label for="departemen">Departemen</label>
    <select class="form-control" name="departemen" id="departemen">
      <?php use App\Departemen;
      $dep = Departemen::all(); ?>
      @foreach($dep as $d)
      @if($d->id_departemen==$karyawan->id_departemen)
      <option value="{{$d->id_departemen}}" selected>{{$d->departemen}}</option>
      @else
      <option value="{{$d->id_departemen}}">{{$d->departemen}}</option>
      @endif
      @endforeach
    </select>
    <label for="jabatan">Jabatan</label>
    <select class="form-control" name="jabatan" id="jabatan">
      <?php use App\Jabatan;
      $jab = Jabatan::where('id_jabatan','>','1')->get()?>
      @foreach($jab as $j)
      @if(($j->id_jabatan)==($karyawan->id_jabatan))
      <option value="{{$j->id_jabatan}}" selected>{{$j->role}}</option>
      @else
      <option value="{{$j->id_jabatan}}" >{{$j->role}}</option>
      @endif
      @endforeach
    </select>
  </div>
</form>
@endsection

@section('modal-send-button')
<button type="button" class="btn btn-primary pull-right updateKaryawan">Simpan</button>
@endsection

@section('modal-script')
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
@endsection
