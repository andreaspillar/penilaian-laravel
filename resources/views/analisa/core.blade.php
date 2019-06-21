@extends('app')
@section('apps')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Analisa Karyawan
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h4 class="box-title">Jabatan</h4>
            <select class="searchJabatan" name="">
              <option selected disabled> Pilih Jabatan </option>
              @foreach($getJabatan as $jabatan)
              <option value="{{$jabatan->id_jabatan}}">{{$jabatan->role}}</option>
              @endforeach
            </select>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-sm btn-default nilaiEmployer" data-href="{{route('karyawan.create')}}"><i class="fa fa-plus"></i>&nbsp&nbsp&nbspAnalisa</button>
            </div>
          </div>
          <div class="tableResult">

          </div>
          <script type="text/javascript">
            $(document).ready(function(){
              $('.searchJabatan').on("change",function(){
                var search = $('.searchJabatan').val();
                var urlResult = 'tabelanalisa/';
                if (search != '') {
                  $('.tableResult').load(urlResult+search);
                }
              });
            });
          </script>
          <div class="box-footer">
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-sm btn-default nilaiEmployer"><i class="fa fa-plus"></i>&nbsp&nbsp&nbspAnalisa</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
