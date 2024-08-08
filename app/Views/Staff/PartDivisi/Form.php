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
<li class="breadcrumb-item"><a href="#">back</a></li>
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
<h3 class="card-title"><?= $title ?></h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>
<?php   $encryptionService = \Config\Services::encryptionService(); ?>
<div class="card-body">
<div class="container mt-0">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- <div class="card"> -->
                    
                    <div class="card-body">
                        <form action="<?= base_url('Store-data-part-divisi') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="mb-2">
                            <label for="partID"><span>Chose or Searching Part Name *</span> </label><br>
                            <button type="button" class="btn btn-outline-info col-md-5" data-toggle="modal" data-target="#partModal">
                            Searching Part Name  <i class="fa fa-search"></i>
                            </button>
                            </div>

                            <div class="form-group">
                                <label for="PartName" class="text-capitalize">Part Name*</label>
                                <input type="text" class="form-control" id="PartName" name="PartName" value="<?= set_value('PartName')?>" placeholder="Part Name" readonly>
                                <?php if (session()->get('errors.PartName')) : ?>
                                    <div class="text-danger"><?= esc(session()->get('errors.PartName')) ?></div>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label for="partID" class="text-capitalize">Part ID*</label>
                                <input type="text" class="form-control" id="partID" name="partID" value="<?= set_value('partID')?>" placeholder="Part ID" readonly>
                                <?php if (session()->get('errors.partID')) : ?>
                                    <div class="text-danger"><?= esc(session()->get('errors.partID')) ?></div>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                            <label class="text-capitalize">Divisi*</label>
                            <select name="divisiID" id="divisiID" class="form-control">
                            <option value="">-Pilih-</option>
                            <?php 
                                $sessiondata = session()->get('Division');
                                $divisi=explode(",", $sessiondata);
                                foreach ($divisi as $key => $data) { ?>
                                <option value="<?= $data ?>"><?= $data ?></option>
                                <?php  } ?>
                            </select>
                            <?php if (session()->get('errors.divisiID')) : ?>
                                <div class="text-danger"><?= esc(session()->get('errors.divisiID')) ?></div>
                            <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label for="standart_Pack" class="text-capitalize">Standar Packing*</label>
                                <input type="number" class="form-control" id="standart_Pack" name="standart_Pack" value="<?= set_value('standart_Pack')?>" placeholder="Enter standart Pack">
                                <?php if (session()->get('errors.standart_Pack')) : ?>
                                    <div class="text-danger"><?= esc(session()->get('errors.standart_Pack')) ?></div>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                            <label class="text-capitalize">Unit ID StdPack*</label>
                            <select name="unitID_StdPack" id="unitID_StdPack" class="form-control">
                            <option value="">-Select-</option>
                            <?php foreach ($unitData as $key => $value) { ?>
                                <option value="<?= $value['UnitID'] ?>"><?= $value['UnitID'] ?> - <?= $value['UnitName'] ?></option>
                            <?php  } ?>
                            </select>
                            <?php if (session()->get('errors.unitID_StdPack')) : ?>
                                <div class="text-danger"><?= esc(session()->get('errors.unitID_StdPack')) ?></div>
                            <?php endif ?>
                            </div>


                            <div class="form-group">
                                <label for="safety_Stock" class="text-capitalize">Safety Stock*</label>
                                <input type="number" class="form-control" id="safety_Stock" name="safety_Stock" value="<?= set_value('safety_Stock')?>" placeholder="Enter Safety Stock">
                                <?php if (session()->get('errors.safety_Stock')) : ?>
                                    <div class="text-danger"><?= esc(session()->get('errors.safety_Stock')) ?></div>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label for="minimum_Order" class="text-capitalize">Minimum Order*</label>
                                <input type="number" class="form-control" id="minimum_Order" name="minimum_Order" value="<?= set_value('minimum_Order')?>" placeholder="Enter minimum Order">
                                <?php if (session()->get('errors.minimum_Order')) : ?>
                                    <div class="text-danger"><?= esc(session()->get('errors.minimum_Order')) ?></div>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                            <label class="text-capitalize">Unit ID Stock**</label>
                            <select name="UnitID_Stock" id="UnitID_Stock" class="form-control">
                            <option value="">-Select-</option>
                            <?php foreach ($unitData as $key => $value) { ?>
                                <option value="<?= $value['UnitID'] ?>"><?= $value['UnitID'] ?> - <?= $value['UnitName'] ?></option>
                            <?php  } ?>
                            </select>
                            <?php if (session()->get('errors.UnitID_Stock')) : ?>
                                <div class="text-danger"><?= esc(session()->get('errors.UnitID_Stock')) ?></div>
                            <?php endif ?>
                            </div>


                            <div class="form-group">
                            <label class="text-capitalize">Status</label>
                            <select name="isActive" id="isActive" class="form-control">
                            <option value="">-Pilih-</option>
                            <option value="1" >AKTIF</option>
                            <option value="0" >NONAKTIF</option>
                            </select>
                            <?php if (session()->get('errors.isActive')) : ?>
                                <div class="text-danger"><?= esc(session()->get('errors.isActive')) ?></div>
                            <?php endif ?>
                            </div>


                            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-save"></i> Save</button>
                            <button type="reset" class="btn btn-outline-warning btn-sm"><i class="fa fa-undo"></i> Reset</button>
                        </form>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
<div class="card-footer">
<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#userGuideModal">
<i class="fa fa-exclamation-circle" aria-hidden="true"></i> informasi cara penggunaan <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
</button>
</div>
</div>
        <!-- /.card -->
</section>


<!-- Modal -->
<div class="modal fade" id="userGuideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Guide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="font-weight-bold">1. Pilih atau cari bagian Part divisi Anda.</p>
        <p class="font-weight-bold">2. Isi semua data dan sesuaikan dengan kebutuhan Anda.</p>
        <p class="font-weight-bold">3. Pastikan semua data diisi.</p>
        <p class="font-weight-bold">4. Setelah semua data terisi, tekan tombol 'Simpan'.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Does it Help (Close)</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Part-->
<div class="modal fade" id="partModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Part</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered" id="parts">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">PartID</th>
      <th scope="col">OtherID</th>
      <th scope="col">PartName</th>
      <th scope="col" style="width: 10%;">Handle</th>
    </tr>
  </thead>
  <tbody>
  
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--start view for end -->

<script>
      $(document).ready(function() {
          $('#divisiID').select2({
                    placeholder: "SELECT",
                    allowClear: true,
                    theme: 'bootstrap4',
                    width: '100%'
             });

             $('#unitID_StdPack').select2({
                    placeholder: "SELECT",
                    allowClear: true,
                    theme: 'bootstrap4',
                    width: '100%'
             });

             $('#UnitID_Stock').select2({
                    placeholder: "SELECT",
                    allowClear: true,
                    theme: 'bootstrap4',
                    width: '100%'
             });

             $(document).on('click', '#select', function() {
                       var partsid = $(this).data('ids');
                       var partsname = $(this).data('name');
                       $( '#partID').val(partsid);
                       $( '#PartName').val(partsname);
                       $( '#partModal').modal('hide');
        })
        });


        $(document).ready(function() {
            $('#parts').DataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "ajax": {
                    "url": "<?= site_url('View-Parts-Master') ?>",
                    "type": "POST"
                },
                "columns": [
                    { "data": "noUrut" },
                    { "data": "PartID" },
                    { "data": "OtherID"},
                    { "data": "PartName"},
                    { "data": "actions"}
                ],
                "columnDefs": [
                          {
                            "targets": [3,4],
                            "orderable": false,
                          }
                        ]
            });
        });
</script>

<?= $this->endSection() ?>