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
            <h3 class="card-title font-weight-bolder text-dark">RESULT REPORT</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
             
            </div>
          </div>
         

       
        <!-- DETAIL box -->
          <div class="card-header">
      
            <div class="card-tools">
            </div>
          </div>
          <div class="card-body">
             <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="responsive-table">
            <form action="<?= base_url('Print')?>" method="POST">
        <table>
            <tr>
                <th align="left"> Local Order Month </th>
                <td> : 
                <span class="badge badge-secondary font-weight-bold">
                          <?php $nolo = $noLocalOrder;
                           $month1 = isset($nolo[8]) ? $nolo[8] : '';
                           $month2 = isset($nolo[9]) ? $nolo[9] : '';
                           $year1 = isset($nolo[11]) ? $nolo[11] : '';
                           $year2 = isset($nolo[12]) ? $nolo[12] : '';
                           $year3 = isset($nolo[13]) ? $nolo[13] : '';
                           $year4 = isset($nolo[14]) ? $nolo[14] : '';
                           echo $month1.$month2.' - '.$year1.$year2.$year3.$year4;
                ?></span>
                <input type="hidden" class="form-control" name="noLo" value="<?= $noLocalOrder?>">
                </td>
            </tr>
            
            <tr>
                <th align="left"> Number Local Order </th>
                <td> :  <span class="badge badge-secondary font-weight-bold"><?= $divisi?></span>
                <input type="hidden" class="form-control" name="divisi" value="<?= $divisi?>">
                 </td>
               
            </tr>
           
        </table>
            
         <hr>
        <!-- start code Button -->
			<a href="<?= base_url('Reports')?>" id="reset"  class="btn btn-outline-info"><i class="fa fa-arrow-left"></i> Back</a>
            <button type="submit"  class="printPage btn btn-outline-primary"> <i class="fa fa-print"></i> Print</button>
            </form>
            <!-- end code Button -->
           <hr>
    </p>
        <table class="table table-bordered table-striped" id="tbl">
        <thead>
                <tr>
                <th rowspan="2" scope="col"  style="text-align:center; width:2%;">No</th>
                <th rowspan="2" scope="col"  style="text-align:center;">Part ID / Part No</th>
                <th rowspan="2" scope="col"  style="text-align:center;">Part Name</th>
                <th rowspan="2" scope="col"  style="text-align:center;" width="3%">Safety Stock</th>
                <!-- <th rowspan="2" scope="col"  style="text-align:center;" width="3%">Standart Pack</th> -->
                <th rowspan="2" scope="col"  style="text-align:center;" width="3%">Minimum Order</th>
                <th rowspan="2" scope="col"  style="text-align:center;" width="3%">Standart Pack</th>
                <th rowspan="2" scope="col"  style="text-align:center;" width="5%">Unit ID Std Pack</th>
                <th rowspan="2" scope="col"  style="text-align:center;" width="10%">Note</th>
                <th rowspan="2" scope="col"  style="text-align:center; color:blue;" width="3%"> 
                    Stock <?php
                            // code ambil nama 1 bulan kebelakang
                            $now = new DateTime();
                            $previousMonth = $now->modify('first day of -1 month');
                            $monthMinusOne = $previousMonth->format('m');
                            $datamonth = isset($rows->month1) ? $rows->month1 : '';
                            $monthone = substr($datamonth,4, 2);
                            if ($monthone == 1) {
                            echo 'January';
                            }elseif ($monthone == 2) {
                            echo 'February';
                            }elseif ($monthone == 3) {
                                echo 'March';
                            }elseif ($monthone == 4) {
                                echo 'April';
                            }elseif ($monthone == 5) {
                                echo 'May';
                            }elseif ($monthone == 6) {
                                echo 'June';
                            }elseif ($monthone == 7) {
                                echo 'July';
                            }elseif ($monthone == 8) {
                                echo 'August';
                            }elseif ($monthone == 9) {
                                echo 'September';
                            }elseif ($monthone == 10) {
                                echo 'October';
                            }elseif ($monthone == 11) {
                                echo 'November';
                            }elseif ($monthone == 12) {
                                echo 'December';
                            }else {
                            echo bulan($monthMinusOne);
                            }
           ?>
 				</th>

				   <th colspan="7" scope="col"  style="text-align:center; color:blue;">
                   <?php 
					// code ambil bulan sekarang
					$monthtwo = date("m");
                  $datamonth = isset($rows->month2) ? $rows->month2 : '';
                  $monthone = substr($datamonth,4, 2);
                  if ($monthone == 1) {
                      echo 'January';
                     }elseif ($monthone == 2) {
                       echo 'February';
                      }elseif ($monthone == 3) {
                        echo 'March';
                      }elseif ($monthone == 4) {
                        echo 'April';
                      }elseif ($monthone == 5) {
                        echo 'May';
                      }elseif ($monthone == 6) {
                        echo 'June';
                      }elseif ($monthone == 7) {
                        echo 'July';
                      }elseif ($monthone == 8) {
                        echo 'August';
                      }elseif ($monthone == 9) {
                        echo 'September';
                      }elseif ($monthone == 10) {
                        echo 'October';
                      }elseif ($monthone == 11) {
                        echo 'November';
                      }elseif ($monthone == 12) {
                        echo 'December';
                      }else {
                        echo bulan($monthtwo);
                      }
					?>
 					</th>

         <th colspan="3" style="text-align:center; color:blue;"> 
         <?php
					// code ambil nama bulan 1 bulan ke depan
					$now = new DateTime();
					$previousMonth = $now->modify('first day of +1 month');
					$monththere = $previousMonth->format('m');
                  $datamonth = isset($rows->month3) ? $rows->month3 : '';
                  $monthone = substr($datamonth,4, 2);
                  if ($monthone == 1) {
                      echo 'January';
                     }elseif ($monthone == 2) {
                       echo 'February';
                      }elseif ($monthone == 3) {
                        echo 'March';
                      }elseif ($monthone == 4) {
                        echo 'April';
                      }elseif ($monthone == 5) {
                        echo 'May';
                      }elseif ($monthone == 6) {
                        echo 'June';
                      }elseif ($monthone == 7) {
                        echo 'July';
                      }elseif ($monthone == 8) {
                        echo 'August';
                      }elseif ($monthone == 9) {
                        echo 'September';
                      }elseif ($monthone == 10) {
                        echo 'October';
                      }elseif ($monthone == 11) {
                        echo 'November';
                      }elseif ($monthone == 12) {
                        echo 'December';
                      }else {
                       echo bulan($monththere);
                      }
					?>

			      </th>
           <th rowspan="2" scope="col"  style="text-align:center; color:blue;" width="3%"> 
				  Plan OUT 
				  <?php
					// code ambil nama bulan 2 bulan ke depan
					$now = new DateTime();
					$previousMonth = $now->modify('first day of +2 month');
					$monthfour = $previousMonth->format('m');
                 $datamonth = isset($rows->month4) ? $rows->month4 : '';
                  $monthone = substr($datamonth,4, 2);
                  if ($monthone == 1) {
                      echo 'January';
                     }elseif ($monthone == 2) {
                       echo 'February';
                      }elseif ($monthone == 3) {
                        echo 'March';
                      }elseif ($monthone == 4) {
                        echo 'April';
                      }elseif ($monthone == 5) {
                        echo 'May';
                      }elseif ($monthone == 6) {
                        echo 'June';
                      }elseif ($monthone == 7) {
                        echo 'July';
                      }elseif ($monthone == 8) {
                        echo 'August';
                      }elseif ($monthone == 9) {
                        echo 'September';
                      }elseif ($monthone == 10) {
                        echo 'October';
                      }elseif ($monthone == 11) {
                        echo 'November';
                      }elseif ($monthone == 12) {
                        echo 'December';
                      }else {
                       echo bulan($monthfour);
                      }
					?>
			    </th>
              </tr>
				<tr>
				  <th scope="col" style="text-align:center;" width="3%">IN ACT</th>
					<th scope="col" style="text-align:center;">HPO</th>
					<th scope="col" style="text-align:center;" width="3%">OUT Plan</th>
					<th scope="col" style="text-align:center;" width="3%">Bal Plan</th>
					<th scope="col" style="text-align:center;" width="3%">Month Plan</th>
					<th scope="col" style="text-align:center; background: yellow;" width="3%">Order</th>
					<th scope="col" style="text-align:center; background: yellow;" width="3%">Order PO</th>
					<th scope="col" style="text-align:center;" width="3%">OUT Plan</th>
					<th scope="col" style="text-align:center;" width="3%">Bal Plan</th>
					<th scope="col" style="text-align:center;" width="3%">Plan Month</th>
				</tr>
                  </thead>
                  <tbody>
                  <?php
                    if(empty($row)){ // Jika data tidak ad
                        echo '<button type="button" class="btn btn-outline-primary mb-1" data-toggle="modal" data-target="#exampleModal">
                              <i class="fa fa-info-circle" aria-hidden="true"> info</i>
                              </button>';
                    }else{ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                       $no=1;
                        foreach($row as $key => $data){ // Looping hasil data 
                            echo "<tr>";
                            echo "<td>".$no++."</td>";
                            echo "<td id='part'>".$data->idPartDivisi.' / '.($data->OtherID == null ? '-' : $data->OtherID)."</td>";
                            echo "<td>".$data->PartName."</td>";
                            echo "<td style='text-align:center;'>".$data->safety_Stock."</td>";
                            // echo "<td style='text-align:center;'>".$data->standart_Pack."</td>";
                            echo "<td style='text-align:center;'>".$data->minimum_Order."</td>";
                            echo "<td style='text-align:center;'>".$data->standart_Pack."</td>";
                            echo "<td style='text-align:center;'>".$data->unitID_StdPack."</td>";
                            echo "<td>".$data->keterangan."</td>";
                            echo "<td style='text-align:center;'>".number_format($data->endStockMonth1,0,",",".")."</td>";
                            // echo "<td style='text-align:center;'>".$data->endStockMonth1."</td>";
                            echo "<td style='text-align:center;'>".number_format($data->inActualMonth2,0,",",".")."</td>";
                            echo "<td style='text-align:center;'>".number_format($data->hpoMonth2,0,",",".")."</td>";
                            echo "<td style='text-align:center;'>".number_format($data->outPlanMonth2,0,",",".")."</td>";
                            echo "<td style='text-align:center;'>".number_format($data->balancePlanMonth2,0,",",".")."</td>";
                            echo "<td style='text-align:center;'>".round(number_format($data->planMonth2,1))."</td>";
                            echo "<td style='text-align:center; background: yellow;'>".number_format($data->orderMonth2,0,",",".")."</td>";
                            echo "<td style='text-align:center; background: yellow;'>".number_format($data->orderMonthPO,0,",",".")."</td>";
                            echo "<td style='text-align:center;'>".number_format($data->outPlanMonth3,0,",",".")."</td>";
                            echo "<td style='text-align:center;'>".number_format($data->balancePlanMonth3,0,",",".")."</td>";
                            echo "<td style='text-align:center;'>".round(number_format($data->planMonth3, 1))."</td>";
                            echo "<td style='text-align:center;'>".number_format($data->outPlanMonth4,0,",",".")."</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                  </tbody>
                </table>
        </div>
    </div>
</div>


</div>
<div class="card-footer">
<button type="button" class="btn btn-outline-danger float-right" data-toggle="modal" data-target="#userGuideModal">
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
        <p class="font-weight-bold">1.Data Laporan: <br>
        Ini adalah data laporan berdasarkan nomor local order yang Anda pilih. Harap periksa kembali laporan tersebut.</p> 
        <p class="font-weight-bold">2.Laporan Kesalahan: <br>
        Jika Anda menemukan kesalahan, silakan laporkan ke bagian IT.</p>
        <p class="font-weight-bold">3.Output (Print):<br>
        Jika Anda ingin mencetak laporan, tekan tombol "Print". Sesuaikan ukuran kertas dan pengaturan printer sesuai dengan kebiasaan Anda. Setelah pengaturan selesai, klik "Print" untuk mencetak.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Does it Help (Close)</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>