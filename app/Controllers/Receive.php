<?php 
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\MsRakModel;
use App\Models\MsSektorModel;
use App\Models\MsBarangModel;
use App\Models\MsPenggunaModel;
use App\Models\TrReceiveDispatchModel;
use App\Models\TrDetilModel;
//thirdParty
use Wildanfuady\WFcart\WFcart;

class Receive extends Controller
{
 
    public function __construct() {
 
        // Mendeklarasikan class MsPenggunaModel menggunakan $this->product
        $this->rak = new MsRakModel();
        $this->sektor = new MsSektorModel();
        $this->pengguna = new MsPenggunaModel();

        $this->barang = new MsBarangModel();
        //---
        $this->cart = new WFcart();
        // memanggil form helper
        helper('form');
        
        $this->receive = new TrReceiveDispatchModel();
        $this->detil = new MsSektorModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }
 
    public function index()
    {
        $data['receive'] = $this->receive->getReceive()->getResult();
        echo view('receive/index', $data);
    }
    
    public function create()
    {
        $tr_id = $this->receive->select('tr_id', 'maxid')->get()->getResult();
        if($tr_id == null){
            $data['maxid'] = "TRS0001";
        }else {
            $nourut = (int)substr($tr_id, 3, 4);
			$nourut++;
			$char = "TRS";
			$id_tr = $char . sprintf("%04s", $nourut);
            $data['maxid'] = $id_tr;
        }
        //variabel untuk menampung data cart
        $data['items'] = $this->cart->totals();
        $data['sektor'] = $this->sektor->getSektor()->getResult();
        return view('receive/create', $data);
    }

    public function get_rak_by_sektor(){
        $data = $this->rak->getRakBySektor($this->request->getPost('id'));//id merupakan parameter yg dikirim dari ajax
        echo json_encode($data);
    }

    public function get_barang_by_sektor(){
        $id_sektor = $this->request->getPost('id');
        $data_sektor = $this->sektor->where('sek_id', $id_sektor)
        ->where('sek_status', 1)->first();
        $kategori_sektor = $data_sektor['sek_kategori'];
        $data = $this->barang->getBarangBySektor($kategori_sektor);
        echo json_encode($data);
    }

    public function cek_barang(){
        $data_barang = $this->barang->where('bar_id', $this->request->getPost('id'))
        ->where('bar_status', 1)->first();
        $data = array(
			'bar_id' => $data_barang['bar_id'],
			'bar_kategori' => $data_barang['bar_kategori'],
			'bar_nama' => $data_barang['bar_nama']
        );
        echo json_encode($data);
    }
    
    public function simpan_cart()
    {
        $id = $this->request->getPost('bar_id');
        $data = array(
            'id'             => $this->request->getPost('bar_id'),
            'name'           => $this->request->getPost('bar_nama'),
            'bar_id'         => $this->request->getPost('bar_id'),//input dari modal
            'bar_nama'       => $this->request->getPost('bar_nama'),
            'bar_kategori'   => $this->request->getPost('bar_kategori'),
            'tr_qty'         => $this->request->getPost('tr_qty')
        );
        $this->cart->add_cart($id, $data);
        return redirect()->to('/receive/create');
        // return redirect()->to('/login');
    }

    public function hapus_cart($id)
	{
        $this->cart->remove($id);
        return redirect()->to('/receive/create');
        // $data = array(
        //     'rowid'    => $id,
        //     'qty'   => 0,
        // );
        // $this->cart->update($data);
        // redirect('app/tambah_penjualan');
	}

    public function store()
    {
        // Mengambil value dari form dengan method POST
        $tr_id = $this->request->getPost('tr_id');
        $tr_date_in = date('Y-m-d');
        $rak_id = $this->request->getPost('rak_id');
        $tr_receiver_id = $this->request->getPost('tr_receiver_id');

        //insert detil
        foreach ($this->cart->contents() as $items) {
        	$bar_id = $items['bar_id'];
            $qty = $items['tr_qty'];
            $stokBarang = $items['tr_qty'];
            $jml_barang_masuk = 1;
        	$d = array(
        		'tr_id' => $tr_id,
        		'bar_id' => $bar_id,
        		'tr_qty' => $qty,
        	);
            $this->rak->insert_detil($d);
            //update dan tambah stok barang --

            //update dan tambah isi rak --
        }
    
        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'tr_id' => $tr_id,
            'tr_date_in' => $tr_date_in,
            'rak_id' => $rak_id,
            'tr_receiver_id' => $tr_receiver_id,
            'tr_status_receive' => 1,
            'tr_status_dispatch' => 0
        ];
    
        /* 
        Membuat variabel simpan yang isinya merupakan memanggil function 
        insert_pengguna dan membawa parameter data 
        */
        $simpan = $this->rak->insert_tr($data);
        
    
        // Jika simpan berhasil, maka ...
        if($simpan)
        {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Data Rak Berhasil Disimpan!');
            // Redirect halaman ke product
            return redirect()->to(base_url('rak')); 
        }
    }
    
    public function edit($id)
    {
        // Memanggil function getPengguna($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['rak'] = $this->rak->getRak($id);
        $data['sektor'] = $this->sektor->getSektor()->getResult();
        // Mengirim data ke dalam view
        return view('rak/edit', $data);
    }
    
    public function update($id)
    {
        // Mengambil value dari form dengan method POST
        // $npk = $this->request->getPost('pen_npk');
        $rak_sektor = $this->request->getPost('rak_sektor');
        $rak_nama = $this->request->getPost('rak_nama');
        $rak_max_capacity = $this->request->getPost('rak_max_capacity');
    
        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'rak_sektor' => $rak_sektor,
            'rak_nama' => $rak_nama,
            'rak_max_capacity' => $rak_max_capacity
        ];
    
        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->rak->update_rak($data, $id);
        
        // Jika berhasil melakukan ubah
        if($ubah)
        {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Data Rak Berhasil Diubah!');
            // Redirect ke halaman product
            return redirect()->to(base_url('rak')); 
        }
    }

    public function deactivate($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $data = [
            'rak_status' => 0
        ];
        $hapus = $this->pengguna->deactivate_rak($data, $id);
    
        // Jika berhasil melakukan hapus
        if($hapus)
        {
                // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Rak Berhasil Dinon-aktifkan!');
            // Redirect ke halaman product
            return redirect()->to(base_url('rak'));
        }
    } 
}