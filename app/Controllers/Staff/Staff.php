<?php

namespace App\Controllers\Staff;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PartDivisiModel;
use App\Models\UnitModel;
use App\Models\PartsModel;
use App\Models\HeaderLoModel;
use App\Models\DetailLoModel;
use App\Models\DetailLoModelLog;
use App\Models\PRHeaderModel;
use App\Models\PRDetailModel;
use App\Models\PRActivityLogModel;
use Config\Database;
class Staff extends BaseController
{

    protected $PartDivisiModel;
    protected $UnitModel;
    protected $PartsModel;
    protected $HeaderLoModel;
    protected $DetailLoModel;
    protected $DetailLoModelLog;
    protected $PRHeaderModel;
    protected $PRDetailModel;
    protected $PRActivityLogModel;

    public function __construct() {
        $this->PartDivisiModel = new PartDivisiModel();
        $this->UnitModel = new UnitModel();
        $this->PartsModel = new PartsModel();
        $this->HeaderLoModel = new HeaderLoModel();
        $this->DetailLoModel = new DetailLoModel();
        $this->DetailLoModelLog = new DetailLoModelLog();
        $this->PRHeaderModel = new PRHeaderModel();
        $this->PRDetailModel = new PRDetailModel();
        $this->PRActivityLogModel = new PRActivityLogModel();
    }

    public function Home()
    {
        $data = [
            'title' => 'Local Order'
             ];
                 return view('Staff/Home',$data);
         }


        //  start code part division
         public function Part_div()  {
            $getdivision = $this->request->getVar('divisiID');
            if ($getdivision == null || $getdivision == '') {
                $data = [
                    'title' => 'Data Master Part Divisi'
                     ];
                    return view('Staff/PartDivisi/Data',$data);
            }else {
                    $getdatabyreq = $this->PartDivisiModel->getByRequest($getdivision);
                    $data = [
                    'title' => 'Data Master Part Divisi',
                    'row' => $getdatabyreq
                     ];
                    return view('Staff/PartDivisi/Data',$data);
            }
             }

        public function Add_Part_div() {
            $dataUnit = $this->UnitModel->findAll();
         
            $data = [
                'title' => 'Form Add Master Part Divisi',
                'unitData' => $dataUnit
            ];
                return view('Staff/PartDivisi/Form',$data);
        }     
    
         public function View_parts_master()  {
            $searchValue = $this->request->getPost('search')['value'];
            $start = $this->request->getPost('start');
            $length = $this->request->getPost('length');
            $orderColumn = $this->request->getPost('order')[0]['column'];
            $orderDirection = $this->request->getPost('order')[0]['dir'];
            
            $orderColumnArray = ['PartName'];
            $orderColumn = $orderColumnArray[$orderColumn];
    
            $data = $this->PartsModel->getDataTables($searchValue, $start, $length, $orderColumn, $orderDirection);
            $totalData = $this->PartsModel->countAllData();
            $totalFiltered = $this->PartsModel->countFilteredData($searchValue);
    
            $i = $start + 1;
            foreach ($data as &$row) {
                $row['noUrut'] = $i;
                $i++;
    
                $row['actions'] = '
                   <button class="btn btn-outline-info btn-xs" id="select"
                    data-ids="'.$row['PartID'].'"
                    data-name="'.$row['PartName'].'"
                    </button>
                    <i class="fa fa-check">select</i>
                      ';
                      
            }
    
            $response = [
                'draw' => intval($this->request->getPost('draw')),
                'recordsTotal' => $totalData,
                'recordsFiltered' => $totalFiltered,
                'data' => $data
            ];
    
            return $this->response->setJSON($response);
         }
    

        public  function Store_data_part_divisi()  {

            if (!$this->validate('parts_divisi_validation')) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
            $createdBy = session()->get('UserID');
            $partID =  htmlspecialchars(esc($this->request->getPost('partID')));
            $divisiID =  htmlspecialchars(esc($this->request->getPost('divisiID')));
            $standart_Pack =  htmlspecialchars(esc($this->request->getPost('standart_Pack')));
            $unitID_StdPack =  htmlspecialchars(esc($this->request->getPost('unitID_StdPack')));
            $safety_Stock =  htmlspecialchars(esc($this->request->getPost('safety_Stock')));
            $minimum_Order =  htmlspecialchars(esc($this->request->getPost('minimum_Order')));
            $UnitID_Stock =  htmlspecialchars(esc($this->request->getPost('UnitID_Stock')));
            $isActive =  htmlspecialchars(esc($this->request->getPost('isActive')));

            $params = [
                'partID' => $partID,
                'divisiID' => $divisiID,
                'standart_Pack' => $standart_Pack,
                'unitID_StdPack' => $unitID_StdPack,
                'safety_Stock' => $safety_Stock,
                'minimum_Order' => $minimum_Order,
                'UnitID_Stock' => $UnitID_Stock,
                'Is_Active' => $isActive,
                'created_By' => $createdBy
            ];
            $insert = $this->PartDivisiModel->insert($params);
            if ($insert) {
                return redirect()->to(site_url('Parts-Division'))->with('success','Data berhasil di simpan');
            } else {
                return redirect()->to(site_url('Parts-Division'))->with('error','Data gagal di simpan');
            }
        }
            
         }


        public function update_Part_div($id)  {
            $encryptionService = \Config\Services::encryptionService();
            $idpartdivisi = $encryptionService->decryptId($id);
            $dataUnit = $this->UnitModel->findAll();
            $getdata = $this->PartDivisiModel->select('ms_part_divisi.*, Ms_Part.PartName')
                                             ->join('Ms_Part','Ms_Part.PartID = ms_part_divisi.partID')
                                             ->where('id', $idpartdivisi)->get()->getRow();
            $data = [
                'title' => 'Form Update Master Part Divisi',
                'unitData' => $dataUnit,
                'row' => $getdata
            ];
                return view('Staff/PartDivisi/FormU',$data);
         }

         public  function Update_data_part_divisi()  {

            if (!$this->validate('parts_divisi_validation_updt')) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }else {
                $encryptionService = \Config\Services::encryptionService();
            $updateBy = session()->get('UserID');
            $id =  htmlspecialchars(esc($this->request->getPost('id')));
            $idpartdivisi = $encryptionService->decryptId($id);
           
            $partID =  htmlspecialchars(esc($this->request->getPost('partID')));
            $divisiID =  htmlspecialchars(esc($this->request->getPost('divisiID')));
            $standart_Pack =  htmlspecialchars(esc($this->request->getPost('standart_Pack')));
            $unitID_StdPack =  htmlspecialchars(esc($this->request->getPost('unitID_StdPack')));
            $safety_Stock =  htmlspecialchars(esc($this->request->getPost('safety_Stock')));
            $minimum_Order =  htmlspecialchars(esc($this->request->getPost('minimum_Order')));
            $UnitID_Stock =  htmlspecialchars(esc($this->request->getPost('UnitID_Stock')));
            $isActive =  htmlspecialchars(esc($this->request->getPost('isActive')));

            $params = [
                'partID' => $partID,
                'divisiID' => $divisiID,
                'standart_Pack' => $standart_Pack,
                'unitID_StdPack' => $unitID_StdPack,
                'safety_Stock' => $safety_Stock,
                'minimum_Order' => $minimum_Order,
                'UnitID_Stock' => $UnitID_Stock,
                'Is_Active' => $isActive,
                'updated_By' => $updateBy
            ];
            $update = $this->PartDivisiModel->update($idpartdivisi, $params);
            if ($this->PartDivisiModel->affectedRows() > 0) {
                return redirect()->to(site_url('Parts-Division'))->with('success', 'Data Berhasil Diupdate');
            } else {
                return redirect()->to(site_url('Parts-Division'))->with('error', 'Data gagal Diupdate');
            }
        }      
         }

        public function delete_Part_div($id)  {
            $encryptionService = \Config\Services::encryptionService();
            $idpartdivisi = $encryptionService->decryptId($id);
            $this->PartDivisiModel->delete($idpartdivisi);
         if ($this->PartDivisiModel->affectedRows() > 0) {
             return redirect()->to(site_url('Parts-Division'))->with('success', 'Data Berhasil Hapus');
         } else {
             return redirect()->to(site_url('Parts-Division'))->with('error', 'Data gagal Hapus');
         }
           
         }
        //  end code part division



        //start code local order
        public function Form_Lo()  {
            $data = [
                'title' => 'Form Local Order'
            ];
                return view('Staff/Form-Local-Order/Form',$data);
         }

         
        public function Get_Part_Divisi()  {
            //get Group
            $groupBranch =  session()->get('groupBranch');
            //get Divisi
            $divisi = $this->request->getVar("divisi");
            $divJson = json_encode($divisi);
            $divisions =  substr($divJson,1,-1);
            // Mendapatkan bulan dan tahun saat ini
            $bulan = date("m"); // Misalnya '08' untuk Agustus
            $tahun = date('Y'); // Misalnya '2024'
            // Menggabungkan tahun dan bulan menjadi format YYYYMM
            $monthAndYearnow = $tahun . $bulan;
            //inisialisasi date
            $now = new \DateTime();
            // Modifikasi untuk mendapatkan tanggal dari bulan sebelumnya
            $previousMonth = $now->modify('first day of -1 month');
            // Ambil bulan dan tahun dari objek DateTime yang sudah dimodifikasi
            $monthf = $previousMonth->format('m'); // Bulan dalam format dua digit
            $yearz = $previousMonth->format('Y');  // Tahun dalam format empat digit
            // Gabungkan tahun dan bulan untuk mendapatkan format YYYYMM
            $monthoneminusfromnow = $yearz . $monthf;
            //query sql local development
            // $sql = "
            // SELECT c.partID, c.PartName, a.standart_Pack, a.minimum_Order, c.OtherID, ISNULL(sum(b.qty),0) AS endstock, a.safety_Stock, c.Konversi,
            //     isnull((SELECT sum(x.QtyPO) FROM trans_BPBDT$monthAndYearnow x left join ms_part_divisi y on x.partid = y.partid and y.partID = c.PartID
            //     inner join ms_warehousestock z on z.DivisionID = y.divisiID ),0) AS InActual,
            //     isnull((SELECT sum(orderMonth2) as orderMonth2 FROM trans_local_orderDT x 
            //     inner join ms_part_divisi y on x.idPartDivisi = y.partid and x.idPartDivisi = c.partID and x.idPartDivisi = a.partID where month2 = '$monthoneminusfromnow'),0) - 
            //     isnull((SELECT sum(x.QtyPO) as InActual FROM trans_BPBDT$monthAndYearnow x left join ms_part_divisi y on x.partid = y.partid and y.partID = c.PartID
            //     inner join ms_warehousestock z on z.DivisionID = y.divisiID ),0)
            //     AS HPO
            //     FROM ms_part_divisi a
            //     LEFT JOIN buku_Stock$monthoneminusfromnow b ON b.partID = a.PartID
            //     INNER JOIN ms_part c ON c.PartID = a.partID
            //     INNER JOIN Ms_WarehouseStock d ON a.divisiID = d.DivisionID 
            //     WHERE a.divisiID = '$divisions' AND d.groupcode = '$groupBranch' AND a.Is_Active = 1 AND d.groupcode = '$groupBranch'
            //     GROUP BY a.partID, c.PartName, a.standart_Pack, c.OtherID, a.safety_Stock, c.PartID, a.id, a.minimum_Order, c.Konversi
            //     ORDER BY a.id DESC";

            //sql production server
             $sql = "
            SELECT c.partID, c.PartName, a.standart_Pack, c.OtherID, a.UnitID_Stock, c.UnitID_PO, a.minimum_Order, c.Konversi,
			ISNULL((Select sum(x.qty) from buku_stock$monthoneminusfromnow x inner join Ms_WarehouseStock z on x.locationid=z.locationid 
			inner join ms_part_divisi y on x.partid=y.partid and y.divisiID = z.DivisionID 
			where x.partid=a.partID and z.groupcode = '$groupBranch' and z.DivisionID='$divisions'),0) AS endstock, 
			a.safety_Stock,
			isnull((SELECT sum(x.QtyStock) FROM trans_BPBDT$monthAndYearnow x inner join Trans_BPBHD$monthAndYearnow v on v.NoBukti = x.NoBukti left join ms_part_divisi y on x.partid = y.partid 
			inner join ms_warehousestock z on z.DivisionID = y.divisiID and z.LocationID = v.LocationID where y.partID = a.PartID and z.groupcode = '$groupBranch' and z.DivisionID='$divisions'),0) AS InActual,
			isnull((SELECT sum(orderMonth2) as orderMonth2 FROM trans_local_orderDT x 
			inner join ms_part_divisi y on x.idPartDivisi = y.partid and x.idPartDivisi = a.partID
			where month2 = '$monthoneminusfromnow' and y.divisiID='$divisions'),0) - 
			isnull((SELECT sum(x.QtyStock) FROM trans_BPBDT$monthAndYearnow x inner join Trans_BPBHD$monthAndYearnow v on v.NoBukti = x.NoBukti left join ms_part_divisi y on x.partid = y.partid 
			inner join ms_warehousestock z on z.DivisionID = y.divisiID and z.LocationID = v.LocationID where y.partID = a.PartID and z.groupcode = '$groupBranch' and z.DivisionID='$divisions'),0)
			AS HPO
			FROM ms_part_divisi a
			INNER JOIN ms_part c ON c.PartID = a.partID
			WHERE a.divisiID = '$divisions' AND a.Is_Active = 1  
			GROUP BY a.partID, c.PartName, a.standart_Pack, c.OtherID, a.UnitID_Stock, c.UnitID_PO, a.safety_Stock, c.PartID, a.id, a.minimum_Order, c.Konversi
			ORDER BY c.PartName ASC";

            // Execute the query
            $query = $this->PartDivisiModel->query($sql);
            // Fetch the results
            $response = $query->getResult();
            // Encode the result in JSON format
            echo json_encode($response);
         }


         public function Accept_data_local_order()  {
             
            //START CODE FOR CREATE NO LO
            $month = date("m");
            $year = date('Y');
            $divisi = $this->request->getVar('divisis');
            $monthAndYear = $this->request->getVar('monthandyear');
            $groupBranch = session()->get('groupBranch');
            $userId = session()->get('UserID');
            // Query SQL
            $sql = "SELECT RIGHT(localOrderNo, 5) AS localOrderNo
                    FROM trans_local_orderHD
                    WHERE divisiId = ?
                    AND periode = ?
                    ORDER BY localOrderNo DESC
                    ";
            $query = $this->HeaderLoModel->query($sql, [$divisi, $monthAndYear]);
            if ($query->getNumRows() <> 0) {
                // Jika data ditemukan, ambil nilai terakhir
                $data = $query->getRow();
                $kode = intval($data->localOrderNo) + 1;
            } else {
                // Jika tidak ada data ditemukan, mulai dari 1
                $kode = 1;
            }
            $result = sprintf("%04d", $kode);
            $resultscode = $groupBranch."/LO/".$divisi."/".$month."/".$year."/".$result;
            //END CODE FOR CREATE NO LO
           
            $now = new \DateTime();
        
             // untuk bulan +1 dari bulan sekarang
            $previousMonth = $now->modify('first day of +1 month');
            $Month = $previousMonth->format('m');
            $Year = $previousMonth->format('Y');
            $combined =  $Month.$Year;
              
             // untuk bulan -1 dari bulan sekarang
             $nowone = new \DateTime();
             $previousMonths = clone $nowone; // Clone objek $now agar tidak memodifikasi $now
             $previousMonths->modify('first day of -1 month'); // Mengubah ke bulan sebelumnya
             $Months = $previousMonths->format('m'); // Format bulan (angka)
             $Years = $previousMonths->format('Y'); // Format tahun (4 digit)
             $combineds = $Months . $Years; // Menggabungkan bulan dan tahun
       
             // untuk data bulan sekarang
            $bulanNow = date("m");
            $yearNow = date('Y');
            $datesNow = date('Y-m-d');
            $CombinedNow = $bulanNow.$yearNow;

          
             // untuk bulan +2 dari bulan sekarang
            $nows = new \DateTime();
            $nextTwoMonths = clone $nows; // Clone objek $now agar tidak memodifikasi $now
            $nextTwoMonths->modify('first day of +2 month'); // Mengubah ke dua bulan ke depan
            $Month2 = $nextTwoMonths->format('m'); // Format bulan (angka)
            $Year2 = $nextTwoMonths->format('Y'); // Format tahun (4 digit)
            $combined2 = $Month2 . $Year2; 

            $dateNowNeeded = new \DateTime();
            $dateNeeded = $dateNowNeeded->modify('last day of this month');
            $dateNeeded = $dateNeeded->format('Y-m-d');
            

            // menerapkan metode transction ci4
               $db = Database::connect();
                // Mulai transaksi
                $db->transBegin();

            try {
            // array for header save data Lo
            $header = [
                'periode' => $monthAndYear,
                'localOrderNo' => $resultscode,
                'divisiId' => $divisi,
                'formula' => 'Default',
                'createdAt' => $datesNow,
                'createdBy' => $userId
            ];
            $this->HeaderLoModel->insert($header);

             // array for header save data PRHD
            $headerPR = [
                'NoPR' => $resultscode,
                'DivisionID' => $divisi,
                'DatePR' => $datesNow,
                'Applicant' => $userId,
                'Notes' => '',
                'TipePR' => 'NON_ASSET',
                'CreateDate' => $datesNow,
                'CreateBy' => $userId,
                'CompanyCode' => 'RI'
            ];
            $this->PRHeaderModel->insert($headerPR);


            $logPR = [
                'UserID' => $userId,
                'NoBukti' => $resultscode,
                'NoBuktiReff' => $resultscode,
                'TGL' => $datesNow,
                'Modul' => 'MnuPurcPurchaseRequest',
                'Keterangan' => '',
                'CustomerOrSupplierID' => '', 
                'JenisLog' => 'SAVE',
                'version' => '',
                'KompName' => '',
                'UserName' => $userId,
                'CreateBy' => $userId,
                'CreateDate' => $datesNow,
                'CompanyCode' => 'RI',
                'LogDetail' => ''
            ];
            $this->PRActivityLogModel->insert($logPR);


          
            //array for detail data Lo
            $partIDs = $this->request->getPost('partID'); // Mengambil array partID dari input POST
            foreach ($partIDs as $key => $x) {
                $detail = [
                    'localOrderNo' => $resultscode,
                    'idPartDivisi' => $x,
                    'keterangan' => $this->request->getPost('keterangan')[$key],
                    'month1' => $combineds,
                    'endStockMonth1' => $this->request->getPost('endStockMonth1')[$key],
                    'month2' => $CombinedNow,
                    'inActualMonth2' => $this->request->getPost('inActualMonth2')[$key],
                    'hpoMonth2' => $this->request->getPost('hpoMonth2')[$key],
                    'outPlanMonth2' => $this->request->getPost('outPlanMonth2')[$key],
                    'orderMonth2' => $this->request->getPost('orderMonth2')[$key],
                    'balancePlanMonth2' => $this->request->getPost('balancePlanMonth2')[$key],
                    'planMonth2' => $this->request->getPost('planMonth2')[$key],
                    'month3' => $combined,
                    'outPlanMonth3' => $this->request->getPost('outPlanMonth3')[$key],
                    'balancePlanMonth3' => $this->request->getPost('balancePlanMonth3')[$key],
                    'planMonth3' => $this->request->getPost('planMonth3')[$key],
                    'month4' => $combined2,
                    'outPlanMonth4' => $this->request->getPost('outPlanMonth4')[$key],
                    'orderMonthPO' => $this->request->getPost('hasilKonversi')[$key]
                ];

                // array for DETAIL save data PRDT
                 $this->DetailLoModel->insert($detail);
                 $this->DetailLoModelLog->insert($detail);


                 $detailPR = [
                    'NoPR' => $resultscode,
                    'PartID' => $x,
                    'WithDetail' => 0,
                    'NoRevisi' => '',
                    'ExplodedID' => '',
                    'MappingNo' => '',
                    'ProjectID' => '',
                    'FormulaID' => '',
                    'SupplierID' => '',
                    'SubSupplierID' => '',
                    'DateNeeded' => $dateNeeded,
                    'QtyRequest_Stock' => $this->request->getPost('orderMonth2')[$key],
                    'UnitID_Stock' => $this->request->getPost('UnitID_Stock')[$key],
                    'QtyRequest_PO' => $this->request->getPost('hasilKonversi')[$key],
                    'UnitID_PO' => $this->request->getPost('UnitID_PO')[$key],
                    'QtyApprove' => 0,
                    'Notes' => $this->request->getPost('keterangan')[$key],
                    'DetailPart' => '',
                    'StatusPA' => 'OPEN',
                    'LastBuyDate' => $datesNow,
                    'AlasanReject' => '',
                    'PIC' => '',
                    'PIC_Date' => '',
                    'PIC_By' => '',
                    'ApproveDate' => '',
                    'ApplicantDT' => $userId,
                    'CompanyCode' => 'RI'
                ];
                $this->PRDetailModel->insert($detailPR);
            }
            // Commit transaksi
            $db->transCommit();
            } catch (\Exception $e) {
                // Rollback transaksi jika terjadi kesalahan
                $db->transRollback();
                // Log error atau lakukan penanganan kesalahan sesuai kebutuhan
                log_message('error', 'Error during transaction: ' . $e->getMessage());
                throw $e; // Rethrow exception if necessary
            }
                }
   //end code local order


   //start code reports
  public function Reports_LO() {
    $data = [
        'title' => 'FILTER FOR VIEW REPORT '
    ];
        return view('Staff/Report/Data',$data);
  }



  public function get_Divisi()  {
    $divisiName = $this->request->getPost('nameDivisi');
    if ($divisiName) {
        $builder = $this->HeaderLoModel->select('localOrderNo');
        $builder->where('divisiId', $divisiName);
        $builder->orderBy('idHeader', 'DESC');
        $query = $builder->get()->getResult();
        $output = '<option value="">-SELECT NO LOCAL ORDER-</option>';
        foreach ($query as $row) {
            $output .= '<option value="' . esc($row->localOrderNo) . '">' . esc($row->localOrderNo) . '</option>';
        }
        return $output;
            }else {
                $output = '<option value="">-DATA TIDAK TERSEDIA-</option>';
            }
  }


  public function result_report()  {
    $nameDivision = $this->request->getVar('divisi');
    $noLocalOrder = $this->request->getVar('noLo');

    $builder = $this->DetailLoModel->getDataReport($noLocalOrder, $nameDivision);
    $builderrow = $this->DetailLoModel->getDataReportrow($noLocalOrder, $nameDivision);
   
    $data = [
        'title' => 'RESULT REPORT ',
        'divisi' => $nameDivision,
        'noLocalOrder' => $noLocalOrder,
        'row' => $builder,
        'rows' => $builderrow
    
    ];
        return view('Staff/Report/Dataresult',$data);
  }

  public function print_report() {
    $nameDivision = $this->request->getVar('divisi');
    $noLocalOrder = $this->request->getVar('noLo');
  
    $builder = $this->DetailLoModel->getDataReport($noLocalOrder, $nameDivision);
    $builderrow = $this->DetailLoModel->getDataReportrow($noLocalOrder, $nameDivision);
    
    $data = [
        'title' => 'Report',
        'divisi' => $nameDivision,
        'noLocalOrder' => $noLocalOrder,
        'row' => $builder,
        'rows' => $builderrow
    
    ];
        return view('Staff/Report/Dataprint',$data);
  }

    //end code reports

   //start code lo update
   public  function Form_Lo_update()  {
    $data = [
        'title' => 'FORM LOCAL ORDER UPDATE'
    ];
        return view('Staff/Form-Local-Order/FormUpdate',$data);
    }



    public function getDetailLo()
    {
        // Mendapatkan variabel dari request
        $divisi = $this->request->getVar('divisiName');
        $nolocalorder = $this->request->getVar('noLocalOrder');

        // Menyusun query SQL mentah
        $query = "
            SELECT A.idDetail, A.idPartDivisi, C.OtherID, C.PartName, D.safety_Stock, D.standart_Pack, A.keterangan, A.endStockMonth1, A.inActualMonth2, D.minimum_Order,
                   A.hpoMonth2, A.outPlanMonth2, A.balancePlanMonth2, A.planMonth2, A.orderMonth2, A.outPlanMonth3, A.balancePlanMonth3, A.planMonth3, A.outPlanMonth4, B.formula, A.orderMonthPO, C.Konversi, B.idHeader
            FROM dbo.trans_local_orderDT AS A
            LEFT JOIN dbo.trans_local_orderHD AS B ON A.localOrderNo = B.localOrderNo
            LEFT JOIN dbo.Ms_Part AS C ON A.idPartDivisi = C.PartID
            LEFT JOIN dbo.ms_part_divisi AS D ON C.PartID = D.partID
            WHERE A.localOrderNo = ? AND B.divisiId = ?
        ";

        // Menjalankan query dengan parameter
        $queryResult = $this->DetailLoModel->query($query, [$nolocalorder, $divisi]);

        // Mendapatkan hasil dan mengembalikannya dalam format JSON
        $result = $queryResult->getResultArray();
        echo json_encode($result);
    }




    public function save_lo_data_update() {
        $datesNow = date('Y-m-d');
        
        // Get the user from the session
        $session = session();
        $user = $session->get('UserID');
        
        // Get input data
        $noLocalOrders = $this->request->getPost('noLocalOrder');
        $idHeader = $this->request->getPost('idHeader');
        $header = [
            'updatedAt' => $datesNow,
            'updatedBy' => $user
        ];

        $this->HeaderLoModel->update_data($idHeader, $header);
        
     // End header update

     // Start detail update
     $data = $this->request->getPost();
     $batch = [];
     if (isset($data['idDetail']) && is_array($data['idDetail'])) {
         foreach ($data['idDetail'] as $i => $idDetail) {
             $batch[] = [
                 'idDetail' => $idDetail,
                 'keterangan' => $data['keterangan'][$i] ?? null,
                 'outPlanMonth2' => $data['outPlanMonth2'][$i] ?? null,
                 'balancePlanMonth2' => $data['balancePlanMonth2'][$i] ?? null,
                 'planMonth2' => $data['planMonth2'][$i] ?? null,
                 'orderMonth2' => $data['orderMonth2'][$i] ?? null,
                 'outPlanMonth3' => $data['outPlanMonth3'][$i] ?? null,
                 'balancePlanMonth3' => $data['balancePlanMonth3'][$i] ?? null,
                 'planMonth3' => $data['planMonth3'][$i] ?? null,
                 'outPlanMonth4' => $data['outPlanMonth4'][$i] ?? null,
                 'orderMonthPO' => $data['hasilKonversi'][$i] ?? null
             ];
         }
     }

     if (!empty($batch)) {
         $builder = $this->DetailLoModel->table('trans_local_orderDT');
         $builder->updateBatch($batch, 'idDetail');
     }
    }
    //end code lo update



}
