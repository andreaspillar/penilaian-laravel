@extends('layouts/modals')

@section('modal-head')
<script type="text/javascript">
  $('.modal .modal-title').html("Tambah Karyawan");
</script>
@endsection

@section('modal-body')
<form id="createKaryawan">
  <div class="form-group">
    <label for="nik">NIK</label>
    <input class="form-control" type="text" name="nomor_karyawan" id="nomor_karyawan" value="" required>
    <label for="nama_karyawan">Nama Karyawan</label>
    <input class="form-control" type="text" name="nama_karyawan" id="nama_karyawan" value="" required>
    <label for="departemen">Departemen</label>
    <select class="form-control" name="departemen" id="departemen">
      <?php use App\Departemen;
      $dep = Departemen::all(); ?>
      @foreach($dep as $d)
      <option value="{{$d->id_departemen}}">{{$d->departemen}}</option>
      @endforeach
    </select>
    <label for="jabatan">Jabatan</label>
    <select class="form-control" name="jabatan" id="jabatan">
      <?php use App\Jabatan;
      $jab = Jabatan::where('id_jabatan','>','1')->get()?>
      @foreach($jab as $j)
      <option value="{{$j->id_jabatan}}">{{$j->role}}</option>
      @endforeach
    </select>
  </div>
</form>
@endsection

@section('modal-send-button')
<button type="button" class="btn btn-primary pull-right storeKaryawan">Simpan</button>
@endsection

@section('modal-script')
<script type="text/javascript">
$(document).ready(function(){
  $.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });
  $(".storeKaryawan").click(function(e){
    e.preventDefault();
    form = $('#createKaryawan').serialize();
    $.ajax({
      dataType:"json",
      type:"POST",
      url:"{{route('karyawan.store')}}",
      data:form,
      success: function(result){
        if (result == 'success') {
          $('#karyawancrud').DataTable().ajax.reload(null, false);
          $('#modal-default').modal('hide');
          swal("Berhasil", "Karyawan telah ditambahkan", "success");
        } else {
          swal("Gagal", "Karyawan sudah pernah ditambahkan", "error");
        }
      }});
    });
  });
</script>
@endsection
