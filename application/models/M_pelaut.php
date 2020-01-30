<?php
defined('BASEPATH') or exit('No direct Script access allowed');

class M_pelaut extends CI_Model
{
  function edit_data($where,$table){
    return $this->db->get_where($table,$where);
  }

  function get_data($table){
    return $this->db->get($table);
  }

  function insert_data($data,$table){
    $this->db->insert($table,$data);
  }

  function update_data($table,$data,$where){
    $this->db->update($table,$data,$where);
  }

  function delete_data($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function nomor_booking(){
    $this->db->select('right(no_booking,3) as nobok', false);
    $this->db->order_by('no_booking', 'desc');
    $this->db->limit(1);
    $query = $this->db->get('booking');
    if($query->num_rows() > 0){
      $data = $query->row_array();
      $kode = intval($data['nobok'])+1;

    }else{
      $kode = 1;
    }

    $no_box = str_pad($kode,3,"0", STR_PAD_LEFT);
    $tgl = date('ym');
    $no_booking = "P".$tgl.$no_box;

    return $no_booking;
  }
  
}
