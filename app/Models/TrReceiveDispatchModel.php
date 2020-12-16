<?php namespace App\Models;
 
use CodeIgniter\Model;

class TrReceiveDispatchModel extends Model
{
    protected $table = "tr_receive_dispatch";
    public function getReceive($id = false, $date = false)
    {
        if($id === false){
            // $builder = $this->db->table('ms_rak')
            // ->select('rak_id, rak_sektor, sek_nama, rak_max_capacity, rak_status')
            // ->join('ms_sektor', 'ms_rak.rak_sektor=ms_sektor.sek_id')
            // ->where('rak_status =', 0)
            // ->get();
            // return $builder;
            $builder = $this->db->table('tr_receive_dispatch');
            $builder->select('tr_id, tr_date_in, 
            tr_receive_dispatch.rak_id, rak_nama, tr_receiver_id, pen_nama, tr_status_receive');
            $builder->join('ms_rak', 
            'tr_receive_dispatch.rak_id=ms_rak.rak_id');
            $builder->join('ms_pengguna', 
            'tr_receive_dispatch.tr_receiver_id=ms_pengguna.pen_npk');
            return $builder->get();
        } else {
            return $this->table('tr_receive_dispatch')
                        ->where('tr_id', $id)
                        ->where('tr_date_in', $date)
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

    public function getDispatch($id = false, $date = false)
    {
        if($id === false){
            // $builder = $this->db->table('ms_rak')
            // ->select('rak_id, rak_sektor, sek_nama, rak_max_capacity, rak_status')
            // ->join('ms_sektor', 'ms_rak.rak_sektor=ms_sektor.sek_id')
            // ->where('rak_status =', 0)
            // ->get();
            // return $builder;
            $builder = $this->db->table('tr_receive_dispatch');
            $builder->select('tr_id, tr_date_out, 
            tr_receive_dispatch.rak_id, rak_nama, tr_dispatcher_id, 
            pen_nama, tr_status_dispatch');
            $builder->join('ms_rak', 
            'tr_receive_dispatch.rak_id=ms_rak.rak_id');
            $builder->join('ms_pengguna', 
            'tr_receive_dispatch.tr_dispatcher_id=ms_pengguna.pen_npk');
            return $builder->get();
        } else {
            return $this->table('tr_receive_dispatch')
                        ->where('tr_id', $id)
                        ->where('tr_date_out', $date)
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
    
    public function insert_tr($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_tr($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['rak_id' => $id]);
    }

    public function cancel_receive($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['rec_id' => $id]);
    }
}