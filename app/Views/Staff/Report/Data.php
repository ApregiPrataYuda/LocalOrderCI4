<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>


<style>
   
    /* Style umum untuk tabel */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1em;
    }
    .table th, .table td {
        padding: 0.5em;
        border: 1px solid #ddd;
        text-align: center;
    }
    .table th {
        background-color: #f4f4f4;
    }

    /* Responsive Table Wrapper */
    .responsive-table {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch; /* Enable smooth scrolling on iOS */
    }

    /* Hide some columns on smaller screens */
    @media screen and (max-width: 768px) {
        .table th, .table td {
            font-size: 0.8em;
        }
        .table th:nth-child(n+6),
        .table td:nth-child(n+6) {
            display: none;
        }
    }

    input:invalid, textarea:invalid {
    border: 2px solid red;
}

input:valid, textarea:valid {
    border: 2px solid green;
}

</style>



<section class="content-header"  id="tabelReport">
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
  <section class="content col-md-12">
        <!-- Default box -->
        <!-- <div class="card" style="width: 2560px;"> -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title font-weight-bolder text-dark">FILTER DATA REPORT</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
             
            </div>
          </div>
          <form method="post" action="<?= base_url('List-Report-Data') ?>">
          <div class="card-body">
            <!-- start code header -->
          <div class="col-md-6 mt-2">
				<table>
					<tr>
						<th style="width: 30%;" class="text-uppercase">select divisi:</th>
						<td>
                        <select name="divisi" id="divisi" class="form-control">
                            <option value="">-SELECT-</option>
                              <?php 
                                $division = session()->get('Division');
                                $divisi=explode(",", $division);
                                foreach ($divisi as $key => $data) { ?>
                                <option value="<?= $data ?>"><?= $data ?></option>
                                <?php  } ?>
                        </select>
						</td>
					</tr>
					</tr>

					

					<tr>
					<th style="width: 30%;" class="text-uppercase">Select No Local Order: </th>
						<td>
						<select name="noLo" id="noLocalOrder"  class="form-control mt-2">
                            <option value="">-SELECT-</option>

                        </select>
						</td>
					</tr>

                    <tr>
					<th style="width: 30%;" class="text-uppercase">Search: </th>
						<td>
                            <button id="searchNoLo" class="btn btn-outline-info btn-sm mt-1" style="display: none;"><i class="fa fa-search"></i> search data</button>
						
						</td>
					</tr>
				</table>
			</div>
            <!-- end code header -->
          </div>
   </form>

<div class="card-footer">
<button type="button" class="btn btn-outline-danger float-left" data-toggle="modal" data-target="#userGuideModal">
<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Informasi Cara Penggunaan <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
</button>
</div>
</section>

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
        <p class="font-weight-bold">Instruksi:</p>
            <p class="font-weight-bold">1.Pilih Divisi:<br>
            Setelah Anda memilih divisi, nomor local order akan otomatis muncul jika Anda pernah membuat local order sebelumnya.</p>
            <p class="font-weight-bold">2.Pilih Data Report:<br>
            Pilih data report sesuai dengan bulan yang ingin Anda tampilkan laporannya.</p>
            <p class="font-weight-bold">3.Pilih No Local Order: <br>
            Setelah memilih nomor local order, akan muncul tombol "Search". Silakan tekan tombol tersebut untuk melanjutkan.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Does it Help (Close)</button>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function() {
        $('#divisi').select2({
                    placeholder: "SELECT DIVISI",
                    theme: 'bootstrap4',
                    width: '100%'
               });


               $('#noLocalOrder').select2({
                    placeholder: "SELECT NO LOCAL ORDER",
                    theme: 'bootstrap4',
                    width: '100%'
               });

               $("#noLocalOrder").change(function () {
                    $("#searchNoLo").show(1000)
                })

                $('#divisi').change(function() {
                    var nameDivisi = $('#divisi').val(); 
                    if (nameDivisi != '') {
                        $.ajax({
                            url: '<?= base_url('send-divisi'); ?>',
                            method: 'POST',
                            data: {
                                nameDivisi: nameDivisi
                            },
                            success: function(data) {
                                $('#noLocalOrder').html(data); 
                            },
                            error: function(xhr, status, error) {
                                console.log('AJAX request failed:'); 
                            }
                        });
                    }
                });
       })


      
   


              

</script>
<?= $this->endSection() ?>