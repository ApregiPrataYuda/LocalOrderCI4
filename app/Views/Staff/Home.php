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
          <form method="post" action="<?php echo base_url('') ?>">
            <div class="card">
             
              <div class="card-header">
              <span>Menu Local Order</span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">


              <div class="row">
              <div class="col-lg-3 col-sm-12">
                <div class="small-box bg-info">
                <div class="inner">
                <h3>CREATE LO</h3>
                <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> For your create new Local Order</p>
                </div>
                <div class="icon">
                <i class="fas fa fa-newspaper"></i>
                </div>
                <a href="<?= base_url('Form-Local-Order')?>" class="small-box-footer">GO CREATE NEW LOCAL ORDER <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                

               
                <div class="col-lg-3 col-sm-12">
                <div class="small-box bg-info">
                <div class="inner">
                <h3>Check Part Divisi</h3>
                <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Check your part division</p>
                </div>
                <div class="icon">
                <i class="fas fa fa-check-square"></i>
                </div>
                <a href="<?= base_url('Parts-Division')?>" class="small-box-footer">GO CHECK YOUR PART DIVISION <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>


              

                <div class="col-lg-3 col-sm-12">
                <div class="small-box bg-info">
                <div class="inner">
                <h3>UPDATE LO</h3>
                <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> For your update Item Local Order</p>
                </div>
                <div class="icon">
                <i class="fas fa fa-edit"></i>
                </div>
                <a href="<?= base_url('Update-Local-Order')?>" class="small-box-footer">GO UPDATE ITEM LOCAL ORDER <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                




                <div class="col-lg-3 col-sm-12">
                <div class="small-box bg-info">
                <div class="inner">
                <h3>ADD NEW ITEM LO</h3>
                <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> To add new items if you forget </p>
                </div>
                <div class="icon">
                <i class="fas fa fa-plus-circle"></i>
                </div>
                <a href="<?= base_url('add-item-again')?>" class="small-box-footer">GO ADD  NEW ITEM LOCAL ORDER <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>


                
              </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </form>
          <!-- /.card-body -->
          <!-- /.card-footer-->
<div class="card-footer">
<button type="button" class="btn btn-outline-danger float-left" data-toggle="modal" data-target="#userGuideModal">
<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Informasi Cara Penggunaan <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
</button>
</div>
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
      <p class="font-weight-bold">1.Pilihan Menu:<br>
       Lanjutkan ke Pembuatan Local Order:
      Tekan tombol ini untuk melanjutkan ke menu pembuatan local order.</p>
      <p class="font-weight-bold">2.Kembali ke Halaman Part Divisi:<br>
      Tekan tombol ini untuk kembali ke halaman part divisi dan memeriksa kelengkapan data part divisi.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Does it Help (Close)</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>