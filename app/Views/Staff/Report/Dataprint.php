
<!DOCTYPE mozdisallowselectionprint moznomarginboxes>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style type="text/css">
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



    html {
    font-family: sans-serif;
}

.container {
  display: flex;
  align-items: center;
  justify-content: space-between;
}


@media print {
       @page {
            margin-top: 0;
            margin-bottom: 0;
       }
       body {
           padding-top: 72px;
           padding-bottom: 72px ;
       }
   } 

   body{
  -webkit-print-color-adjust:exact !important;
  print-color-adjust:exact !important;
  }


    </style>
</head>
<body style="font-size: 12px" onload="window.print()">
           <span style="font-size: 20px; font-weight: bold;">PT.RINNAI INDONESIA</span> 
    <p align="left"> 
        <span style="font-size: 18px"><b>LOCAL ORDER
        <br>
        <?php 
            $tempdivisi =  $divisi;
               if ($tempdivisi == 'IT') {
                  echo 'INFORMATION TECHNOLOGY';
               }elseif ($tempdivisi == 'AC') {
                echo 'ACCOUNTING';
               }elseif ($tempdivisi == 'AD') {
                echo 'ADMINISTRATION';
               }elseif ($tempdivisi == 'AS') {
                echo 'ASSY';
               }elseif ($tempdivisi == 'EG') {
                echo 'ENGINEERING';
               }elseif ($tempdivisi == 'EN') {
                echo 'ENAMEL';
               }elseif ($tempdivisi == 'GV') {
                echo 'GASVALVE';
               }elseif ($tempdivisi == 'PC') {
                echo 'PURCHASING';
               }elseif ($tempdivisi == 'PE') {
                echo 'PRODUCT ENGINEERING';
               }elseif ($tempdivisi == 'PG') {
                echo 'PERSONAL & GENERAL';
               }elseif ($tempdivisi == 'PP') {
                echo 'PPIC';
               }elseif ($tempdivisi == 'PR') {
                echo 'PRESS';
               }elseif ($tempdivisi == 'PRD') {
                echo 'PRODUCTION';
               }elseif ($tempdivisi == 'PT') {
                echo 'PAINTING';
               }elseif ($tempdivisi == 'QC') {
                echo 'QUALITY CONTROL';
               }elseif ($tempdivisi == 'RD') {
                echo 'RESEARCH & DEVELOPMENT';
               }elseif ($tempdivisi == 'SB') {
                echo 'SABLON';
               }elseif ($tempdivisi == 'SW') {
                echo 'SPOTWELD';
               }elseif ($tempdivisi == 'WS') {
                echo 'WORKSHOP';
               }elseif ($tempdivisi == 'FS') {
                echo 'FINISHING';
               }
               else {
                echo $tempdivisi;
               }
             ?>
     </b></span>
    </p>
    <hr>


    <div class=container>
        <table style="float: left; margin-right:10%;">
        <tr>
                <th align="left"> Month:</th>
                <td style="border: 1px solid black; border-collapse: collapse;">
                <?php $nolo = $noLocalOrder;
                           $month1 = isset($nolo[8]) ? $nolo[8] : '';
                           $month2 = isset($nolo[9]) ? $nolo[9] : '';

                         
                           $year1 = isset($nolo[11]) ? $nolo[11] : '';
                           $year2 = isset($nolo[12]) ? $nolo[12] : '';
                           $year3 = isset($nolo[13]) ? $nolo[13] : '';
                           $year4 = isset($nolo[14]) ? $nolo[14] : '';

                           $month = $month1.$month2;
                           $month_name = date("F", mktime(0, 0, 0, $month, 10));
                           echo $month_name.' '.$year1.$year2.$year3.$year4;

                        // var_dump($month1,$nolo[9]);
                ?>
                 </td>
            </tr>
            <tr>
                <th align="left"> Local Order No: </th>
                <td style="border: 1px solid black"><?= $noLocalOrder?></td>
            </tr>
            <tr>
                <th align="left"> Division: </th>
                <td style="border: 1px solid black" width="10px"><?php 
               $tempdivisi =  $divisi;
               if ($tempdivisi == 'IT') {
                  echo 'IT';
               }elseif ($tempdivisi == 'AC') {
                echo 'ACCOUNTING';
               }elseif ($tempdivisi == 'AD') {
                echo 'ADMINISTRATION';
               }elseif ($tempdivisi == 'AS') {
                echo 'ASSY';
               }elseif ($tempdivisi == 'EG') {
                echo 'ENGINEERING';
               }elseif ($tempdivisi == 'EN') {
                echo 'ENAMEL';
               }elseif ($tempdivisi == 'GV') {
                echo 'GASVALVE';
               }elseif ($tempdivisi == 'PC') {
                echo 'PURCHASING';
               }elseif ($tempdivisi == 'PE') {
                echo 'PRODUCT ENGINEERING';
               }elseif ($tempdivisi == 'PG') {
                echo 'PERSONAL & GENERAL';
               }elseif ($tempdivisi == 'PP') {
                echo 'PPIC';
               }elseif ($tempdivisi == 'PR') {
                echo 'PRESS';
               }elseif ($tempdivisi == 'PRD') {
                echo 'PRODUCTION';
               }elseif ($tempdivisi == 'PT') {
                echo 'PAINTING';
               }elseif ($tempdivisi == 'QC') {
                echo 'QUALITY CONTROL';
               }elseif ($tempdivisi == 'RD') {
                echo 'RESEARCH & DEVELOPMENT';
               }elseif ($tempdivisi == 'SB') {
                echo 'SABLON';
               }elseif ($tempdivisi == 'SW') {
                echo 'SPOTWELD';
               }elseif ($tempdivisi == 'WS') {
                echo 'WORKSHOP';
               }elseif ($tempdivisi == 'FS') {
                echo 'FINISHING';
               }
               else {
                echo $tempdivisi;
               }
             ?></td>
            </tr>

            
        </table>
<table class="fixed" style="border-collapse: collapse;">
   <tr height="30px">
      <th style="width:120px; text-align:center; border: 1px solid black;">DIRECT/FACT.MAN</th>
      <th style="width:120px; text-align:center; border: 1px solid black;">MANAGER</th>
      <th style="width:120px; text-align:center; border: 1px solid black;">CHIEF</th>
      <th style="width:120px; text-align:center; border: 1px solid black;">SUPERVISOR</th>
      <th style="width:120px; text-align:center; border: 1px solid black;">CREATE BY</th>
   </tr>
   <tr height="70px">
      <td style="text-align:center; border: 1px solid black;"></td>
      <td style="text-align:center; border: 1px solid black;"></td>
      <td style="text-align:center; border: 1px solid black;"></td>
      <td style="text-align:center; border: 1px solid black;"></td>
      <td style="text-align:center; border: 1px solid black;"></td>
   </tr>
 </table>

    </div>
    <br>
        <table style="border: 1px solid black;border-collapse: collapse;font-size: 11px" width="100%">
        <thead>
                <tr>
                <th rowspan="2" scope="col"  style="text-align:center; width:2%; border: 1px solid black;">No</th>
                <th rowspan="2" scope="col"  style="text-align:center; border: 1px solid black;">Part ID / Part No</th>
                <th rowspan="2" scope="col"  style="text-align:center; border: 1px solid black;">Part Name</th>
                <th rowspan="2" scope="col"  style="text-align:center; border: 1px solid black;" width="3%">Safety Stock</th>
                <th rowspan="2" scope="col"  style="text-align:center; border: 1px solid black;" width="3%">Minimum Order</th>
                <th rowspan="2" scope="col"  style="text-align:center; border: 1px solid black;" width="3%">Standart Pack</th>
                <th rowspan="2" scope="col"  style="text-align:center; border: 1px solid black;" width="5%">Unit ID Std Pack</th>
                <th rowspan="2" scope="col"  style="text-align:center; border: 1px solid black;" width="10%">Note</th>
                <th rowspan="2" scope="col"  style="text-align:center; border: 1px solid black; color: blue;" width="3%"> Stock <?php
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

				<th colspan="7" scope="col"  style="text-align:center; border: 1px solid black; color: blue;">
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

                <th colspan="3" style="text-align:center; border: 1px solid black; color: blue;"> 
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

                <th rowspan="2" scope="col"  style="text-align:center; border: 1px solid black; color: blue;" width="5%"> 
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

				<!-- <th rowspan="2" scope="col"  style="text-align:center; border: 1px solid black;"></th> -->
              </tr>
				<tr>
				  <th scope="col" style="text-align:center; border: 1px solid black;" width="3%">IN ACT</th>
					<th scope="col" style="text-align:center; border: 1px solid black;">HPO</th>
					<th scope="col" style="text-align:center; border: 1px solid black;" width="3%">OUT Plan</th>
					<th scope="col" style="text-align:center; border: 1px solid black;" width="3%">Bal Plan</th>
					<th scope="col" style="text-align:center; border: 1px solid black;" width="3%">Plan Month</th>
					<th scope="col" style="text-align:center; background-color: yellow; border: 1px solid black;" width="3%">Order</th>
					<th scope="col" style="text-align:center; background-color: yellow; border: 1px solid black;" width="3%">Order PO</th>
					<th scope="col" style="text-align:center; border: 1px solid black;" width="3%">OUT Plan</th>
					<th scope="col" style="text-align:center; border: 1px solid black;" width="3%">Bal Plan</th>
					<th scope="col" style="text-align:center; border: 1px solid black;" width="3%">Plan Month</th>
				</tr>
                  </thead>
                  <?php $no=1;
        if(empty($row)){ // Jika data tidak ada
            echo "<tr><td colspan='12' style='text-align:center;'>Data Nothing</td></tr>";
        }else{ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            foreach($row as $data){ // Looping hasil data transaksi
            
                echo "<tr>";
                echo "<td style='text-align:left; border: 1px solid black;'>".$no++."</td>";
                echo "<td style='text-align:left; border: 1px solid black;'>".$data->idPartDivisi.' / '.($data->OtherID == null ? ' - ' : $data->OtherID)."</td>";
                echo "<td style='text-align:left; border: 1px solid black;'>".$data->PartName."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".$data->safety_Stock."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".$data->minimum_Order."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".$data->standart_Pack."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".$data->unitID_StdPack."</td>";
                echo "<td style='text-align:left; border: 1px solid black;'>".$data->keterangan."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".number_format($data->endStockMonth1,0,",",".")."</td>";
                // echo "<td style='text-align:center;'>".$data->endStockMonth1."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".($data->inActualMonth2 == 0 ? '-' : number_format($data->inActualMonth2,0,",","."))."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".($data->hpoMonth2 == 0 ? '-' : number_format($data->hpoMonth2,0,",","."))."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".($data->outPlanMonth2 == 0 ? '-' : number_format($data->outPlanMonth2,0,",","."))."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".($data->balancePlanMonth2 == 0 ? '-' : number_format($data->balancePlanMonth2,0,",","."))."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".($data->planMonth2 == 0 ? '-' : round(number_format($data->planMonth2,1)))."</td>";
                echo "<td style='text-align:center; border: 1px solid black; background-color: yellow;'>".($data->orderMonth2 == 0 ? '-' : number_format($data->orderMonth2,0,",","."))."</td>";
                echo "<td style='text-align:center; border: 1px solid black; background-color: yellow;'>".($data->orderMonthPO == 0 ? '-' : number_format($data->orderMonthPO,0,",","."))."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".($data->outPlanMonth3 == 0 ? '-' : number_format($data->outPlanMonth3,0,",","."))."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".($data->balancePlanMonth3 == 0 ? '-' : number_format($data->balancePlanMonth3,0,",","."))."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".($data->planMonth3 == 0 ? '-' : round(number_format($data->planMonth3, 1)))."</td>";
                echo "<td style='text-align:center; border: 1px solid black;'>".($data->outPlanMonth4 == 0 ? '-' : number_format($data->outPlanMonth4,0,",","."))."</td>";
                echo "</tr>";
            }
        }
    ?>
                </table>
    </p> 

    <p class="footer">
    <small>Print Date: <?php
       date_default_timezone_set('Asia/Jakarta'); 
         $Branch = session()->get('groupBranch');
        $divisi = $divisi;
        $dates = date('Y/m/d H:i');
        $user = session()->get('UserID');
        
          if ($Branch == 'C') {
            echo $user.'/'.'Cikupa'.'/'.$divisi.'/'.$dates;
          }elseif ($Branch == 'B') {
            echo $user.'/'.'Balaraja'.'/'.$divisi.'/'.$dates;
          }else {
            echo $user.'/'.'HO'.'/'.$divisi.'/'.$dates;
          }
       
        ?> 
        </small>
        <small style="color:blue">Version:1.0.0</small>
        
    </p>
   
    

</body>
</html>


</body>
</html>