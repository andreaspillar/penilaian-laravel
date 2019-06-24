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
        @endforeach
        <td class="A{{$karyawan->id_karyawan.$kriteria->id_kriteria}}" >{{$nilai->nilai_karyawan/100}}</td>
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
      </tr>
        @endforeach
        <form class="uptd" action="#">
          @foreach($getKaryawans as $karyawan)
          <tr>
            <td><input class="form-control" type="text" name="id[{{$karyawan->id_karyawan}}]" value="{{$karyawan->id_karyawan}}"></td>
            <td><input class="form-control Result{{$karyawan->id_karyawan}}" type="text" name="ne[{{$karyawan->id_karyawan}}]"></td>
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
          $('.Result{{$karyawan->id_karyawan}}').val(sum.toFixed(5));
        });
        </script>
        @endforeach

        <script type="text/javascript">
        $(document).ready(function () {
            form = $(".uptd").serialize();
            console.log(form);
            $('.nilaiEmployer').click(function(e){
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              $.ajax({
                dataType: "json",
                type : $('meta[name=methodtwo]').attr('content'),
                url : $('#updateNilaiKaryawan').attr('action'),
                data: form,
                success: function(result){
                  // if(result == 'success'){
                    // swal("Berhasil", "Karyawan telah dinilai", "success")
                  // }
                  console.log(result);
                }
              });
            });
          });
        </script>
    </tbody>
  </table>
</div>
