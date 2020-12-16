<?php namespace App\Models;
 
use CodeIgniter\Model;

class TrDetilModel extends Model
{
    protected $table = "detil_tr_barang";
    public function getDetil($id = false)
    {
        if($id === false){
            // $builder = $this->db->table('ms_rak')
            // ->select('rak_id, rak_sektor, sek_nama, rak_max_capacity, rak_status')
            // ->join('ms_sektor', 'ms_rak.rak_sektor=ms_sektor.sek_id')
            // ->where('rak_status =', 0)
            // ->get();
            // return $builder;
            $builder = $this->db->table('detil_tr_barang');
            $builder->select('tr_id, detil_tr_barang.bar_id, bar_nama, tr_qty');
            $builder->join('ms_barang', 
            'detil_tr_barang.bar_id=ms_barang.bar_id');
            $builder->where('tr_id',$id);
            return $builder->get();
        } else {
            return $this->table('detil_tr_barang')
                        ->select('tr_id, detil_tr_barang.bar_id, bar_nama, tr_qty')
                        ->join('ms_barang', 'detil_tr_barang.bar_id=ms_barang.bar_id')
                        ->where('tr_id', $id)
                        ->get();
            // $builder = $this->db->table('ms_rak');
            // $builder->select('rak_id, rak_sektor, sek_nama, rak_nama,
            // rak_max_capacity, rak_jml_isi, rak_status');
            // $builder->join('ms_sektor', 
            // 'ms_rak.rak_sektor=ms_sektor.sek_id');
            // $builder->where('rak_id', $id);
            // return $builder->get();
        }   
    }
    
    public function insert_detil($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    // public function update_rak($data, $id)
    // {
    //     return $this->db->table($this->table)->update($data, ['tr_id' => $id]);
    // }

    // public function deactivate_rak($data, $id)
    // {
    //     return $this->db->table($this->table)->update($data, ['rak_id' => $id]);
    // }
}