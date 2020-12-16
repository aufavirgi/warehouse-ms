<?php namespace App\Models;
 
use CodeIgniter\Model;

class MsBarangModel extends Model
{
    protected $table = "ms_barang";
    public function getBarang($id = false)
    {
        // $builder = $this->db->table('ms_pengguna');
        // $sql = "select pen_npk, pen_nama, pen_role, 
        // pen_password, pen_status FROM ms_pengguna";
        if($id === false){
            // return $builder->get()->getRowArray();
            // return $this->table('ms_pengguna')
            //             ->get()
            //             ->getResultArray();
            $builder = $this->db->table('ms_barang');
            $builder->select('*');
            $where = 'bar_status = 1';
            $builder->where($where);
            return $builder->get();
        } else {
            return $this->table('ms_barang')
                        ->where('bar_id', $id)
                        ->get()
                        ->getRowArray();
        }   
    }

    public function getBarangBySektor($id){
        $builder = $this->db->table('ms_barang')
        ->select('bar_id, bar_nama, bar_kategori, bar_stok')
        ->where('bar_kategori', $id)
        ->where('bar_status', 1)
        ->get();
        return $builder->getResult();
    }
    
    public function insert_barang($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_barang($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['bar_id' => $id]);
    }

    public function deactivate_barang($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['bar_id' => $id]);
    }
}