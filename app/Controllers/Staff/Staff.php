<?php

namespace App\Controllers\Staff;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PartDivisiModel;
use App\Models\UnitModel;
use App\Models\PartsModel;
class Staff extends BaseController
{

    protected $PartDivisiModel;
    protected $UnitModel;
    protected $PartsModel;
    public function __construct() {
        $this->PartDivisiModel = new PartDivisiModel();
        $this->UnitModel = new UnitModel();
        $this->PartsModel = new PartsModel();
    }

    public function Home()
    {
        $data = [
            'title' => 'Local Order'
             ];
                 return view('Staff/Home',$data);
         }


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
            //query sql
            $sql = "
            SELECT c.partID, c.PartName, a.standart_Pack, a.minimum_Order, c.OtherID, ISNULL(sum(b.qty),0) AS endstock, a.safety_Stock, c.Konversi,
                isnull((SELECT sum(x.QtyPO) FROM trans_BPBDT$monthAndYearnow x left join ms_part_divisi y on x.partid = y.partid and y.partID = c.PartID
                inner join ms_warehousestock z on z.DivisionID = y.divisiID ),0) AS InActual,
                isnull((SELECT sum(orderMonth2) as orderMonth2 FROM trans_local_orderDT x 
                inner join ms_part_divisi y on x.idPartDivisi = y.partid and x.idPartDivisi = c.partID and x.idPartDivisi = a.partID where month2 = '$monthoneminusfromnow'),0) - 
                isnull((SELECT sum(x.QtyPO) as InActual FROM trans_BPBDT$monthAndYearnow x left join ms_part_divisi y on x.partid = y.partid and y.partID = c.PartID
                inner join ms_warehousestock z on z.DivisionID = y.divisiID ),0)
                AS HPO
                FROM ms_part_divisi a
                LEFT JOIN buku_Stock$monthoneminusfromnow b ON b.partID = a.PartID
                INNER JOIN ms_part c ON c.PartID = a.partID
                INNER JOIN Ms_WarehouseStock d ON a.divisiID = d.DivisionID 
                WHERE a.divisiID = '$divisions' AND d.groupcode = '$groupBranch' AND a.Is_Active = 1 AND d.groupcode = '$groupBranch'
                GROUP BY a.partID, c.PartName, a.standart_Pack, c.OtherID, a.safety_Stock, c.PartID, a.id, a.minimum_Order, c.Konversi
                ORDER BY a.id DESC";
            // Execute the query
            $query = $this->PartDivisiModel->query($sql);
            // Fetch the results
            $response = $query->getResult();
            // Encode the result in JSON format
            echo json_encode($response);
         }
}
