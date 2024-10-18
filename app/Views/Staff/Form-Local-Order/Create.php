<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>


<style>
   
    input:invalid, textarea:invalid {
    border: 2px solid red;
}

input:valid, textarea:valid {
    border: 2px solid green;
}


.tableFixHead {
    overflow: auto;
    height: 600px; /* Atur tinggi sesuai kebutuhan */
    border-collapse: collapse;
}

.tableFixHead thead th {
    position: -webkit-sticky; /* Untuk browser berbasis Webkit */
    position: sticky;
    top: 0; /* Posisi atas header */
    background-color: #f4f4f4; /* Warna latar belakang header */
    z-index: 10; /* Pastikan header berada di atas konten */
}

.tableFixHead th {
    position: -webkit-sticky;
    position: sticky;
    top: 0; /* Menempel di bagian atas tabel */
    background: #f4f4f4; /* Warna latar belakang untuk visibilitas */
    z-index: 10; /* Pastikan header di atas konten lainnya */
}

.tableFixHead th, .tableFixHead td {
    padding: 0.5em; /* Sesuaikan padding jika diperlukan */
    text-align: center;
    border: 1px solid #ddd; /* Tambahkan border jika diperlukan */
}

.tableFixHead th[colspan] {
    background-color: #f4f4f4; /* Warna latar belakang untuk kolom header multi-colspan */
    z-index: 10; /* Pastikan berada di atas */
}

.selected-item {
    background-color: #B3EAE5; /* Contoh warna latar belakang */
}

</style>



<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1><?= $title ?></h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="<?= base_url('Local-order')?>">Back</a></li>
<li class="breadcrumb-item active"><?= $title ?></li>
</ol>
</div>
</div>
</div>
</section>

<form onsubmit="return false" id="formLoAgain">   
<!--start view for user -->
  <section class="content col-md-12">
        <!-- Default box -->
        <div class="card" style="width: 2560px;" id="accessDanied">
        <!-- <div class="card"> -->
          <div class="card-header">
            <h3 class="card-title font-weight-bolder text-dark">HEADER</h3>

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
            <!-- start code header -->
          <div class="col-md-6 mt-2">
				<table>
					
                <div class="row">
            <div class="col-md-4">
				<table style="width: 100%;">


               
                <div class="form-group row ml-6">
					<label class="col-sm-2 col-form-label text-uppercase">local order Month:</label>
					<div class="col-sm-5">
                    <input type="text" name="monthandyear" value="<?php 
						      $bulan = date("m"); 
							  echo date('m');
							  echo "/";
							  echo date('Y');
							   ?>" id="monthandyear"
						 class="form-control" placeholder="">
					</div>
				</div>


				<div class="form-group row ml-6">
					<label class="col-sm-2 col-form-label text-uppercase">Division Request :</label>
					<div class="col-sm-5">
						<select name="divisis" id="divisis" class="form-control">
                            <option value="">-SELECT-</option>
                                <?php 
                                $sessiondata = session()->get('Division');
                                $divisi=explode(",", $sessiondata);
                                foreach ($divisi as $key => $data) { ?>
                                <option value="<?= $data ?>"><?= $data ?></option>
                                <?php  } ?>
                        </select>
					</div>
				</div>

                <div class="form-group row ml-6">
					<label class="col-sm-2 col-form-label text-uppercase">NO LOCAL ORDER:</label>
					<div class="col-sm-5">
                    <input type="text" value="" id="nolocalorder" name="nolocalorder" placeholder="******************"  class="form-control" readonly> 
                    <input type="hidden" id="temporaryDivisi" name="temporaryDivisi" class="form-control" readonly> 
					</div>
				</div>

                <div class="form-group row ml-6">
					<label class="col-sm-2 col-form-label text-uppercase">View Data :</label>
					<div class="col-sm-5">
                    <button id="openModal" class="btn btn-outline-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-search" aria-hidden="true"></i> views Part Divisi</button>
					</div>
				</div>

				</table>
			</div>
            <!-- end code header -->
          </div>
       
       <hr>
        <!-- DETAIL box -->
          <div class="card-header">
       <h3 class="card-title text-dark font-weight-bolder float-left">DETAIL</h3>
            <div class="card-tools">
            </div>
          </div>
          <div class="card-body">
           <!-- start code Button -->
			
            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#userGuideModal">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Informasi Cara Penggunaan <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            </button>
            <a href="" id="reset"  class="btn btn-outline-warning btn-sm clicks2"><i class="fa fa-undo"></i> Reset</a>
            <button type="button" id="saveButton" class="btn btn-sm btn-outline-info"><i class="fa fa-save"></i> Save Data</button>
            <!-- end code Button -->
            <hr>
            <!-- start code check -->
            <div class="row mt-1">
            <div class="input-group col-md-2 mb-1">
            </div>
            </div>
             <!-- end code check -->

             <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- <div class="responsive-table"> -->
        <div class="table-responsive tableFixHead">
        <table id="selectedItemsTable" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th rowspan="2" scope="col" style="text-align:center; width:2%;">No</th>
        <th rowspan="2" scope="col" style="text-align:center;">Part ID</th>
        <th rowspan="2" scope="col" style="text-align:center;">Part Name</th>
        <th rowspan="2" scope="col" style="text-align:center;" width="3%">Safety Stock</th>
        <th rowspan="2" scope="col" style="text-align:center;" width="3%">Standard Pack</th>
        <th rowspan="2" scope="col" style="text-align:center;" width="3%">Minimum Order</th>
        <th rowspan="2" scope="col" style="text-align:center;" width="10%" class="note-column">Note</th>
        <th rowspan="2" scope="col" style="text-align:center; color:blue;" width="3%">
            Stock <?php
            $now = new DateTime();
            $previousMonth = $now->modify('first day of -1 month');
            $zoro = $previousMonth->format('F');
            echo $zoro;
            ?>
        </th>
        <th colspan="7" scope="col" style="text-align:center; color:blue;">
            <?php 
            $bulan = date("F");
            echo $bulan;  
            ?>
        </th>
        <th colspan="3" style="text-align:center; color:blue;">
            <?php
            $now = new DateTime();
            $previousMonth = $now->modify('first day of +1 month');
            $zoro = $previousMonth->format('F');
            echo $zoro;
            ?>
        </th>
        <th rowspan="2" scope="col" style="text-align:center; color:blue;">
            Plan OUT 
            <?php
            $now = new DateTime();
            $previousMonth = $now->modify('first day of +2 month');
            $zoro = $previousMonth->format('F');
            echo $zoro;
            ?>
        </th>
    </tr>
    <tr>
        <th scope="col" style="text-align:center;">IN ACT 
           <span class="text-primary"><?php 
            $bulan = date("F");
            echo $bulan;  
            ?></span>
            </th>
        <th scope="col" style="text-align:center;">HPO 
        <span class="text-primary"><?php 
            $bulan = date("F");
            echo $bulan;  
            ?></span></th>
        <th scope="col" style="text-align:center;">OUT Plan 
        <span class="text-primary"><?php 
            $bulan = date("F");
            echo $bulan;  
            ?></span></th>
        <th scope="col" style="text-align:center;">Bal Plan 
        <span class="text-primary"><?php 
            $bulan = date("F");
            echo $bulan;  
            ?></span></th>
        <th scope="col" style="text-align:center;">Month Plan 
        <span class="text-primary"><?php 
            $bulan = date("F");
            echo $bulan;  
            ?></span></th>
        <th scope="col" style="text-align:center; background: yellow;">Order 
        <span class="text-primary"><?php 
            $bulan = date("F");
            echo $bulan;  
            ?></span></th>
        <th scope="col" style="text-align:center; background: yellow;">Order PO 
        <span class="text-primary"><?php 
            $bulan = date("F");
            echo $bulan;  
            ?></span></th>
        <th scope="col" style="text-align:center;">OUT Plan 
        <span class="text-primary"><?php
            $now = new DateTime();
            $previousMonth = $now->modify('first day of +1 month');
            $zoro = $previousMonth->format('F');
            echo $zoro;
            ?> </span></th>
        <th scope="col" style="text-align:center;">Bal Plan
        <span class="text-primary">
        <?php
            $now = new DateTime();
            $previousMonth = $now->modify('first day of +1 month');
            $zoro = $previousMonth->format('F');
            echo $zoro;
            ?>
        </span></th>
        <th scope="col" style="text-align:center;">Month Plan
            <span class="text-primary">
            <?php
            $now = new DateTime();
            $previousMonth = $now->modify('first day of +1 month');
            $zoro = $previousMonth->format('F');
            echo $zoro;
            ?>
            </span>
        </th>
    </tr>
    </thead>
    <tbody>
        <!-- Item yang dipilih akan ditambahkan di sini -->
    </tbody>
</table>
        </div>
    </div>
</div>
  </section>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Items </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" class="display" id="dataItemsTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Select</th> 
                            <th>Part ID</th>
                            <th>Part Name</th>
                            <th>Safety Stock</th>
                            <th>STD Pack</th>
                            <th>Min Order</th> 
                            <th>Unit StdPack</th>
                            <th>Unit Stock</th> 
                            <th>END Stock
                            <span class="text-primary">
                             <?php
                                $now = new DateTime();
                                $previousMonth = $now->modify('first day of -1 month');
                                $zoro = $previousMonth->format('F');
                                echo $zoro;
                             ?>
                            </span>
                            </th> 
                            <th>IN Actuals
                            <span class="text-primary">
                            <?php 
                            $bulan = date("F");
                            echo $bulan;  
                            ?>
                            </span>
                            </th> 
                            <th>HPO
                                <span class="text-primary">
                                <?php 
                                $bulan = date("F");
                                echo $bulan;  
                                ?>
                                </span>
                            </th> 
                            <th>Div</th>
                         
                        </tr>
                    </thead>
                    <tbody id="partID">
                        <tr>
                            <td colspan="13" class="text-center">Please select Divisi and no Local Order...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal user guide-->
<div class="modal fade" id="userGuideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Guide (Informasi Cara Penggunaan)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 class="font-weight-bold">Instruksi</h5>

        <p class="font-weight-bold text-danger">### Penjelasan Validasi Inputan</p>
        <p class="font-weight-bold">1. **Semua kolom "OUT Plan" wajib diisi.**</p>
        <p class="font-weight-bold">2. **Kolom keterangan boleh dibiarkan kosong.**</p>

        <p class="font-weight-bold text-danger">### Kegunaan Tombol</p>

        <p class="font-weight-bold">1. **Pilih Divisi**<br> 
        - Tombol ini akan menampilkan tombol "Add Parts" setelah Anda memilih divisi.<br><br>  
        
        <p class="font-weight-bold">1. **Pilih NO LOCAL ORDER**<br> 
        - Tombol ini akan menampilkan SELECT NO LOCAL ORDER pilih No untuk menambahkan item ke NO LOCAL ORDER Yang akan di tambahkan<br><br>  
  

        3. **Tombol Reset**<br>   
        - Tombol ini digunakan untuk mengembalikan atau mereset tampilan ke kondisi awal.<br> <br> 


        5. **Tombol Save Data**<br>   
        - Tombol ini digunakan untuk menyimpan semua data Local Order yang sudah dikalkulasi.<br><br>  


        7. **Jika dirasa semua data sudah sesuai, silakan simpan data.**<br><br> 

        8. **Data yang berhasil disimpan dapat Anda lihat di menu Report dan mencetaknya dari sana.** <br><br> </p>
        
       <p class="font-weight-bold text-danger">9. **pembuatan local order hanya dilakukan 1 kali saja (pastikan lebih teliti saat pembuatan).** <br><br></p> 
    
       <p class="font-weight-bold text-danger">9. **Jika ukuran layar terlalu lebar ke kanan anda bisa geser kanan** <br><br></p> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Does it Help (Close)</button>
      </div>
    </div>
  </div>
</div>

<!-- code support -->
<script>
     $(document).ready(function() {
            //code select 2
               $('#divisis').select2({
                    placeholder: "SELECT DIVISION",
                    theme: 'bootstrap4',
                    width: '100%'
               })


               $('#divisis').change(function() {
                    var nameDivisi = $('#divisis').val(); 
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
              });
</script>
<!-- // code get data -->
<script>
    $(document).ready(function() {
    var selectedItems = {}; // Objek untuk menyimpan status checkbox
    $('#divisis').change(function() {
        var nameDivisi = $('#divisis').val(); 
        if (nameDivisi != '') {
            $('#openModal').off('click').on('click', function() {
                $.ajax({
                    url: '<?= base_url('get-data-items'); ?>',
                    method: 'POST',
                    data: {
                        nameDivisi: nameDivisi
                    },
                    success: function(data) {
                        var html = '';
                        if (data.length === 0) {
                            html += '<tr><td colspan="12" class="text-center">No data available</td></tr>';
                        } else {
                            data.forEach(function(item, index) {
                                var isChecked = selectedItems[item.partID] ? 'checked' : '';
                                html += '<tr>';
                                html += '<td>' + (index + 1) + '</td>';
                                html += '<td>';
                                html += '<div class="form-group form-check">';
                                html += '<input type="checkbox" class="form-check-input select-item" id="check_' + item.partID + '" data-part-id="' + item.partID + '" data-part-name="' + item.PartName + '" data-safetystck="' + item.safety_Stock + '" data-stdpacks="'+ item.standart_Pack +'" data-minimumorders ="'+ item.minimum_Order +'" data-endstc="'+ item.endstock +'" data-inact="'+ item.InActual +'" data-hpo="'+ item.HPO +'" data-unitidstock="'+ item.UnitID_Stock +'" data-unitidpo="'+ item.UnitID_PO +'"  data-konv="'+ item.Konversi +'" data-otherid="'+ item.OtherID+'" ' + isChecked + '>';
                                html += '<label class="form-check-label" for="check_' + item.partID + '"></label>';
                                html += '</div>';
                                html += '</td>';
                                html += '<td>' + item.partID + '</td>';
                                html += '<td>' + item.PartName + '</td>';
                                html += '<td>' + item.safety_Stock + '</td>';
                                html += '<td>' + item.standart_Pack + '</td>';
                                html += '<td>' + item.minimum_Order + '</td>';
                                html += '<td>' + item.unitID_StdPack + '</td>';
                                html += '<td>' + item.UnitID_Stock + '</td>';
                                html += '<td>' + Math.round(item.endstock) + '</td>';
                                html += '<td>' + Math.round(item.InActual) + '</td>';
                                html += '<td>' + Math.round(item.HPO) + '</td>';
                                html += '<td>' + item.divisiID + '</td>';
                                html += '</tr>';
                            });
                        }
                        $('#partID').html(html);
                        $('#myModal').modal('show');

                        // Inisialisasi DataTable
                        if ($.fn.dataTable.isDataTable('#dataItemsTable')) {
                            $('#dataItemsTable').DataTable().destroy(); 
                        }
                        $('#dataItemsTable').DataTable({
                            responsive: true,
                            paging: true,
                            searching: true,
                            ordering: true,
                            columnDefs: [
                                { orderable: false, targets: [-1, 1, 2, 3, 4, 5, 6, 7, 8,9,10,11]  } // Nonaktifkan pengurutan di kolom checkbox
                            ]
                        });
                        // Atur status checkbox ketika modal dibuka
                        setCheckboxCheckedState();
                    },
                    error: function(xhr, status, error) {
                       alert('please select');
                        $('#partID').html('<tr><td colspan="12" class="text-center">AJAX request failed</td></tr>');
                    }
                });
            });
        }
    });

    function setCheckboxCheckedState() {
        // Periksa setiap checkbox dan set statusnya
        $('.select-item').each(function() {
            var partID = $(this).data('part-id');
            $(this).prop('checked', selectedItems[partID] === true);
        });
    }

    function setCheckboxChangeListener() {
        // Listener untuk checkbox
        $(document).on('change', '.select-item', function() {
            var partID = $(this).data('part-id');
            if ($(this).is(':checked')) {
                selectedItems[partID] = true; // Simpan status tercentang
                addToSelectedItemsTable(partID, $(this));
            } else {
                delete selectedItems[partID]; // Hapus dari objek
                removeFromSelectedItemsTable(partID);
            }
        });
    }

  
    function addToSelectedItemsTable(partID, checkbox) {
        // Hapus baris sebelumnya dengan partID yang sama
        removeFromSelectedItemsTable(partID);
        var rowCount = $('#selectedItemsTable tbody tr').length;
        $('#selectedItemsTable tbody').append(`<tr class="selected-item">
                 <td>${rowCount + 1}</td>
                 <td style="width: 10%;"><textarea name="partID[]" class="form-control" rows="2" cols="4" readonly>${partID}</textarea></td>
                 <td style="width: 10%;"><textarea name="PartName[]" class="form-control" rows="2" cols="4" readonly>${checkbox.data('part-name')} / ${checkbox.data('otherid')}</textarea></td>
                 <td><input type="text" name="safety_Stock[]" class="form-control safety_Stock" value="${checkbox.data('safetystck')}" readonly></td>
                 <td><input type="text" name="standart_Pack[]" class="form-control standart_Pack" value="${checkbox.data('stdpacks')}" readonly>
                  <input type="hidden" name="UnitID_Stock[]" id="UnitID_Stock" class="form-control UnitID_Stock" value="${checkbox.data('unitidstock')}" readonly> 
                  <input type="hidden" name="UnitID_PO[]" id="UnitID_PO" class="form-control UnitID_PO" value="${checkbox.data('unitidpo')}" readonly>
                  </td>
                 <td><input type="text" class="form-control minimum_Order" value="${checkbox.data('minimumorders')}"></td>
                 <td><textarea name="keterangan[]" class="form-control" rows="2" cols="4"></textarea></td>
                 <td><input type="text" name="endStockMonth1[]" class="form-control endStockMonth1" value="${ Math.round(checkbox.data('endstc'))}" readonly></td> 
                 <td><input type="text" name="inActualMonth2[]" class="form-control inActualMonth2" value="${ Math.round(checkbox.data('inact'))}" readonly></td> 
                 <td><input type="text" name="hpoMonth2[]" class="form-control hpoMonth2" value="${ Math.round(checkbox.data('hpo')) }" readonly></td>
                 <td><input type="number" min="0" name="outPlanMonth2[]" class="form-control outPlanMonth2"></td>
                 <td><input type="text" name="balancePlanMonth2[]" class="form-control balancePlanMonth2" readonly></td>
                 <td><input type="text" name="planMonth2[]" class="form-control planMonth2" readonly></td>
                 <td><input type="text" name="orderMonth2[]" class="form-control orderMonth2" readonly></td>
                 <td>
                  <input type="hidden" name="Konversi[]" class="form-control Konversi" value="${ Math.ceil(checkbox.data('konv')) }" readonly>
                  <input type="text" name="hasilKonversi[]" class="form-control hasilKonversi" readonly>
                 </td>
                 <td><input type="number" min="0" name="outPlanMonth3[]" class="form-control outPlanMonth3"></td>
                 <td><input type="text" name="balancePlanMonth3[]" class="form-control balancePlanMonth3" readonly></td>
                 <td><input type="text" name="planMonth3[]" class="form-control planMonth3" readonly></td>
                 <td><input type="number" min="0" name="outPlanMonth4[]" class="form-control outPlanMonth4"></td>
        </tr>`);
    }
    function removeFromSelectedItemsTable(partID) {
        $('#selectedItemsTable tbody tr').filter(function() {
            return $(this).find('td:nth-child(2)').text() === partID;
        }).remove();
        resetRowNumbers();
    }
    function resetRowNumbers() {
        $('#selectedItemsTable tbody tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }
    // Set listener untuk checkbox ketika dokumen dimuat
    setCheckboxChangeListener();
});
</script>
<script>
function calculateValues($row) {
    const endStockMonth1 = parseFloat($row.find('.endStockMonth1').val()) || 0;
    const inActualMonth2 = parseFloat($row.find('.inActualMonth2').val()) || 0;
    const hpoMonth2 = parseFloat($row.find('.hpoMonth2').val()) || 0;
    const outPlanMonth2 = parseFloat($row.find('.outPlanMonth2').val()) || 0;
    const planMonth2 = parseFloat($row.find('.planMonth2').val()) || 0;
    const safety_Stock = parseFloat($row.find('.safety_Stock').val()) || 0;
    const outPlanMonth3 = parseFloat($row.find('.outPlanMonth3').val()) || 0;
    const minimumOrder = parseFloat($row.find('.minimum_Order').val()) || 0;
    const standartPack = parseFloat($row.find('.standart_Pack').val()) || 0;

    // Hitung balancePlanMonth2
    const summing = endStockMonth1 + inActualMonth2 + hpoMonth2;
    const resultForoutPlanMonth2 = summing - outPlanMonth2;
    $row.find('.balancePlanMonth2').val(resultForoutPlanMonth2);

    // Hitung planMonth2
    const balancePlanMonth2 = parseFloat($row.find('.balancePlanMonth2').val());
    const outPlanMonths3 = parseFloat($row.find('.outPlanMonth3').val());
    const hasilBagi = outPlanMonths3 !== 0 ? balancePlanMonth2 / outPlanMonths3 : 0;
    const planMonth2Value = isFinite(hasilBagi) ? Math.round(hasilBagi * 10) / 10 : 0;
    $row.find('.planMonth2').val(planMonth2Value);

    let hasilOrder = endStockMonth1 + inActualMonth2 + hpoMonth2 - outPlanMonth2 - safety_Stock - outPlanMonth3;
    
    let order = Math.abs(hasilOrder);
    let mod = 0; 
    let mod2 = 0;
    let mod3 = 0;
    let newcallculasi = endStockMonth1 + inActualMonth2 + hpoMonth2;
    let totalNeeded = safety_Stock + outPlanMonth2 + outPlanMonth3;
  
    if (newcallculasi < totalNeeded) {    
        mod = order % standartPack;
        if (mod > 0) { 
            mod2 = standartPack - mod;
            mod3 = order + mod2;
        } else {
            mod3 = order;
        }
        let mod4 = Math.abs(mod3);
        if (mod4 < minimumOrder) {
            $row.find('.orderMonth2').val(Math.abs(minimumOrder));
        } else {
            if (mod3 > 0) {
                $row.find('.orderMonth2').val(mod4);
            } else {
                $row.find('.orderMonth2').val(0);
            }
        }
    } else {
        $row.find('.orderMonth2').val(0);
    }
}

// Event listener untuk perubahan input
$(document).on('input', '#selectedItemsTable input', function() {
    const $row = $(this).closest('tr'); // Dapatkan baris saat ini
    calculateValues($row); // Panggil fungsi perhitungan hanya untuk baris saat ini
});

// Function to calculate values for Month There
function calculateValuesMonthThere() {
    // Dapatkan baris yang sesuai dengan input yang diubah
    const $row = $(this).closest('tr');
    
    // Ambil nilai dari elemen di baris tersebut
    const getValueBalancePlanMonth2 = parseFloat($row.find('.balancePlanMonth2').val()) || 0;
    const getValueOrderMonth2 = parseFloat($row.find('.orderMonth2').val()) || 0;
    const getValueOutPlanMonth3 = parseFloat($row.find('.outPlanMonth3').val()) || 0;
    const getNoKonversiBasic = parseFloat($row.find('.Konversi').val()) || 0;

    // Hitung konversi dan hasil order
    const resultKonversiAndOrder = getNoKonversiBasic !== 0 ? getValueOrderMonth2 / getNoKonversiBasic : 0;
    $row.find('.hasilKonversi').val(Math.ceil(resultKonversiAndOrder));

    // Hitung jumlah untuk balancePlanMonth3
    const sumForBalancePlanMontTiga = getValueBalancePlanMonth2 + getValueOrderMonth2 - getValueOutPlanMonth3;

    // Set nilai untuk balancePlanMonth3
    $row.find('.balancePlanMonth3').val(Math.abs(sumForBalancePlanMontTiga));
}

// Update calculations when input fields change
$('#selectedItemsTable').on('input', 'input', function() {
    clearTimeout(window.calculateValuesMonthThereTimeout);
    // Panggil fungsi dengan konteks baris yang tepat
    window.calculateValuesMonthThereTimeout = setTimeout(calculateValuesMonthThere.bind(this), 300); // Debounce function call
});

// Initial calculation when the document is ready
$(document).ready(function() {
    $('#selectedItemsTable input').each(function() {
        calculateValuesMonthThere.call(this); // Panggil untuk setiap input
    });
});



// Function to calculate values for Month Four
function calculateValuesMonthFour() {
    const $row = $(this).closest('tr'); // Dapatkan baris yang sesuai dengan input yang diubah
    
    // Ambil nilai dari elemen di baris tersebut
    const getValueBalancePlanMonth2 = parseFloat($row.find('.balancePlanMonth2').val()) || 0;
    const getValueOrderMonth2 = parseFloat($row.find('.orderMonth2').val()) || 0;
    const getValueOutPlanMonth3 = parseFloat($row.find('.outPlanMonth3').val()) || 0;
    const getNoKonversiBasic = parseFloat($row.find('.Konversi').val()) || 0;
    const getValueOutPlanMonth4 = parseFloat($row.find('.outPlanMonth4').val()) || 0;

    // Hitung konversi dan hasil order
    const resultKonversiAndOrder = getNoKonversiBasic !== 0 ? getValueOrderMonth2 / getNoKonversiBasic : 0;
    $row.find('.hasilKonversi').val(resultKonversiAndOrder);

    // Hitung jumlah untuk balancePlanMonth3
    const sumForBalancePlanMontTiga = getValueBalancePlanMonth2 + getValueOrderMonth2 - getValueOutPlanMonth3;

    // Hitung hasil untuk planMonth3
    let resultForPlanMonth3 = getValueOutPlanMonth4 !== 0 ? sumForBalancePlanMontTiga / getValueOutPlanMonth4 : 0;

    // Pastikan hasil adalah finite dan set ke 0 jika tidak
    resultForPlanMonth3 = isFinite(resultForPlanMonth3) ? resultForPlanMonth3 : 0;

    // Perbarui nilai untuk planMonth3
    $row.find('.planMonth3').val(Math.round(resultForPlanMonth3 * 10) / 10);
}

// Update calculations when input fields change
$('#selectedItemsTable').on('input', 'input', function() {
    clearTimeout(window.calculateValuesMonthFourTimeout);
    window.calculateValuesMonthFourTimeout = setTimeout(calculateValuesMonthFour.bind(this), 300); // Debounce the function call
});

// Initial calculation when the document is ready
$(document).ready(function() {
    $('#selectedItemsTable input').each(function() {
        calculateValuesMonthFour.call(this); // Panggil untuk setiap input
    });
});

</script>


<!-- code save data -->
<script>
$('#saveButton').click(function() {
    let isValid = true;
    let errorMessage = '';
    let missingFields = [];

    $('#selectedItemsTable tbody tr').each(function() {
        let row = $(this);
        let itemData = {
            outPlanMonth2: row.find('input[name="outPlanMonth2[]"]').val(),
            outPlanMonth3: row.find('input[name="outPlanMonth3[]"]').val(),
            outPlanMonth4: row.find('input[name="outPlanMonth4[]"]').val()
        };
        

        // Reset missingFields array for each row
        missingFields = [];
        // Check for missing fields
        if (!itemData.outPlanMonth2) missingFields.push('out Plan Month 2');
        if (!itemData.outPlanMonth3) missingFields.push('out Plan Month 3');
        if (!itemData.outPlanMonth4) missingFields.push('out Plan Month 4');
        // If there are missing fields, update isValid and errorMessage
        if (missingFields.length > 0) {
            isValid = false;
            errorMessage = 'Column(Kolom) ' + missingFields.join(', ') + ' Not filled yet(Belum Di isi) ';
            return false; // Exit the loop
        }
    });

    if (isValid) {
        // Proceed with form submission or other actions
        //start proses aksi kirim data
            $.ajax({
                    url: '<?= base_url('send-data-request-order') ?>',
                    method: 'POST',
                    data: $('#formLoAgain').serialize(),
                    success: function(response) {
                if (response.trim() === 'oke') {
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: "Failed to save data!",
                    }).then(function() {
                        $('#saveButton').prop('disabled', true).text('Data Save Failed');
                         window.location.href = '<?= base_url('Form-Local-Order') ?>';
                    });
                    
                } else {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: "Success save data!",
                    }).then(function() {
                        $('#saveButton').prop('disabled', false).text('Success Save Data');
                         window.location.href = '<?= base_url('Form-Local-Order') ?>';
                    });

                }
            },

        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "Tidak Ada Data Yang Di kirim.",
            }).then(function() {
                $('#buttonSubmit').prop('disabled', false).text('OKE');
            });
        }

    });
// //endproses kirim data

    } else {
        Swal.fire({
            icon: "error",
            title: "Error Validations",
            text: errorMessage,
        });
    }
});
</script>
<script src="<?= base_url() ?>assets/backend/vendors/sweetalert2/sweetalert2.min.js"></script>
<script>
    const today = new Date();
    const dayOfMonth = today.getDate();

    // Tentukan tanggal di mana form bisa ditampilkan, misalnya tanggal 5 hingga 10 setiap bulan
    const startDay = 5;
    const endDay = 30;

    if (dayOfMonth >= startDay && dayOfMonth <= endDay) {
        document.getElementById('accessDanied').style.display = 'block';
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Akses Terbatas',
            text: 'Formulir ini hanya dapat diakses antara tanggal ' + startDay + ' hingga ' + endDay + ' setiap bulan.',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'Local-order'; // or 'Local-order' if that's the correct path
        });
    }
</script>


<?= $this->endSection() ?>