<?php namespace App\Models;
 
use CodeIgniter\Model;

class MsRakModel extends Model
{
    protected $table = "ms_rak";
    public function getRak($id = false)
    {
        if($id === false){
            // $builder = $this->db->table('ms_rak')
            // ->select('rak_id, rak_sektor, sek_nama, rak_max_capacity, rak_status')
            // ->join('ms_sektor', 'ms_rak.rak_sektor=ms_sektor.sek_id')
            // ->where('rak_status =', 0)
            // ->get();
            // return $builder;
            $builder = $this->db->table('ms_rak');
            $builder->select('rak_id, rak_sektor, sek_nama, rak_nama,
            rak_max_capacity, rak_jml_isi, rak_status');
            $builder->join('ms_sektor', 
            'ms_rak.rak_sektor=ms_sektor.sek_id');
            $where = 'rak_status = 1';
            $builder->where($where);
            return $builder->get();
        } else {
            return $this->table('ms_rak')
                        ->where('rak_id', $id)
                        ->get()
                        ->getRowArray();
            // $builder = $this->db->table('ms_rak');
            // $builder->select('rak_id, rak_sektor, sek_nama, rak_nama,
            // rak_max_capacity, rak_jml_isi, rak_status');
            // $builder->join('ms_sektor', 
            // 'ms_rak.rak_sektor=ms_sektor.sek_id');
            // $builder->where('rak_id', $id);
            // return $builder->get();
        }   
    }
    
    public function insert_rak($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_rak($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['rak_id' => $id]);
    }

    public function deactivate_rak($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['rak_id' => $id]);
    }
}