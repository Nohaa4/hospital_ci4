<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Jadwal extends Model
{
    protected $table = 'tbl_jadwal_dokter';

    public function getDataJadwal($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('id_dokter', 'ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('id_dokter', 'ASC');
            return $query = $builder->get();
        }
    }
    public function getDataJadwalJoin($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->join('tbl_dokter', 'tbl_dokter.id_dokter = tbl_jadwal_dokter.id_dokter', 'LEFT');
            $builder->orderBy('tbl_jadwal_dokter.id_dokter', 'ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->join('tbl_dokter', 'tbl_dokter.id_dokter = tbl_jadwal_dokter.id_dokter', 'LEFT');
            $builder->orderBy('tbl_jadwal_dokter.id_dokter', 'ASC');
            return $query = $builder->get();
        }
    }

    public function saveDataJadwal($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataJadwal($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function autoNumber()
    {
        $builder = $this->db->table($this->table);
        $builder->select("id_jadwal");
        $builder->orderBy("id_jadwal", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
    }
}
