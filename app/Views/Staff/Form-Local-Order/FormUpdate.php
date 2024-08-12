<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<style type="text/css">
.select2-container--default .select2-selection--single .select2-selection__rendered,
.select2-container .select2-selection--single {
	height: 38px !important;
}

p{
        margin: 5px 0 0 0;
    }
        p.footer{
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
        display: block;
    }
    .bold{
        font-weight: bold;
    }

    #footer {
    clear: both;
    position: relative;
    height: 40px;
    margin-top: -40px;
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
<!-- <li class="breadcrumb-item"><a href="<?= base_url('Local-Order-Menu')?>">Back</a></li> -->
<li class="breadcrumb-item active"><?= $title ?></li>
</ol>
</div>
</div>
</div>
</section>


<!-- <form onsubmit="return false" id="formLoUpdate">     -->
<form onsubmit="return false" id="formLoUpdate">    
<section class="content">
        <!-- Default box -->
        <div class="card ml-2 mr-2">
          <div class="card-header" style="background-color:RGB(40, 178, 170);">
            <h3 class="card-title  text-light"></h3>
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
            <!-- <div class="card"> -->
            <div class="card" style="width: 2560px;">
              <div class="card-header">

              <div class="row">
            <div class="col-md-4">
				<table style="width: 100%;">
				<div class="form-group row ml-6">
					<label class="col-sm-4 col-form-label text-uppercase">Select Division  :</label>
					<div class="col-sm-8">
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
					<label class="col-sm-4 col-form-label text-uppercase">SELECT NO LOCAL ORDER :</label>
					<div class="col-sm-8">
                    <select name="noLocalOrder" id="noLocalOrder" class="form-control">
                            <option value="">-SELECT-</option>
                                <?php 
                                ?>
                        </select>
					</div>
				</div>

				</table>
			</div>

            <div class="col-md-6 ml-auto">
				<table style="width: 50%;">
                <!-- <div class="form-group row">
					<label class="col-sm-3 col-form-label text-uppercase">Select No Local Order:</label>
					<div class="col-sm-8">
                    <select name="noLocalOrder" id="noLocalOrder" class="form-control">
                     <option value="">-SELECT NO LOCAL ORDER-</option>
                     <?php

                     ?>
                    </select>
					</div>
				</div> -->
				</table>
			</div>
              </div>
              </div>

			                   
			  <!-- disini tempat lama form -->
         <div class="card-body">
         <div class="row mb-1">
         <div class="float-left ml-2">
			<button id="btnShowData" class="btn btn-outline-info btn-sm buttonShow" style="display: none;"><i class="fa fa-search"></i> Show Data</button>
			<a href="<?= base_url('Update-Local-Order')?>"  class="btn btn-outline-warning btn-sm buttonReset" style="display: none;"><i class="fa fa-undo"></i> Reset</a>
            <button type="button" class="btn btn-outline-info btn-sm" id="buttonSubmit"  onclick="updateData()" style="display: none;"><i class="fa fa-save"></i> Update Data</button>
            <button type="button" class="btn btn-outline-danger btn-sm removeButton" id="deletebutton" style="display: none;"><i class="fa fa-trash"></i> Remove Item</button>
        </div>
        <div class="float-right ml-2">
        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#userGuideModal">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Informasi Cara Penggunaan <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
        </button>
        </div>

         </div>
         <hr>
         <div class="input-group col-md-2 mb-2" id="divCheck"  style="display: none;">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <input type="checkbox" aria-label="Checkbox for following text input" name="checkedAll" id="checkAll">
                </div>
                </div>
              <input type="text" data-toggle="modal" data-target="#removeNoteModal" class="form-control font-weight-bold text-uppercase text-dark" aria-label="Check For Remove" readonly placeholder="Checks For Remove">
            </div>
            
            <!-- <div class="card"> -->
              <!-- <div class="card-header"> -->
              <div class="row">
			     <div class="col-lg-12 col-md-12 col-sm-12">
             <table class="table table-bordered table-striped example2" id="tbl_po_list">
                  <thead>
                <tr>
                <th rowspan="2" scope="col"  style="text-align:center; width:2%;">No</th>
                <th rowspan="2" scope="col"  style="text-align:center;"></th>
                <th rowspan="2" scope="col"  style="text-align:center;">Part ID</th>
                <th rowspan="2" scope="col"  style="text-align:center;">Part Name</th>
                <th rowspan="2" scope="col"  style="text-align:center;" width="3%">Safety Stock</th>
                <th rowspan="2" scope="col"  style="text-align:center;" width="3%">Standart Pack</th>
                <th rowspan="2" scope="col"  style="text-align:center;" width="3%">Minimum Order</th>
                <th rowspan="2" scope="col"  style="text-align:center;" width="10%">Note</th>
                <th rowspan="2" scope="col"  style="text-align:center; color:blue;" width="3%">Stock <?php
                            $now = new DateTime();
                            $previousMonth = $now->modify('first day of -1 month');
                            $zoro = $previousMonth->format('F');
                            echo $zoro;
                            ?>
 				</th>

				   <th colspan="7" scope="col"  style="text-align:center; color:blue;">
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

                <th rowspan="2" scope="col"  style="text-align:center; color:blue;"> 
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
                    <th scope="col" style="text-align:center;">IN ACT</th>
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
                  </tbody>
                </table>
			 <!-- </div>
            </div> -->
            </div>
            <div class="row ml-auto mb-3 mr-5 mt-3">
			<!-- <button type="button" class="btn btn-outline-secondary btn-sm" style="float: right;" data-toggle="modal" data-target="#formTambahanModal"> <i class="fa-solid fa-floppy-disk"></i> Save</button> -->
        </div>
</div>
</section>
</form>

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
      <p class="font-weight-bold text-danger">Instruksi.</p>
      <p class="font-weight-bold">1. **Pilih Divisi**: <br> divisi dari daftar yang tersedia. Nomor lokal order yang sesuai akan muncul berdasarkan divisi yang dipilih. Jika nomor lokal order tidak muncul, berarti nomor lokal order belum dibuat untuk divisi tersebut.</p>

      <p class="font-weight-bold">2. **Pilih Nomor Lokal Order**:<br> Pilih nomor lokal order dari daftar yang tersedia.</p>

      <p class="font-weight-bold">3. **Tombol Show Data dan Reset**: <br> Setelah memilih nomor lokal order, akan muncul tombol **"Show Data"** dan tombol **"Reset"**.</p>

      <p class="font-weight-bold">4. **Tombol Show Data**:<br> Klik tombol **"Show Data"** untuk menampilkan data yang akan diedit.</p>

      <p class="font-weight-bold">5. **Tombol Reset**:<br> Klik tombol **"Reset"** untuk kembali ke awal dan menghapus semua pilihan.</p>

      <p class="font-weight-bold">6. **Tombol Update Data**:<br> Klik tombol **"Update Data"** untuk mengirimkan data yang telah diperbarui.</p>

      <p class="font-weight-bold">7. **Tombol Remove Item**:<br> Klik tombol **"Remove Item"** untuk menghapus data yang telah dicentang (checklist).</p>

      <p class="font-weight-bold">8. **Tombol Check for Remove**:<br>  Klik tombol **"Check for Remove"** untuk mencentang semua data yang ada.</p><br>

      <p class="font-weight-bold text-danger">**Catatan ketika anda Ingin Remove item**:<p>
      <p class="font-weight-bold">- **Data yang dicentang** akan dihapus.<br>
        - **Data yang tidak dicentang** adalah data yang akan Anda edit.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Does it Help (Close)</button>
      </div>
    </div>
  </div>
</div>

<script>
     $(document).ready(function() {
            //code select 2
            $('#divisis').select2({
                    placeholder: "SELECT DIVISION",
                    theme: 'bootstrap4',
                    width: '100%'
              });

              $('#noLocalOrder').select2({
                    placeholder: "SELECT NO LOCAL ORDER",
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

<script>
    $(document).ready(function() {
    $(document).on('click', '#btnShowData', function() { 
        var divisiName = $('#divisis').val();
        var noLocalOrder = $('#noLocalOrder').val();
        var nom = 1;

        $.ajax({ 
            type: "GET",   
            url: "<?= site_url('get-Data-Local-Order') ?>", 
            data: {
                'divisiName': divisiName,
                'noLocalOrder': noLocalOrder
            },
            success: function(result) { 
                if (result) {
                    var itemData = JSON.parse(result);
                    var existingIds = [];
                    var newItems = [];
                    
                    // Ambil ID yang sudah ada di tabel
                    $('#tbl_po_list tbody tr').each(function() {
                        var idPartDivisi = $(this).find('textarea[name="idPartDivisi[]"]').val();
                        if (idPartDivisi) {
                            existingIds.push(idPartDivisi);
                        }
                    });

                    // Cek data baru yang sudah ada
                    var alreadyExists = false;
                    
                    for (let i = 0; i < itemData.length; i++) {
                        if (existingIds.includes(itemData[i].idPartDivisi)) {
                            alreadyExists = true;
                        } else {
                            newItems.push(itemData[i]);
                        }
                    }
                    
                    if (alreadyExists) {
                        Swal.fire({
                            icon: "warning",
                            title: "Data Already Exists",
                            text: "Beberapa data sudah ada di tabel. Hanya data baru yang akan ditambahkan.",
                            confirmButtonText: "OK"
                        }).then(() => {
                            // Jika ada data baru, tambahkan ke tabel
                            addNewItems(newItems);
                        });
                    } else {
                        // Jika semua data baru, langsung tambahkan ke tabel
                        addNewItems(itemData);
                    }
                } else { 
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Error, Data tidak tersedia!",
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Terjadi kesalahan saat mengambil data!",
                });
            }
        });

        function addNewItems(items) {
            for (let i = 0; i < items.length; i++) {
                $('#tbl_po_list tbody').append('<tr class="tr_rows' + nom + ' kode' + items[i].idPartDivisi + ' selected">\
                    <td>' + nom + '</td>\
                    <td class="text-center" style="width: 2%;">\
                        <input type="checkbox" name="checkboxselectall" id="checkAll" class="checkeds" title="Select All" />\
                    </td>\
                    <td style="width: 10%;">\
                        <textarea name="idPartDivisi[]" rows="2" cols="10" class="form-control" readonly>' + items[i].idPartDivisi + '</textarea>\
                        <textarea name="idDetail[]" rows="2" cols="10" class="form-control" readonly hidden>' + items[i].idDetail + '</textarea>\
                        <textarea name="idHeader[]" rows="2" cols="10" class="form-control" readonly hidden>' + items[i].idHeader + '</textarea>\
                    </td>\
                    <td style="width: 10%;">\
                        <textarea name="PartName[]" rows="2" cols="10" class="form-control" readonly>' + items[i].PartName + '</textarea>\
                    </td>\
                    <td style="width: 6%;">\
                        <input type="text" name="safety_Stock[]" class="form-control safety_Stock" value="' + items[i].safety_Stock + '" readonly>\
                    </td>\
                    <td style="width: 4%;">\
                        <input type="text" name="standart_Pack[]" class="form-control standart_Pack" value="' + items[i].standart_Pack + '" readonly>\
                    </td>\
                    <td style="width: 4%;">\
                        <input type="text" name="minimum_Order[]" class="form-control minimum_Order" value="' + items[i].minimum_Order + '" readonly>\
                    </td>\
                    <td style="width: 10%;">\
                        <textarea name="keterangan[]" rows="2" cols="10" class="form-control">' + items[i].keterangan + '</textarea>\
                    </td>\
                    <td style="width: 7%;">\
                        <input type="text" name="endStockMonth1[]" class="form-control endStockMonth1" value="' + Math.round(items[i].endStockMonth1) + '" readonly>\
                    </td>\
                    <td style="width: 7%;">\
                        <input type="text" name="inActualMonth2[]" class="form-control inActualMonth2" value="' + Math.round(items[i].inActualMonth2) + '" readonly>\
                    </td>\
                    <td style="width: 7%;">\
                        <input type="text" name="hpoMonth2[]" class="form-control hpoMonth2" placeholder="0" value="' + Math.round(items[i].hpoMonth2) + '" readonly>\
                    </td>\
                    <td style="width: 6%;">\
                        <input type="text" name="outPlanMonth2[]" class="form-control outPlanMonth2" min="0" placeholder="0" value="' + Math.round(items[i].outPlanMonth2) + '">\
                    </td>\
                    <td style="width: 6%;">\
                        <input type="text" name="balancePlanMonth2[]" class="form-control balancePlanMonth2" min="0" placeholder="0" value="' + Math.round(items[i].balancePlanMonth2) + '" readonly>\
                    </td>\
                    <td style="width: 4%;">\
                        <input type="text" name="planMonth2[]" class="form-control planMonth2" min="0" placeholder="0" value="' + Math.round(items[i].planMonth2) + '" readonly>\
                    </td>\
                    <td style="width: 4%; background: yellow;">\
                        <input type="text" name="orderMonth2[]" class="form-control orderMonth2" min="0" placeholder="0" value="' + Math.round(items[i].orderMonth2) + '" readonly>\
                    </td>\
                    <td style="width: 4%; background: yellow;">\
                        <input type="text" name="Konversi[]" class="form-control Konversi" value="' + Math.round(items[i].Konversi) + '" readonly>\
                        <input type="hidden" name="hasilKonversi[]" class="form-control hasilKonversi" readonly>\
                    </td>\
                    <td style="width: 4%;">\
                        <input type="text" name="outPlanMonth3[]" class="form-control outPlanMonth3" min="0" placeholder="0" value="' + Math.round(items[i].outPlanMonth3) + '">\
                    </td>\
                    <td style="width: 4%;">\
                        <input type="text" name="balancePlanMonth3[]" class="form-control balancePlanMonth3" min="0" placeholder="0" value="' + Math.round(items[i].balancePlanMonth3) + '" readonly>\
                    </td>\
                    <td style="width: 4%;">\
                        <input type="text" name="planMonth3[]" class="form-control planMonth3" min="0" placeholder="0" value="' + Math.round(items[i].planMonth3) + '" readonly>\
                    </td>\
                    <td style="width: 4%;">\
                        <input type="text" name="outPlanMonth4[]" class="form-control outPlanMonth4" min="0" placeholder="0" value="' + Math.round(items[i].outPlanMonth4) + '">\
                    </td>\
                </tr>');
                nom++;
            }

            Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Success Get Data',
    showConfirmButton: false,
    timer: 1500
});

        }
    });
});
</script>
<script>
$(document).ready(function() {
    // Fungsi untuk menghapus baris yang dipilih
    $("#deletebutton").on('click', function() {
        var checked = $('input:checkbox:checked').map(function() {
            return this.value;
        }).get();

        // Hapus baris yang dipilih
        $('input:checkbox:checked').closest("tr").remove();
        // Tampilkan notifikasi SweetAlert2
        Swal.fire({
            icon: "success",
            title: "Good!",
            text: "Success, Remove Data!"
        });
    });

    // Fungsi untuk menandai atau menghapus semua checkbox
    $("#checkAll").click(function() {
        // Menandai atau menghapus centang pada semua checkbox
        if (this.checked) {
            $('.checkeds').prop('checked', true);
        } else {
            $('.checkeds').prop('checked', false);
        }
    });


         $("#noLocalOrder").change(function () {
           $("#btnShowData").show(1000)
         })

         $("#noLocalOrder").change(function () {
           $(".buttonReset").show(1000)
         })

         $("#btnShowData").click(function () {
           $("#buttonSubmit").show(1000)
         })

         $("#btnShowData").click(function () {
           $("#divCheck").show(1000)
         })

         $("#btnShowData").click(function () {
           $(".removeButton").show(1000)
         })
});
</script>


<script>
$(document).ready(function() {
    $('#tbl_po_list').keyup(function(event) {
        $('#tbl_po_list .selected').each(function() {
            // Initialize variables
            let endStockMonth1 = parseFloat($(this).find('.endStockMonth1').val()) || 0;
            let inActualMonth2 = parseFloat($(this).find('.inActualMonth2').val()) || 0;
            let hpoMonth2 = parseFloat($(this).find('.hpoMonth2').val()) || 0;
            let outPlanMonth2 = parseFloat($(this).find('.outPlanMonth2').val()) || 0;
            let planMonth2 = parseFloat($(this).find('.planMonth2').val()) || 0;
            let balancePlanMonth2x = parseFloat($(this).find('.balancePlanMonth2').val()) || 0;
            let safety_Stock = parseFloat($(this).find('.safety_Stock').val()) || 0;
            let outPlanMonth3 = parseFloat($(this).find('.outPlanMonth3').val()) || 0;
            let minimumOrder = parseFloat($(this).find('.minimum_Order').val()) || 0;
            let standartPack = parseFloat($(this).find('.standart_Pack').val()) || 0;
            let getValueOrderMonth2 = parseFloat($(this).find('.orderMonth2').val()) || 0;
            let getValueBalancePlanMonth2 = parseFloat($(this).find('.balancePlanMonth2').val()) || 0;
            let getValueOutPlanMonth3 = parseFloat($(this).find('.outPlanMonth3').val()) || 0;
            let getNoKonversiBasic = parseFloat($(this).find('.Konversi').val()) || 1; // Ensure non-zero divisor

            // Calculate balancePlanMonth2
            let summing = endStockMonth1 + inActualMonth2 + hpoMonth2;
            let resultForoutPlanMonth2 = summing - outPlanMonth2;
            $(this).find('.balancePlanMonth2').val(resultForoutPlanMonth2);

            // Calculate planMonth2
            let hasilBagi = (balancePlanMonth2x / outPlanMonth3) || 0;
            $(this).find('.planMonth2').val(Math.ceil(hasilBagi));

            // Calculate orderMonth2
            let hasilOrder = endStockMonth1 + inActualMonth2 + hpoMonth2 - outPlanMonth2 - safety_Stock - outPlanMonth3;
            let mod = (standartPack > 1) ? hasilOrder % standartPack : 0;
            let mod2 = standartPack - mod;
            let mod3 = (standartPack > 1) ? hasilOrder + mod2 : hasilOrder;
            let mod4 = Math.abs(mod3);
            $(this).find('.orderMonth2').val(mod4 < minimumOrder ? minimumOrder : mod4);

            // Calculate balancePlanMonth3 and planMonth3
            let sumForBalancePlanMonthTiga = getValueBalancePlanMonth2 + getValueOrderMonth2 - getValueOutPlanMonth3;
            $(this).find('.balancePlanMonth3').val(Math.abs(sumForBalancePlanMonthTiga));

            let outPlanMonth4 = parseFloat($(this).find('.outPlanMonth4').val()) || 1; // Ensure non-zero divisor
            let resultForPlanMonth3 = (sumForBalancePlanMonthTiga / outPlanMonth4) || 0;
            $(this).find('.planMonth3').val(Math.ceil(resultForPlanMonth3));

            // Calculate hasilKonversi
            let resultKonversiAndOrder = getValueOrderMonth2 / getNoKonversiBasic;
            $(this).find('.hasilKonversi').val(resultKonversiAndOrder);
        });
    });
});
</script>


<script>
function updateData() {
    $.ajax({
        url: '<?= base_url('send-data-update') ?>',
        method: 'POST',
        data: $('#formLoUpdate').serialize(),
        beforeSend: () => {
            $('#buttonSubmit').prop('disabled', true).text('Sedang proses...');
        },
        success: response => {
            const isSuccess = response === 'oke';
            Swal.fire({
                icon: isSuccess ? 'error' : 'success',
                title: isSuccess ? 'Gagal!' : 'Berhasil!',
                text: isSuccess 
                    ? 'Terjadi kesalahan saat memperbarui data!' 
                    : 'Data berhasil diperbarui.'
            }).then(() => {
                $('#buttonSubmit').prop('disabled', false).text(isSuccess ? 'OKE' : 'Coba Lagi');
                if (isSuccess) {
                    setTimeout(() => {
                        window.location.href = '<?= base_url('Update-Local-Order') ?>';
                    }, 1000);
                }else{
                    setTimeout(() => {
                        window.location.href = '<?= base_url('Update-Local-Order') ?>';
                    }, 1000);
                }
            });
        },
        error: () => {
            Swal.fire({
                icon: 'info',
                title: 'Warning!',
                text: 'Tidak Ada Data Yang Di Ubah.'
            }).then(() => {
                $('#buttonSubmit').prop('disabled', false).text('Coba Lagi');
                setTimeout(() => {
                        window.location.href = '<?= base_url('Update-Local-Order') ?>';
                    }, 1000);
            });
        }
    });
}
</script>






<?= $this->endSection() ?>