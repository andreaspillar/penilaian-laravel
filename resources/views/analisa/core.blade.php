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
            <h4 class="box-title">{{$getJabatan}}</h4>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-sm btn-default nilaiEmployer" data-href="{{route('karyawan.create')}}"><i class="fa fa-plus"></i>&nbsp&nbsp&nbspAnalisa</button>
            </div>
          </div>
          <div class="tableResult">
            <div class="box-header">
              <h5 class="box-title">Mencari Nilai Maximum</h5>
            </div>
            <div class="tableResult box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td><b>Karyawan</b></td>
                    @foreach($getKriterias as $kriteria)
                    <td>{{$kriteria->nama_kriteria}}</td>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($getKaryawans as $karyawan)
                  <tr>
                    <td>{{$karyawan->nama_karyawan}}</td>
                    @foreach($getKriterias as $kriteria)
                    <?php
                    $getNilaiKaryawans = DB::table('nilai_karyawans')->where('id_kriteria',$kriteria->id_kriteria)->where('id_karyawan',$karyawan->id_karyawan)->get();
                    ?>
                    @foreach($getNilaiKaryawans as $nilai)
                    <td class="A{{$karyawan->id_karyawan.$kriteria->id_kriteria}}" >{{$nilai->nilai_karyawan/100}}</td>
                    @endforeach
                    @endforeach
                  </tr>
                  @endforeach
                  <tr>
                    <td>Tertinggi</td>
                    @foreach($getKriterias as $kriteria)
                    <td class="MAX{{$kriteria->id_kriteria}}"></td>
                    <script type="text/javascript">
                    $(document).ready(function(){
                      var array = [];
                      @foreach($getKaryawans as $karyawan)
                      var val = parseFloat($('.A{{$karyawan->id_karyawan.$kriteria->id_kriteria}}').text());
                      array.push(val);
                      @endforeach
                      var maxvalue = Math.max(...array);
                      $('.MAX{{$kriteria->id_kriteria}}').text(maxvalue);
                    });
                    </script>
                    @endforeach
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="box-header">
              <h5 class="box-title">Mencari Hasil Bagi Baris terhadap Nilai Maximum</h5>
            </div>
            <div class="tableResult box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td rowspan="2"><b>Karyawan</b></td>
                    @foreach($getKriterias as $kriteria)
                    <td>{{$kriteria->nama_kriteria}}</td>
                    @endforeach
                  </tr>
                  <tr>
                    @foreach($getKriterias as $kriteria)
                    <td class="Criteria{{$kriteria->id_kriteria}}">{{$kriteria->nilai_kriteria/100}}</td>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($getKaryawans as $karyawan)
                  <tr>
                    <td>{{$karyawan->nama_karyawan}}</td>
                    @foreach($getKriterias as $kriteria)
                    <td class="B{{$karyawan->id_karyawan.$kriteria->id_kriteria}}" ></td>
                    <script type="text/javascript">
                      $(document).ready(function(){
                        var nilaiCell = parseFloat($('.A{{$karyawan->id_karyawan.$kriteria->id_kriteria}}').text());
                        var nilaiMax = parseFloat($('.MAX{{$kriteria->id_kriteria}}').text());
                        var hasilBagi = nilaiCell/nilaiMax;
                        $('.B{{$karyawan->id_karyawan.$kriteria->id_kriteria}}').text(hasilBagi.toFixed(2));
                      });
                    </script>
                    @endforeach
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="box-header">
              <h5 class="box-title">Operasi Hasil</h5>
            </div>
            <div class="tableResult box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td><b>Karyawan</b></td>
                    @foreach($getKriterias as $kriteria)
                    <td>{{$kriteria->nama_kriteria}}</td>
                    @endforeach
                    <td>Hasil Akhir</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach($getKaryawans as $karyawan)
                  <tr>
                    <td>{{$karyawan->nama_karyawan}}</td>
                    @foreach($getKriterias as $kriteria)
                    <td class="C{{$karyawan->id_karyawan.$kriteria->id_kriteria}} total{{$karyawan->id_karyawan}}"></td>
                    <script type="text/javascript">
                      $(document).ready(function(){
                        var criteriaValue = parseFloat($('.Criteria{{$kriteria->id_kriteria}}').text());
                        var altValue = parseFloat($('.B{{$karyawan->id_karyawan.$kriteria->id_kriteria}}').text());
                        var mltplyValue = criteriaValue*altValue;
                        $('.C{{$karyawan->id_karyawan.$kriteria->id_kriteria}}').text(mltplyValue.toFixed(5));
                      });
                    </script>
                    @endforeach
                    <td class="td{{$karyawan->id_karyawan}}"></td>
                  </tr>
                    @endforeach
                    <form class="uptd" action="{{route('updateNilaiKaryawan')}}">
                      @foreach($getKaryawans as $karyawan)
                      <tr hidden>
                        <td><input class="form-control" type="text" name="id[{{$karyawan->id_karyawan}}]" value="{{$karyawan->id_karyawan}}"></td>
                        <td><input class="checkResult form-control Result{{$karyawan->id_karyawan}}" type="text" name="ne[{{$karyawan->id_karyawan}}]"></td>
                      </tr>
                      @endforeach
                    </form>
                    @foreach($getKaryawans as $karyawan)
                    <script type="text/javascript">
                    $(document).ready(function(){
                      var sum = 0;
                      $('.total{{$karyawan->id_karyawan}}').each(function(e){
                        sum += parseFloat($(this).text());
                      });
                      $('.td{{$karyawan->id_karyawan}}').text(sum.toFixed(5));
                      $('.Result{{$karyawan->id_karyawan}}').val(sum.toFixed(5));
                    });
                    </script>
                    @endforeach
                    <script type="text/javascript">
                    $(document).ready(function(){
                      form = $(".uptd").serialize();
                      console.log(form);
                      checkRes = $(".checkResult").val()
                      if (isNaN(checkRes)) {
                        swal("Gagal", "Hasil tidak dapat ditampilkan", "error")
                      }
                      else {
                        $('.nilaiEmployer').click(function(e){
                          $.ajaxSetup({
                            headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                          });
                          $.ajax({
                            dataType: "json",
                            url  : $('.uptd').attr('action'),
                            type : $('meta[name=methodtwo]').attr('content'),
                            data : form,
                            success: function(result){
                              if(result == 'success'){
                                swal("Berhasil", "Karyawan telah dinilai", "success")
                              }
                              console.log(result);
                            }
                          });
                        });
                      }
                    });
                    </script>
                </tbody>
              </table>
            </div>
          </div>
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
