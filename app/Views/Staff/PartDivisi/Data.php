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
<!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
<li class="breadcrumb-item active"><?= $title ?></li>
</ol>
</div>
</div>
</div>
</section>



<!--start view for user -->
  <section class="content">
  <div id="flash" data-flash="<?= session()->getFlashdata('success')?>">
        <!-- Default box -->
        <div class="card">
          <div class="card-header" style="background-color:RGB(40, 178, 170);">
          <a href="<?= base_url('Add-Part-Division')?>" class="btn btn-sm btn-outline-light"> <i class="fa fa-plus"></i> Add New Part</a>
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
          <form method="post" action="<?= base_url('show-data') ?>">
            <div class="row">
                <div>
                    <div class="form-group">
                    <label>FILTER FOR VIEW DATA</label>
                        <div class="input-group">
                            <div class="ml-1">
                            <select name="divisiID" id="divs" class="form-control col-md-15">
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

                            <button type="submit" name="filter" value="true" class="btn btn-outline-info">Showing <i class="fa fa-search"></i></button>
                                <?php
                                 if(isset($_GET['filter'])) 
                                echo '<a href="'.base_url('Part-Divisi').'" class="btn btn-outline-warning">RESET</a>';
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
          <table class="table table-bordered" id="tablePartDivisi">
                <thead>
                <tr class="table-info">
                      <th scope="col" style="width:2%">No</th>
                      <th scope="col">PartID</th>
                      <th scope="col">Part Name</th>
                      <th scope="col">Divisi</th>
                      <th scope="col">Standart Packing</th>
                      <th scope="col">Unit Standard Packing</th>
                      <th scope="col">Safety Stock</th>
                      <th scope="col">Minimum Order</th>
                      <th scope="col">Unit Stock</th>
                      <th scope="col">status</th>
                      <th scope="col"  style="width:5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                 $encryptionService = \Config\Services::encryptionService();
                    if(empty($row)){ // Jika data tidak ad
                        echo '<tr><td colspan="12" class="text-center"><div class="alert alert-warning" role="alert">
                           <p  class="font-weight-bolder">data not available!</p>   
                      </div></td></tr>';
                    }else{ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                       $no=1;
                        foreach($row as $key => $data){ // Looping hasil data 
                            echo "<tr>";
                            echo "<td>".$no++."</td>"; 
                            echo "<td>".$data->partID."</td>";
                            echo "<td>".$data->PartName."</td>";
                            echo "<td>".$data->divisiID."</td>";
                            echo "<td>".$data->standart_Pack."</td>";
                            echo "<td>".$data->unitID_StdPack."</td>";
                            echo "<td>".$data->safety_Stock."</td>";
                            echo "<td>".$data->minimum_Order."</td>";
                            echo "<td>".$data->UnitID_Stock."</td>"; 
                            echo "<td>".($data->Is_Active == 1 ? '<span class="badge badge-pill badge-info">AKTIF</span>' : '<span class="badge badge-pill badge-danger">NONAKTIF</span>')."</td>";
                            echo "<td>".'
                            <a id="btn-hapus" href="'.base_url('delete-part-divisi/'.$encryptionService->encryptId($data->id)).'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                            <a href="'.base_url('update-part-divisi/'.$encryptionService->encryptId($data->id)).'" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> </a>
                            '."</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
               </table>
        
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        <div class="card-footer">
<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#userGuideModal">
<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Informasi Cara Penggunaan <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
</button>
</div>
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
      <p class="font-weight-bold">1.Pilih divisi.</p>
      <p class="font-weight-bold">2.Klik tombol 'Showing'.</p>
      <p class="font-weight-bold">3.Data parts akan muncul sesuai dengan divisi yang dipilih.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Does it Help (Close)</button>
      </div>
    </div>
  </div>
</div>



<script>

      $(document).ready( function () {
      $('#tablePartDivisi').DataTable({
        "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      },
    );
      } );

$(document).ready(function() {
          $('#divs').select2({
                    placeholder: "SELECT A DIVISI",
                    allowClear: true,
                    theme: 'bootstrap4'
             });
        });
</script>
<?= $this->endSection() ?>