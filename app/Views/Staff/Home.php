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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
              <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Create Local Order</h5>
                      <br>
                      <p class="card-text">Place a local order by clicking the button below.</p>
                      <a href="<?= base_url('Form-Local-Order')?>" class="btn btn-outline-info">Go Next </a>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Check Your Part Divisi</h5>
                      <p class="card-text">If you want to check the division master part, click the button below.</p>
                      <a href="<?= base_url('Parts-Division')?>" class="btn btn-outline-info">Go Check</a>
                    </div>
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
        </div>
        <!-- /.card -->
  </section>
<!--start view for end -->
<?= $this->endSection() ?>