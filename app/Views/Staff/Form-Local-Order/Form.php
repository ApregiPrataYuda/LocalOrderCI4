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



<form onsubmit="return false" id="form_lo">   
<!--start view for user -->
  <section class="content col-md-12">
        <!-- Default box -->
        <!-- <div class="card" style="width: 2560px;"> -->
        <div class="card">
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
					<tr>
						<th style="width: 30%;" class="text-uppercase">local order Month :</th>
						<td><input type="text" name="monthandyear" value="<?php 
						      $bulan = date("m"); 
							  echo date('m');
							  echo "/";
							  echo date('Y');
							   ?>" id="monthandyear"
						 class="form-control" placeholder=""> 
						</td>
					</tr>
					</tr>

					<tr>
						<th style="width: 30%;" class="text-uppercase">Number local order :</th>
                            <td><input type="text" value="" id="nolocalorder" name="nolocalorder" placeholder="**************************"  class="form-control" readonly> </td>
                            <input type="hidden" id="temporaryDivisi" name="temporaryDivisi" class="form-control" readonly> 
                        </td>
					 </tr>

					<tr>
					<th style="width: 30%;" class="text-uppercase">Divisi request: </th>
						<td>
						<select name="divisis" id="divisis" class="form-control">
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
				</table>
			</div>
            <!-- end code header -->
          </div>
       
       <hr>
        <!-- DETAIL box -->
          <div class="card-header">
       <h3 class="card-title text-dark font-weight-bolder float-left">DETAIL</h3>
            <div class="card-tools">
              <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <div class="card-body">

           <!-- start code Button -->
            <a id="getPartsDivisi" class="btn btn-outline-info btn-sm clicks" style="display:none;"><i class="fa fa-plus"></i> Add Parts </a>
			<a href="<?= base_url('Form-Local-Order')?>" id="reset"  class="btn btn-outline-warning btn-sm clicks2" style="display:none;"><i class="fa fa-undo"></i> Reset</a>
            <button type="button" class="btn btn-outline-danger btn-sm removeButton" id="checkData" style="display:none;"><i class="fa fa-trash"></i> Remove Item</button>
            <button type="button" id="saveButton" class="btn btn-sm btn-outline-info" style="display:none;"><i class="fa fa-paper-plane"></i> Save</button>
            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#userGuideModal">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Informasi Cara Penggunaan <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            </button>
            <!-- end code Button -->
           <hr>
            <!-- start code check -->
            <div class="row mt-1">
                <!-- dimantikan karena default sudah digunakan -->
            <!-- <div class="input-group col-md-2 mb-1">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <input type="checkbox" class="cekList" id="cekList" name="cekList" value="using-formula-1">
                </div>
            </div>
             <input type="text" class="form-control font-weight-bold text-uppercase" readonly placeholder="Formula Opsional">
            </div> -->
       
            <div class="input-group col-md-2 mb-1">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <input type="checkbox" aria-label="Checkbox for following text input" name="checkedAll" id="checkAll">
                </div>
            </div>
             <input type="text" data-toggle="modal" data-target="#removeNoteModal" class="form-control font-weight-bold text-uppercase text-dark" aria-label="Check For Remove" readonly placeholder="Checks For Remove">
            </div>
            </div>
             <!-- end code check -->

             <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="responsive-table">
            <table class="table table-bordered table-striped example2 display" id="tbl_po_list">
                <thead>
                    <tr>
                        <th rowspan="2" scope="col" style="text-align:center; width:2%;">No</th>
                        <th rowspan="2" scope="col" style="text-align:center;"></th>
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
                        <!-- <th rowspan="2" scope="col" style="text-align:center;"></th> -->
                    </tr>
                    <tr>
                        <th scope="col" style="text-align:center; width:3%;">IN ACT</th>
                        <th scope="col" style="text-align:center;">HPO</th>
                        <th scope="col" style="text-align:center;">OUT Plan</th>
                        <th scope="col" style="text-align:center;">Bal Plan</th>
                        <th scope="col" style="text-align:center;">Month Plan</th>
                        <th scope="col" style="text-align:center; background: yellow;">Order</th>
                        <th scope="col" style="text-align:center; background: yellow;">Order PO</th>
                        <th scope="col" style="text-align:center;">OUT Plan</th>
                        <th scope="col" style="text-align:center;">Bal Plan</th>
                        <th scope="col" style="text-align:center;">Month Plan</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data rows will be inserted here -->
                </tbody>
            </table>
        </div>
    </div>
</div>



          <!-- /.card-body -->
          <!-- /.card-footer-->
        <!-- /.card -->
  </section>

  <!-- Modal warning checkbox Remove delete-->
<div class="modal fade" id="removeNoteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           1. yang Terceklist Hanya Item Data yang Akan Anda Hapus(Remove)
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

        2. **Tombol Add Parts**<br>   
        - Klik tombol ini untuk menampilkan data part sesuai dengan divisi yang telah Anda pilih.<br><br>  

        3. **Tombol Reset**<br>   
        - Tombol ini digunakan untuk mengembalikan atau mereset tampilan ke kondisi awal.<br> <br> 

        4. **Tombol Remove Item**<br>   
        - Tombol ini digunakan untuk menghapus semua data yang tercentang (checkbox) dari daftar.<br><br>  

        5. **Tombol Save Data**<br>   
        - Tombol ini digunakan untuk menyimpan semua data Local Order yang sudah dikalkulasi.<br><br>  

        6. **Checkbox [Remove for All]**<br>   
        - Centang checkbox ini untuk memilih semua data. Data yang tercentang adalah data yang akan dihapus ketika Anda klik tombol "Remove Item". Data yang tidak dicentang adalah data yang akan dipilih untuk dilakukan kalkulasi Local Order.<br><br>  

        7. **Jika dirasa semua data sudah sesuai, silakan simpan data.**<br><br> 

        8. **Data yang berhasil disimpan dapat Anda lihat di menu Report dan mencetaknya dari sana.** <br><br> </p>
        
       <p class="font-weight-bold text-danger">9. **pembuatan local order hanya dilakukan 1 kali saja (pastikan lebih teliti saat pembuatan).** <br><br></p> 
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Does it Help (Close)</button>
      </div>
    </div>
  </div>
</div>


<script>
    // code get part divisi
 $(document).ready(function() {
    $('#divisis').on('change', function() {
        var selectedDivisi = $(this).val();
        $('#temporaryDivisi').val(selectedDivisi);
    });
   //code for get part based on divisi
    $(document).on('click', '#getPartsDivisi', function(){ 
        //get divisi
		var divisiResult = $('#temporaryDivisi').val()
        // validasi if divisi == null
        if (divisiResult == '') {
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Please Select Division!",
            });
        }else{
            //if divisi == 1
           
            var nom =1; 
            $.ajax({ 
                url: "<?= base_url('Data-Part-Divisi')?>",  
				data:{'divisi':divisiResult},
                type: "GET",   
				success :  function (result)
				 { 
					if (result) {
					let itemData = JSON.parse(result);
                    //start code untuk looping inputan
                    for (let i = 0; i < itemData.length; i++) {
                 // cek log
                // console.log(`Checking partID: ${itemData[i].partID}`);
                // console.log(`Element exists: `, $(`.kode${itemData[i].partID}`).length > 0);
                if ($(`.kode${itemData[i].partID}`).length === 0) {
                    // Tambahkan baris baru ke tabel
                    $('#tbl_po_list tbody').append(`
                        <tr class="tr_rows${nom} kode${itemData[i].partID} selected">
                                <!-- Konten tabel inputan-->
                                <td>${nom}</td>
                                <td class="text-center" style="width: 2%;">
                                    <input type="checkbox" name="checkboxselectall" id="checkAll" class="checkeds" title="Select All">
                                </td>
                                <!-- inputan partID-->
                                <td style="width: 10%;">
                                <textarea name="partID[]" rows="2" cols="10" class="form-control" readonly>${itemData[i].partID}</textarea>
                                </td>
                                <td style="width: 10%;">
                                    <textarea name="PartName[]" rows="2" cols="10" class="form-control" readonly>${itemData[i].PartName} / ${itemData[i].OtherID}</textarea>
                                </td>
                                <td style="width: 3%;">
                                    <input type="text" name="safety_Stock[]" class="form-control safety_Stock" value="${itemData[i].safety_Stock}" readonly>
                                </td>
                                <td style="width: 3%;">
                                    <input type="text" name="standart_Pack[]" class="form-control standart_Pack" value="${itemData[i].standart_Pack}" readonly>
                                    <input type="hidden" name="UnitID_Stock[]" id="UnitID_Stock" class="form-control UnitID_Stock" value="${itemData[i].UnitID_Stock}" readonly>\
                                    <input type="hidden" name="UnitID_PO[]" id="UnitID_PO" class="form-control UnitID_PO" value="${itemData[i].UnitID_PO}" readonly>\
                                </td>
                                <td style="width: 3%;">
                                    <input type="text" name="minimum_Order[]" class="form-control minimum_Order" value="${itemData[i].minimum_Order}" readonly>
                                </td>
                                <td style="width: 5%;">
                                    <textarea name="keterangan[]" rows="2" cols="10" class="form-control"></textarea>
                                </td>
                                <td style="width: 5%;">
                                    <input type="text" name="endStockMonth1[]" class="form-control endStockMonth1" value="${Math.round(itemData[i].endstock, 1)}" readonly>
                                </td>
                                <td style="width: 5%;">
                                    <input type="text" name="inActualMonth2[]" class="form-control inActualMonth2" value="${Math.round(itemData[i].InActual)}" readonly>
                                </td>
                                <td style="width: 5%;">
                                    <input type="text" name="hpoMonth2[]" class="form-control hpoMonth2" placeholder="0" value="${Math.round(itemData[i].HPO)}" readonly>
                                </td>
                                <td style="width: 6%;">
                                    <input type="text" name="outPlanMonth2[]" class="form-control outPlanMonth2" placeholder="0">
                                </td>
                                <td style="width: 6%;">
                                    <input type="text" name="balancePlanMonth2[]" class="form-control balancePlanMonth2" placeholder="0" readonly>
                                </td>
                                <td style="width: 4%;">
                                    <input type="text" name="planMonth2[]" class="form-control planMonth2" placeholder="0" readonly>
                                </td>
                                <td style="width: 4%; background: yellow;">
                                    <input type="text" name="orderMonth2[]" class="form-control orderMonth2" placeholder="0" readonly>
                                </td>
                                <td style="width: 4%; background: yellow;">
                                    <input type="hidden" name="Konversi[]" class="form-control Konversi" value="${Math.round(itemData[i].Konversi)}" readonly>
                                    <input type="text" name="hasilKonversi[]" class="form-control hasilKonversi" readonly>
                                </td>
                                <td style="width: 4%;">
                                    <input type="text" name="outPlanMonth3[]" class="form-control outPlanMonth3" placeholder="0">
                                </td>
                                <td style="width: 4%;">
                                    <input type="text" name="balancePlanMonth3[]" class="form-control balancePlanMonth3" placeholder="0" readonly>
                                </td>
                                <td style="width: 4%;">
                                    <input type="text" name="planMonth3[]" class="form-control planMonth3" placeholder="0" readonly>
                                </td>
                                <td style="width: 4%;">
                                    <input type="text" name="outPlanMonth4[]" class="form-control outPlanMonth4" placeholder="0">
                                </td>
                        </tr>
                    `);
                    // Increment nom
                    nom++;
                    // Tampilkan notifikasi sukses
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Success Get Parts - Divisi",
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    // Tampilkan notifikasi error jika data sudah ada
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Data already exists!",
                    });
                }
            }
					// end  code untuk looping inputan
                    }
                }
            });
        }
    });
});
</script>


<!-- code for calculation -->
<script>
$(document).ready(function() {
    // Event handler untuk keyup di dalam tabel
    $('#tbl_po_list').on('keyup', 'input, textarea', function(event) {
        // console.log('Key up event triggered in table cell');
        let activeElement = $(this);
        $('#tbl_po_list .selected').each(function() {
          //step 1  
         // start Fungsi untuk menghitung dan memperbarui Balance Plan Month 2
                // function updateBalancePlan() {
                //     $('#tbl_po_list tbody tr').each(function() {
                //         // Ambil data dari input field
                //         var endStockMonth1 = parseFloat($(this).find('.endStockMonth1').val()) || 0;
                //         var inActualMonth2 = parseFloat($(this).find('.inActualMonth2').val()) || 0;
                //         var hpoMonth2 = parseFloat($(this).find('.hpoMonth2').val()) || 0;
                //         var outPlanMonth2 = parseFloat($(this).find('.outPlanMonth2').val()) || 0;
                //         var planMonth2 = parseFloat($(this).find('.planMonth2').val()) || 0;
                //         // Hitung total dan hasil perhitungan Balance Plan Month 2
                //         var summing = endStockMonth1 + inActualMonth2 + hpoMonth2;
                //         var resultForoutPlanMonth2 = summing - outPlanMonth2;
                //         // Set nilai pada input Balance Plan Month 2
                //         $(this).find('.balancePlanMonth2').val(resultForoutPlanMonth2.toFixed(2));
                //     });
                // }
                // // Panggil fungsi untuk update balance plan saat dokumen siap
                // updateBalancePlan();
                // // Panggil fungsi updateBalancePlan setiap kali ada perubahan dalam input
                // $('#tbl_po_list').on('input', 'input', function() {
                //     updateBalancePlan();
                // });
         // end Fungsi untuk menghitung dan memperbarui Balance Plan Month 2

        //  step 2
    //      function updateCalculations() {
    //     $('#tbl_po_list tbody tr').each(function() {
    //         // Ambil data dari input field
    //         var endStockMonth1 = parseFloat($(this).find('.endStockMonth1').val()) || 0;
    //         var inActualMonth2 = parseFloat($(this).find('.inActualMonth2').val()) || 0;
    //         var hpoMonth2 = parseFloat($(this).find('.hpoMonth2').val()) || 0;
    //         var outPlanMonth2 = parseFloat($(this).find('.outPlanMonth2').val()) || 0;
    //         var planMonth2 = parseFloat($(this).find('.planMonth2').val()) || 0;

    //         // Hitung total dan hasil perhitungan Balance Plan Month 2
    //         var summing = endStockMonth1 + inActualMonth2 + hpoMonth2;
    //         // var resultForoutPlanMonth2 = summing - outPlanMonth2;
    //         var resultForoutPlanMonth2 = (parseFloat(summing) - parseFloat(outPlanMonth2))
    //         $(this).find('.balancePlanMonth2').val(resultForoutPlanMonth2);

    //         // Hitung Month Plan ke 2
    //         var balancePlanMonth2 = Math.abs(parseFloat($(this).find('.balancePlanMonth2').val()) || 0);
    //         var outPlanMonth3 = parseFloat($(this).find('.outPlanMonth3').val()) || 0;

    //         // Menghindari pembagian dengan 0
    //         // var hasilBagi = outPlanMonth3 !== 0 ? balancePlanMonth2 / outPlanMonth3 : 0;
    //         var hasilBagi = (parseFloat(balancePlanMonth2) / parseFloat(outPlanMonth3));
    //         // Pastikan hasilBagi bukan NaN atau infinity
    //         hasilBagi = isFinite(hasilBagi) ? hasilBagi : 0;
    //         // Set nilai pada input Month Plan ke 2
    //         $(this).find('.planMonth2').val(Math.ceil(hasilBagi));
    //     });
    // }
    // // Panggil fungsi untuk update calculations saat dokumen siap
    // updateCalculations();
    // // Panggil fungsi updateCalculations setiap kali ada perubahan dalam input
    // $('#tbl_po_list').on('input', 'input', function() {
    //     updateCalculations();
    // });
    //     });
    // });



    //step3
    // function calculateOrders() {
    //     $('#tbl_po_list tbody tr').each(function() {
    //         // Default value if NaN
    //         var endStockMonth1 = parseFloat($(this).find('.endStockMonth1').val()) || 0;
    //         var inActualMonth2 = parseFloat($(this).find('.inActualMonth2').val()) || 0;
    //         var hpoMonth2 = parseFloat($(this).find('.hpoMonth2').val()) || 0;
    //         var outPlanMonth2 = parseFloat($(this).find('.outPlanMonth2').val()) || 0;
    //         var safety_Stock = parseFloat($(this).find('.safety_Stock').val()) || 0;
    //         var outPlanMonth3 = parseFloat($(this).find('.outPlanMonth3').val()) || 0;
    //         var minimumOrder = parseFloat($(this).find('.minimum_Order').val()) || 0;
    //         var standartPack = parseFloat($(this).find('.standart_Pack').val()) || 0;

    //         // Calculate order
    //         var hasilOrder = endStockMonth1 + inActualMonth2 + hpoMonth2 - outPlanMonth2 - safety_Stock - outPlanMonth3;
    //         var order = Math.abs(hasilOrder);
    //         var mod = order % standartPack;
    //         var mod2 = standartPack - mod;
    //         var mod3 = order + mod2;
    //         var mod4 = Math.abs(mod3);

    //         // Set order value
    //         if ($('input.cekList').prop('checked')) {
    //             if (isNaN(hasilOrder)) {
    //                 hasilOrder = 0;
    //             }
    //             if (mod4 < minimumOrder) {
    //                 $(this).find('.orderMonth2').val(Math.max(minimumOrder, mod4));
    //             } else {
    //                 $(this).find('.orderMonth2').val(mod4);
    //             }
    //         } else {
    //             if (isNaN(hasilOrder)) {
    //                 hasilOrder = 0;
    //             }
    //             if (mod4 < minimumOrder) {
    //                 $(this).find('.orderMonth2').val(minimumOrder);
    //             } else {
    //                 $(this).find('.orderMonth2').val(mod4);
    //             }
    //         }
    //     });
    // }

    // // Update calculations when input fields change
    // $('#tbl_po_list').on('input', 'input', function() {
    //     calculateOrders();
    // });

    // // Initial calculation when the document is ready
    // calculateOrders();




     //start code old
    // $(document).ready(function() {
        // start calculateValues
    // function calculateValues() {
    //     $('#tbl_po_list tbody tr').each(function() {
    //         // Default values if NaN
    //         var endStockMonth1 = parseFloat($(this).find('.endStockMonth1').val()) || 0;
    //         var inActualMonth2 = parseFloat($(this).find('.inActualMonth2').val()) || 0;
    //         var hpoMonth2 = parseFloat($(this).find('.hpoMonth2').val()) || 0;
    //         var outPlanMonth2 = parseFloat($(this).find('.outPlanMonth2').val()) || 0;
    //         var planMonth2 = parseFloat($(this).find('.planMonth2').val()) || 0;
    //         var safety_Stock = parseFloat($(this).find('.safety_Stock').val()) || 0;
    //         var outPlanMonth3 = parseFloat($(this).find('.outPlanMonth3').val()) || 0;
    //         var minimumOrder = parseFloat($(this).find('.minimum_Order').val()) || 0;
    //         var standartPack = parseFloat($(this).find('.standart_Pack').val()) || 0;

            // Calculate balancePlanMonth2
            // var summing = endStockMonth1 + inActualMonth2 + hpoMonth2;
            // var resultForoutPlanMonth2 = summing - outPlanMonth2;
            // $(this).find('.balancePlanMonth2').val(resultForoutPlanMonth2);

            // // Calculate planMonth2
            // var balancePlanMonth2 = Math.abs(parseFloat($(this).find('.balancePlanMonth2').val()) || 0);
            // var hasilBagi = (balancePlanMonth2 / (outPlanMonth3 || 1)); // Avoid division by zero
            // var planMonth2Value = Math.ceil(isNaN(hasilBagi) ? 0 : hasilBagi);
            // $(this).find('.planMonth2').val(planMonth2Value);

            // Calculate orderMonth2 old version
            // var hasilOrder = endStockMonth1 + inActualMonth2 + hpoMonth2 - outPlanMonth2 - safety_Stock - outPlanMonth3;
            // var order = Math.abs(isNaN(hasilOrder) ? 0 : hasilOrder);
            // var mod = order % standartPack;
            // var mod2 = standartPack - mod;
            // var mod3 = order + mod2;
            // var mod4 = Math.abs(mod3);
            // var finalOrder = (mod4 < minimumOrder) ? minimumOrder : mod4;
            // $(this).find('.orderMonth2').val(finalOrder);

            // Calculate orderMonth2 new version
            // Menghitung hasil order
    //             let hasilOrder = endStockMonth1 + inActualMonth2 + hpoMonth2 - outPlanMonth2 - safety_Stock - outPlanMonth3;
    //             let order = hasilOrder;
    //             let mod = 0;
    //             let mod2 = 0;
    //             let mod3 = 0;
    //             // Menggunakan logika kondisional untuk menghitung nilai orderMonth2
    //             if (standartPack > 1) {
    //                 mod = order % standartPack;
    //                 mod2 = standartPack - mod;
    //                 mod3 = order + mod2;
    //             } else {
    //                 mod3 = order;
    //             }
    //             let mod4 = Math.abs(mod3);
    //             // Mengatur nilai orderMonth2 berdasarkan minimumOrder dan kondisi lainnya
    //             if (mod4 < minimumOrder) {
    //                 $(this).find('.orderMonth2').val(Math.abs(minimumOrder));
    //             } else {
    //                 if (mod3 < 0) {
    //                     $(this).find('.orderMonth2').val(mod4);
    //                 } else {
    //                     let defaultOrders = 0;
    //                     $(this).find('.orderMonth2').val(defaultOrders);
    //                 }
    //             }

    //     });
    // }
    // Update calculations when input fields change
    // $('#tbl_po_list').on('input', 'input', function() {
    //     calculateValues();
    // });
    // Initial calculation when the document is ready
    // calculateValues();
//});
// end calculateValues code old


function calculateValues() {
    $('#tbl_po_list tbody tr').each(function() {
        // Caching DOM elements
        const $row = $(this);
        const endStockMonth1 = parseFloat($row.find('.endStockMonth1').val()) || 0;
        const inActualMonth2 = parseFloat($row.find('.inActualMonth2').val()) || 0;
        const hpoMonth2 = parseFloat($row.find('.hpoMonth2').val()) || 0;
        const outPlanMonth2 = parseFloat($row.find('.outPlanMonth2').val()) || 0;
        const planMonth2 = parseFloat($row.find('.planMonth2').val()) || 0;
        const safety_Stock = parseFloat($row.find('.safety_Stock').val()) || 0;
        const outPlanMonth3 = parseFloat($row.find('.outPlanMonth3').val()) || 0;
        const minimumOrder = parseFloat($row.find('.minimum_Order').val()) || 0;
        const standartPack = parseFloat($row.find('.standart_Pack').val()) || 0;

        // Calculate balancePlanMonth2
        const summing = endStockMonth1 + inActualMonth2 + hpoMonth2;
        const resultForoutPlanMonth2 = summing - outPlanMonth2;
        $row.find('.balancePlanMonth2').val(resultForoutPlanMonth2);

        // Calculate planMonth2
        const balancePlanMonth2 = Math.abs(parseFloat($row.find('.balancePlanMonth2').val()) || 0);
        const hasilBagi = (balancePlanMonth2 / (outPlanMonth3 || 1)); // Avoid division by zero
        const planMonth2Value = Math.ceil(isNaN(hasilBagi) ? 0 : hasilBagi);
        $row.find('.planMonth2').val(planMonth2Value);

        // Calculate orderMonth2
        let hasilOrder = endStockMonth1 + inActualMonth2 + hpoMonth2 - outPlanMonth2 - safety_Stock - outPlanMonth3;
        let mod = 0;
        let mod2 = 0;
        let mod3 = 0;

        if (standartPack > 1) {
            mod = hasilOrder % standartPack;
            mod2 = standartPack - mod;
            mod3 = hasilOrder + mod2;
        } else {
            mod3 = hasilOrder;
        }

        const mod4 = Math.abs(mod3);
        const finalOrder = mod4 < minimumOrder ? minimumOrder : mod4;

        $row.find('.orderMonth2').val(finalOrder);
    });
}

// Update calculations when input fields change
$('#tbl_po_list').on('input', 'input', function() {
    clearTimeout(window.calculateValuesTimeout);
    window.calculateValuesTimeout = setTimeout(calculateValues, 300); // Debounce the function call
});

// Initial calculation when the document is ready
$(document).ready(calculateValues);




//start calculateValuesMonthThere old code
// function calculateValuesMonthThere() {
//         $('#tbl_po_list tbody tr').each(function() {
//             // Ambil nilai dari inputan
//             var getValueBalancePlanMonth2 = parseFloat($(this).find('.balancePlanMonth2').val()) || 0;
//             var getValueOrderMonth2 = parseFloat($(this).find('.orderMonth2').val()) || 0;
//             var getValueOutPlanMonth3 = parseFloat($(this).find('.outPlanMonth3').val()) || 0;
//             var getNoKonversiBasic = parseFloat($(this).find('.Konversi').val()) || 0;

//             // Hitung hasil konversi dan order
//             var resultKonversiAndOrder = getNoKonversiBasic !== 0 ? getValueOrderMonth2 / getNoKonversiBasic : 0;
//             $(this).find('.hasilKonversi').val(resultKonversiAndOrder);

//             // Hitung sumForBalancePlanMontTiga
//             var sumForBalancePlanMontTiga = getValueBalancePlanMonth2 + getValueOrderMonth2 - getValueOutPlanMonth3;

//             // Set nilai untuk balancePlanMonth3
//             $(this).find('.balancePlanMonth3').val(Math.abs(sumForBalancePlanMontTiga));
//         });
//     }

//     // Update calculations when input fields change
//     $('#tbl_po_list').on('input', 'input', function() {
//         calculateValuesMonthThere();
//     });
//     // Initial calculation when the document is ready
//     calculateValuesMonthThere();
//end calculateValuesMonthThere old code

// Function to calculate values for Month There
function calculateValuesMonthThere() {
    $('#tbl_po_list tbody tr').each(function() {
        // Cache DOM elements
        const $row = $(this);
        const getValueBalancePlanMonth2 = parseFloat($row.find('.balancePlanMonth2').val()) || 0;
        const getValueOrderMonth2 = parseFloat($row.find('.orderMonth2').val()) || 0;
        const getValueOutPlanMonth3 = parseFloat($row.find('.outPlanMonth3').val()) || 0;
        const getNoKonversiBasic = parseFloat($row.find('.Konversi').val()) || 0;

        // Calculate conversion and order result
        const resultKonversiAndOrder = getNoKonversiBasic !== 0 ? getValueOrderMonth2 / getNoKonversiBasic : 0;
        $row.find('.hasilKonversi').val(resultKonversiAndOrder);

        // Calculate sum for balancePlanMonth3
        const sumForBalancePlanMontTiga = getValueBalancePlanMonth2 + getValueOrderMonth2 - getValueOutPlanMonth3;

        // Set value for balancePlanMonth3
        $row.find('.balancePlanMonth3').val(Math.abs(sumForBalancePlanMontTiga));
    });
}

// Update calculations when input fields change
$('#tbl_po_list').on('input', 'input', function() {
    clearTimeout(window.calculateValuesMonthThereTimeout);
    window.calculateValuesMonthThereTimeout = setTimeout(calculateValuesMonthThere, 300); // Debounce function call
});

// Initial calculation when the document is ready
$(document).ready(calculateValuesMonthThere);




//code old
// function calculateValuesMonthFour() {
//         $('#tbl_po_list tbody tr').each(function() {
//             // Ambil nilai dari inputan
//             var getValueBalancePlanMonth2 = parseFloat($(this).find('.balancePlanMonth2').val()) || 0;
//             var getValueOrderMonth2 = parseFloat($(this).find('.orderMonth2').val()) || 0;
//             var getValueOutPlanMonth3 = parseFloat($(this).find('.outPlanMonth3').val()) || 0;
//             var getNoKonversiBasic = parseFloat($(this).find('.Konversi').val()) || 0;
//             var getValueOutPlanMonth4 = parseFloat($(this).find('.outPlanMonth4').val()) || 0;

//             // Hitung hasil konversi dan order
//             var resultKonversiAndOrder = getNoKonversiBasic !== 0 ? getValueOrderMonth2 / getNoKonversiBasic : 0;
//             $(this).find('.hasilKonversi').val(resultKonversiAndOrder);

//             // Hitung sumForBalancePlanMontTiga
//             var sumForBalancePlanMontTiga = getValueBalancePlanMonth2 + getValueOrderMonth2 - getValueOutPlanMonth3;

//             // Hitung hasil planMonth3
//             var resultForPlanMonth3 = getValueOutPlanMonth4 !== 0 ? sumForBalancePlanMontTiga / getValueOutPlanMonth4 : 0;

//             // Jika hasil pembagian adalah NaN atau Infinity, atur menjadi 0
//             resultForPlanMonth3 = isFinite(resultForPlanMonth3) ? resultForPlanMonth3 : 0;

//             // Atur nilai pada elemen .planMonth3
//             $(this).find('.planMonth3').val(Math.ceil(resultForPlanMonth3));
//         });
//     }

//     // Update calculations when input fields change
//     $('#tbl_po_list').on('input', 'input', function() {
//         calculateValuesMonthFour();
//     });

//     // Initial calculation when the document is ready
//     calculateValuesMonthFour();
    // code old

    // Function to calculate values for Month Four
function calculateValuesMonthFour() {
    $('#tbl_po_list tbody tr').each(function() {
        // Cache DOM elements
        const $row = $(this);
        const getValueBalancePlanMonth2 = parseFloat($row.find('.balancePlanMonth2').val()) || 0;
        const getValueOrderMonth2 = parseFloat($row.find('.orderMonth2').val()) || 0;
        const getValueOutPlanMonth3 = parseFloat($row.find('.outPlanMonth3').val()) || 0;
        const getNoKonversiBasic = parseFloat($row.find('.Konversi').val()) || 0;
        const getValueOutPlanMonth4 = parseFloat($row.find('.outPlanMonth4').val()) || 0;

        // Calculate conversion and order result
        const resultKonversiAndOrder = getNoKonversiBasic !== 0 ? getValueOrderMonth2 / getNoKonversiBasic : 0;
        $row.find('.hasilKonversi').val(resultKonversiAndOrder);

        // Calculate sum for balancePlanMonth3
        const sumForBalancePlanMontTiga = getValueBalancePlanMonth2 + getValueOrderMonth2 - getValueOutPlanMonth3;

        // Calculate result for planMonth3
        let resultForPlanMonth3 = getValueOutPlanMonth4 !== 0 ? sumForBalancePlanMontTiga / getValueOutPlanMonth4 : 0;

        // Ensure result is finite and set it to 0 if not
        resultForPlanMonth3 = isFinite(resultForPlanMonth3) ? resultForPlanMonth3 : 0;

        // Update the value for planMonth3
        $row.find('.planMonth3').val(Math.ceil(resultForPlanMonth3));
    });
}

// Update calculations when input fields change
$('#tbl_po_list').on('input', 'input', function() {
    clearTimeout(window.calculateValuesMonthFourTimeout);
    window.calculateValuesMonthFourTimeout = setTimeout(calculateValuesMonthFour, 300); // Debounce the function call
});

// Initial calculation when the document is ready
$(document).ready(calculateValuesMonthFour);


});
});
});

</script>





<!-- code aksi submit data -->
<script>
$('#saveButton').click(function() {
    let isValid = true;
    let errorMessage = '';
    let missingFields = [];

    $('#tbl_po_list tbody tr').each(function() {
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
                    data: $('#form_lo').serialize(),
                    beforeSend: function() {
                        $('#saveButton').prop('disabled', false).text('Sedang proses...');
                    },
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
                text: "Failed to communicate with server.",
            }).then(function() {
                $('#buttonSubmit').prop('disabled', false).text('OKE');
                $('#modalSave').modal('hide');
            });
        }
    });
//endproses kirim data

    } else {
        Swal.fire({
            icon: "error",
            title: "Error Validations",
            text: errorMessage,
        });
    }
});
</script>

<!-- // code for supports  -->
<script>
    //code for select2 divisi
    $(document).ready(function() {
            //code select 2
            $('#divisis').select2({
                    placeholder: "SELECT",
                    theme: 'bootstrap4',
                    width: '100%'
              });
               // code untuk checkbox remove
              $("#checkAll").click(function(){
                if ( (this).checked == true ){
                    $('.checkeds').prop('checked', true);
                } else {
                    $('.checkeds').prop('checked', false);
                }
                });

                $("#getPartsDivisi").click(function () {
                $("#saveButton").show(1000)
                })

                $("#divisis").change(function () {
                    $("#getPartsDivisi").show(1000)
                    })

                $("#divisis").change(function () {
                    $(".removeButton").show(1000)
                    })

                $("#divisis").change(function () {
                    $("#reset").show(1000)
                    })    
                    
            });
            //code remove checkbox
            $('#checkData').click(function() {
            var selectedRows = $('input:checkbox:checked').closest("tr");
            if (selectedRows.length > 0) {
                // Jika ada baris yang dipilih
                // console.log("Jumlah baris yang dipilih: " + selectedRows.length);
                // Hapus baris yang dipilih
                selectedRows.remove();
                // Hapus centang pada checkbox "Check All"
                $('#checkAll').prop('checked', false);
                // Tampilkan notifikasi sukses
                Swal.fire({
                    icon: "success",
                    title: "Success Removed Item",
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                // Jika tidak ada baris yang dipilih
                Swal.fire({
                    icon: "info",
                    title: "No data selected",
                    text: "No rows are selected for deletion..",
                    showConfirmButton: true
                });
            }
         });
             //nonaktif button enter
			$(document).keypress(
				function(event){
				if (event.which == '13') {
				event.preventDefault();
				}
			});
</script>



<?= $this->endSection() ?>