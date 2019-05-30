@extends('app')
@section('apps')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Halaman Utama
    </h1>
  </section>
  <?php
    use App\Karyawan;
    $ternilai = Karyawan::where('nilai', '!=', 0)->get();
    $belumnilai = Karyawan::where('nilai', '=', 0)->get();
  ?>
  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-check-circle"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Jumlah Karyawan <br>Ternilai</span>
            <span class="info-box-number">{{count($ternilai)}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-times-circle"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Karyawan Belum <br>Dinilai</span>
            <span class="info-box-number">{{count($belumnilai)}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <?php
      $tertinggi = Karyawan::max('nilai');
      $terendah = Karyawan::min('nilai');
      ?>
      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-thumbs-o-up"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Nilai Karyawan <br>Tertinggi</span>
            <span class="info-box-number">{!!$tertinggi!!}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-down"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Nilai Karyawan <br>Terendah</span>
            <span class="info-box-number">{!!$terendah!!}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Kriteria</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="kriteria" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama Kriteria</th>
                  <th>Nilai Kriteria</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="box-footer">
            <button type="button" class="btn btn-md btn-default insertKriteria btn-block text-center" data-href="{{route('kriteria.create')}}"><i class="fa fa-plus"></i>&nbsp&nbsp&nbspTambah Kriteria</button>
          </div>

        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <!-- MAP & BOX PANE -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Karyawan</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
                <div class="table-responsive">
                  <table id="karyawan" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Status Nilai</th>
                      </tr>
                    </thead>
                  </table>
                </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
