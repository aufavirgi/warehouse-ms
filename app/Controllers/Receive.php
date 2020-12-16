<?php 
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\MsRakModel;
use App\Models\MsSektorModel;
use App\Models\MsBarangModel;
use App\Models\MsPenggunaModel;
use App\Models\TrReceiveDispatchModel;
use App\Models\TrDetilModel;

//library
use App\Libraries\Cart;
//thirdParty
// use Wildanfuady\WFcart\WFcart;

class Receive extends Controller
{
 
    public function __construct() {
 
        // Mendeklarasikan class MsPenggunaModel menggunakan $this->product
        $this->rak = new MsRakModel();
        $this->sektor = new MsSektorModel();
        $this->pengguna = new MsPenggunaModel();

        $this->barang = new MsBarangModel();
        //---
        $this->cart = new Cart();
        // memanggil form helper
        helper('form');
        
        $this->receive = new TrReceiveDispatchModel();
        $this->detil = new TrDetilModel();
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
        $tr_id = $this->receive->selectMax('tr_id')->first();
        $id_last = $tr_id['tr_id'];
        if($tr_id == null){
            $data['maxid'] = "TRS0001";
        }else {
            $nourut = (int)substr($id_last, 3, 4);
			$nourut++;
			$char = "TRS";
			$id_tr = $char . sprintf("%04s", $nourut);
            $data['maxid'] = $id_tr;
        }
        //variabel untuk menampung data cart
        $data['pengguna'] = $this->pengguna->getReceiver();
        $data['cart'] = $this->cart->contents();
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
            'id'             => $this->request->getPost('bar_id'), //wajib
            'name'           => $this->request->getPost('bar_nama'), //wajib
            'bar_id'         => $this->request->getPost('bar_id'),//input dari modal
            'bar_nama'       => $this->request->getPost('bar_nama'),
            'bar_kategori'   => $this->request->getPost('bar_kategori'),
            'price'         =>$this->request->getPost('tr_qty'), //wajib
            'qty'       => $this->request->getPost('tr_qty') //wajib
        );
        $this->cart->insert($data);
        return redirect()->to('/receive/create');
    }

    public function hapus_cart($id)
	{
        $this->cart->remove($id);
        // $data = array(
        //     'rowid'    => $id,
        //     'qty'   => 0,
        // );
        // $this->cart->update($data);
        return redirect()->to('/receive/create');
        // $data = array(
        //     'rowid'    => $id,
        //     'qty'   => 0,
        // );
        // $this->cart->update($data);
        // redirect('app/tambah_penjualan');
	}

    public function store()//memasukkan data barang masuk
    {
        // Mengambil value dari form dengan method POST
        $tr_id = $this->request->getPost('tr_id');
        $tr_date_in = date('Y-m-d');
        $rak_id = $this->request->getPost('rak_id');
        $tr_receiver_id = $this->request->getPost('tr_receiver_id');

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
        $simpan = $this->receive->insert_tr($data);

        //insert detil
        foreach ($this->cart->contents() as $items) {
        	$bar_id = $items['bar_id'];
            $qty = $items['qty'];
            $stok_masuk = $items['qty'];
            //insert detil
        	$d = array(
        		'tr_id' => $tr_id,
        		'bar_id' => $bar_id,
        		'tr_qty' => $qty,
        	);
            $this->detil->insert_detil($d);
            //update dan tambah stok barang --

            $data_barang = $this->barang->where('bar_id', $bar_id)
            ->where('bar_status', 1)->first();
            $stok_lama = $data_barang['bar_stok'];
            $stok_baru = $stok_lama + $stok_masuk;

            $data_update_barang = [
                'bar_stok' => $stok_baru
            ];
        
            /* 
            Membuat variabel ubah yang isinya merupakan memanggil function 
            update_product dan membawa parameter data beserta id
            */
            $ubah_barang = $this->barang->update_barang($data_update_barang, $bar_id);
            
        }
        //update dan tambah isi rak --
        $jml_palette_masuk = 1;
        $data_rak = $this->rak->where('rak_id', $rak_id)
            ->where('rak_status', 1)->first();
        $jml_palette_lama = $data_rak['rak_jml_isi'];
        $jml_palette_baru = $jml_palette_lama + $jml_palette_masuk;

        $data_update_rak = [
            'rak_jml_isi' => $jml_palette_baru
        ];
    
        $ubah_rak = $this->rak->update_rak($data_update_rak, $rak_id);
        //-----------

        // Membuat array collection yang disiapkan untuk insert ke table
        
        $this->cart->destroy();
    
        // Jika simpan berhasil, maka ...
        if($simpan)
        {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Data Rak Berhasil Disimpan!');
            // Redirect halaman ke product
            return redirect()->to(base_url('receive/index')); 
        }
    }
    
    public function view_detil($id)
    {
        // Memanggil function getPengguna($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['receive'] = $this->receive->getReceive($id);
        $data['detil'] = $this->detil->getDetil($id)->getResult();
        // Mengirim data ke dalam view
        return view('receive/view_detil', $data);
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