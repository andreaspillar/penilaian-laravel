@extends('app')
@section('apps')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Nilai Kriteria
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama Kriteria</th>
                  <th>Nilai Kriteria</th>
                </tr>
              </thead>
              <tbody>
                <form id="updateNilaiKriteria" action="{{route('updateNilaiKriteria')}}">
                @foreach($kriteria as $k)
                <tr>
                  <td hidden><input hidden class="form-control" type="text" name="id_kriteria[{{$k->id_kriteria}}]" value="{{$k->id_kriteria}}"></td>
                  <td class="col-md-4">{{$k->nama_kriteria}}</td>
                  <td class="col-md-4"><input class="form-control calculate" type="number" step="any" name="nk[{{$k->id_kriteria}}]" id="nk[{{$k->id_kriteria}}]" value="{{$k->nilai_kriteria}}" placeholder="Nilai {{$k->nama_kriteria}}"></td>
                </tr>
                @endforeach
              </form>
              </tbody>
              <tfoot>
                <tr class="bg-info">
                  <td class="col-md-8">Jumlah</td>
                  <td class="col-md-4"><input class="form-control jumlah" type="text" step="any" name="jumlah" id="jumlah" readonly></td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="box-footer">
            <div class="row">
              <div class="col-md-10">
                <span id="warning" class="bg-danger"></span>
              </div>
              <div class="col-md-2">
                <button class="btn btn-primary pull-right kirimNilai" type="button" name="button">Kirim Penilaian</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
$(document).ready(function(){var sum=0;$('.calculate').each(function(){sum+=parseFloat($(this).val())});$('.jumlah').val(sum);$('.calculate').change(function(){var sum=0;$('.calculate').each(function(){sum+=parseFloat($(this).val())});if(isNaN(sum)){$('.jumlah').val('!=Bilangan')}else{$('.jumlah').val(sum)}});$(".kirimNilai").click(function(e){form=$("#updateNilaiKriteria").serialize();if($(".jumlah").val()!='100'){swal("Gagal","Jumlah Nilai Tidak 100","error")}else{$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});$.ajax({dataType:"json",type:$('meta[name=methodtwo]').attr('content'),url:$('#updateNilaiKriteria').attr('action'),data:form,success:function(result){if(result=='success'){swal("Berhasil","Nilai Telah Diperbaharui","success")}console.log(result)}})}})});
</script>
@endsection
