<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Janji extends Model
{
    protected $table = 'tbl_janji_temu';
    // protected $primaryKey = 'id_janji';

    public function getDataJanji($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('id_pasien', 'ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('id_pasien', 'ASC');
            return $query = $builder->get();
        }
    }
    public function getDataJanjiJoin($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->join('tbl_pasien', 'tbl_pasien.id_pasien = tbl_janji_temu.id_pasien', 'LEFT');
            $builder->join('tbl_jadwal_dokter', 'tbl_jadwal_dokter.id_jadwal = tbl_janji_temu.id_jadwal', 'LEFT');
            $builder->orderBy('tbl_janji_temu.id_pasien', 'tbl_janji_temu.id_jadwal', 'ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->join('tbl_pasien', 'tbl_pasien.id_pasien = tbl_janji_temu.id_pasien', 'LEFT');
            $builder->join('tbl_jadwal_dokter', 'tbl_jadwal_dokter.id_jadwal = tbl_janji_temu.id_jadwal', 'LEFT');
            $builder->orderBy('tbl_janji_temu.id_pasien', 'tbl_janji_temu.id_jadwal', 'ASC');
            return $query = $builder->get();
        }
    }

    public function saveDataJanji($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataJanji($data, $where)
    {
        return $this->db->table('tbl_janji_temu')->update($data, $where);
    }


    public function autoNumber()
    {
        $builder = $this->db->table($this->table);
        $builder->select("id_janji");
        $builder->orderBy("id_janji", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
    }
}
