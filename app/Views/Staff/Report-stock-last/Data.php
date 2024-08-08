<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1><?= $title ?></h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active"><?= $title ?></li> -->
</ol>
</div>
</div>
</div>
</section>



<!--start view for user -->
  <section class="content">
        <!-- Default box --> 
        <div class="card">
          <div class="card-header" style="background-color:RGB(40, 178, 170);">
            <h3 class="card-title text-light"><?= $title ?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  

              <form method="get" action="<?= base_url('Check-Stock-Last') ?>">
            <div class="row">
                <div>
                    <div class="form-group">
                        <label>Filter Data for Report Stock</label>
                        <div class="input-group">
                            <!-- <input type="text" id="datepicker" name="startDate" value="" class="form-control" placeholder="Start Date" autocomplete="off">
                            <span class="badge badge-secondary ml-1 mr-1">
                            <span class="badge badge-light mt-2 font-bold">From / To</span>
                            </span> -->
                            <input type="text" id="datepickers" name="enddate" value="" class="form-control" placeholder="End Date" autocomplete="off">
                            <div class="ml-1">
                            <select name="divisi" id="division" class="form-control col-md-12">
                                <option value="">SELECT A DIVISI</option>
                                <?php 
                                $sessiondata = session()->get('Division');
                                $divisi=explode(",", $sessiondata);
                                foreach ($divisi as $key => $data) { ?>
                                <option value="<?= $data ?>"><?= $data ?></option>
                                <?php  } ?>
                            </select>
                            </div>
                            <div class="ml-1">
                            <button type="submit" name="filter" value="true" class="btn btn-outline-info"><i class="fa fa-search"></i> Check data</button>
                                            <?php
                            if(isset($_GET['filter'])) 
                                echo '<a href="'.base_url('Check-Stock-Last').'" class="btn btn-outline-warning"><i class="fa fa-undo"></i> Reset</a>';
                            ?>
                          </div>
                            <div class="ml-1">
                             <div class="btn-group">
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="table-responsive" style="margin-top: 10px;">
            <table class="table table-bordered" id="tableStock">
                <thead class="thead-secondary">
                    <tr class="tr-secondary">
                        <th style="width: 5%;">No</th>
                        <th>Part ID</th>
                        <th>Part Name</th>
                        <th>Other ID</th>
                        <th style="width: 8%;" class="text-center">Unit ID Stock</th>
                        <th style="width: 8%;" class="text-center">Unit ID PO</th>
                        <th style="background-color: rgb(255,255,51)" class="text-center">End Stock</th>
                        <th class="text-center">Safety Stock</th>
                    </tr>
                </thead>
                <tbody>
                <?php $jumlahData = count($datarow);
                   if ($jumlahData > 0) { ?>

                  <?php
                  $no=1;
                   foreach ($datarow as $key => $value) { ?>
                   <tr>
                    <td><?= $no++;?></td>
                    <td><?= $value->partID?></td>
                    <td><?= $value->PartName?></td>
                    <td><?= $value->OtherID?></td>
                    <td class="text-center"><?= $value->UnitID_Stock?></td>
                    <td class="text-center"><?= $value->UnitID_PO?></td>
                    <td style="background-color: rgb(255,255,51);" class="text-center"><?= ($value->endstock == 0 ? '0' : $value->endstock)?></td>
                    <td class="text-center"><?= $value->safety_Stock?></td>
                   </tr>
                 <?php }?>
                 <?php } else { ?>
               
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong></strong> select date and division data.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <?php }?>
               
                </tbody>
               </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
              
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
<button type="button" class="btn btn-outline-danger float-left" data-toggle="modal" data-target="#userGuideModal">
<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Informasi Cara Penggunaan <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
</button>
</div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
  </section>
<!--start view for end -->


<!-- Modal user guide-->
<div class="modal fade" id="userGuideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Guide (Informasi Cara Penggunaan)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p class="font-weight-bold">1.Pilih Tanggal yang Akan Dicari: <br> Pilih tanggal yang sesuai dengan rentang waktu yang Anda inginkan untuk pencarian data.</p>
        <p class="font-weight-bold">2.Pilih Divisi:<br> Pilih divisi yang relevan dari daftar yang tersedia.</p>
        <p class="font-weight-bold">3.Klik Tombol Check:<br> Klik tombol "Check" untuk memproses dan mencari data berdasarkan tanggal dan divisi yang dipilih.</p>
        <p class="font-weight-bold">4.Data Akan Ditampilkan:<br> Data yang sesuai dengan kriteria pencarian akan ditampilkan di layar.</p>
        <p class="font-weight-bold">5.Reset:<br> Kembali Ke awal.</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Does it Help (Close)</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(function(){
    $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
    });

    $("#datepickers").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true
    });
});

$(document).ready(function() {
          $('#division').select2({
                    placeholder: "SELECT A DIVISI",
                    allowClear: true,
                    theme: 'bootstrap4'
             });
        });
</script>

<script>
    $(function() {
      $('#tableStock').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <?= $this->endSection() ?>