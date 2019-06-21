<?php /* /var/www/html/sispenka/resources/views/analisa/tableresults.blade.php */ ?>
<div class="box-header">
  <h5 class="box-title">Mencari Nilai Maximum</h5>
</div>
<div class="tableResult box-body table-responsive">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <td><b>Karyawan</b></td>
        <?php $__currentLoopData = $getKriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <td><?php echo e($kriteria->nama_kriteria); ?></td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $getKaryawans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $karyawan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($karyawan->nama_karyawan); ?></td>
        <?php $__currentLoopData = $getKriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $getNilaiKaryawans = DB::table('nilai_karyawans')->where('id_kriteria',$kriteria->id_kriteria)->where('id_karyawan',$karyawan->id_karyawan)->get();
        ?>
        <?php $__currentLoopData = $getNilaiKaryawans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nilai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <td class="A<?php echo e($karyawan->id_karyawan.$kriteria->id_kriteria); ?>" ><?php echo e($nilai->nilai_karyawan/100); ?></td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td>Tertinggi</td>
        <?php $__currentLoopData = $getKriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <td class="MAX<?php echo e($kriteria->id_kriteria); ?>"></td>
        <script type="text/javascript">
        $(document).ready(function(){
          var array = [];
          <?php $__currentLoopData = $getKaryawans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $karyawan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          var val = parseFloat($('.A<?php echo e($karyawan->id_karyawan.$kriteria->id_kriteria); ?>').text());
          array.push(val);
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          var maxvalue = Math.max(...array);
          $('.MAX<?php echo e($kriteria->id_kriteria); ?>').text(maxvalue);
        });
        </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <?php $__currentLoopData = $getKriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <td><?php echo e($kriteria->nama_kriteria); ?></td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tr>
      <tr>
        <?php $__currentLoopData = $getKriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <td class="Criteria<?php echo e($kriteria->id_kriteria); ?>"><?php echo e($kriteria->nilai_kriteria/100); ?></td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $getKaryawans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $karyawan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($karyawan->nama_karyawan); ?></td>
        <?php $__currentLoopData = $getKriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <td class="B<?php echo e($karyawan->id_karyawan.$kriteria->id_kriteria); ?>" ></td>
        <script type="text/javascript">
          $(document).ready(function(){
            var nilaiCell = parseFloat($('.A<?php echo e($karyawan->id_karyawan.$kriteria->id_kriteria); ?>').text());
            var nilaiMax = parseFloat($('.MAX<?php echo e($kriteria->id_kriteria); ?>').text());
            var hasilBagi = nilaiCell/nilaiMax;
            $('.B<?php echo e($karyawan->id_karyawan.$kriteria->id_kriteria); ?>').text(hasilBagi.toFixed(2));
          });
        </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <?php $__currentLoopData = $getKriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <td><?php echo e($kriteria->nama_kriteria); ?></td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $getKaryawans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $karyawan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($karyawan->nama_karyawan); ?></td>
        <?php $__currentLoopData = $getKriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <td class="C<?php echo e($karyawan->id_karyawan.$kriteria->id_kriteria); ?> total<?php echo e($karyawan->id_karyawan); ?>"></td>
        <script type="text/javascript">
          $(document).ready(function(){
            var criteriaValue = parseFloat($('.Criteria<?php echo e($kriteria->id_kriteria); ?>').text());
            var altValue = parseFloat($('.B<?php echo e($karyawan->id_karyawan.$kriteria->id_kriteria); ?>').text());
            var mltplyValue = criteriaValue*altValue;
            $('.C<?php echo e($karyawan->id_karyawan.$kriteria->id_kriteria); ?>').text(mltplyValue.toFixed(5));
          });
        </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $getKaryawans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $karyawan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <form class="uptd" action="#">
          <tr>
            <td><input class="form-control" type="text" name="id[<?php echo e($karyawan->id_karyawan); ?>]" value="<?php echo e($karyawan->id_karyawan); ?>"></td>
            <td><input class="form-control" type="text" name="ne[<?php echo e($karyawan->id_karyawan); ?>]" value="<?php echo e($karyawan->nilai); ?>"></td>
          </tr>
        </form>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <?php $__currentLoopData = $getKaryawans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $karyawan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <script type="text/javascript">
        $(document).ready(function(){
          var sum = 0;
          $('.total<?php echo e($karyawan->id_karyawan); ?>').each(function(e){
            sum += parseFloat($(this).text());
          });
          $('.Result<?php echo e($karyawan->id_karyawan); ?>').val(sum.toFixed(5));
        });
      </script>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>
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
