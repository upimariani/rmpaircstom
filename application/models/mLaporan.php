<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{
    public function lap_harian_transaksi($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('transaksi_cust');
        $this->db->join('konsumen', 'transaksi_cust.id_konsumen = konsumen.id_konsumen', 'left');
        $this->db->where('status_order=2');

        $this->db->where('DAY(tgl_order)', $tanggal);
        $this->db->where('MONTH(tgl_order)', $bulan);
        $this->db->where('YEAR(tgl_order)', $tahun);
        return $this->db->get()->result();
    }
    public function lap_bulanan_transaksi($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('transaksi_cust');
        $this->db->join('konsumen', 'transaksi_cust.id_konsumen = konsumen.id_konsumen', 'left');
        $this->db->where('status_order=2');

        $this->db->where('MONTH(tgl_order)', $bulan);
        $this->db->where('YEAR(tgl_order)', $tahun);
        return $this->db->get()->result();
    }
    public function lap_tahunan_transaksi($tahun)
    {
        $this->db->select('*');
        $this->db->from('transaksi_cust');
        $this->db->join('konsumen', 'transaksi_cust.id_konsumen = konsumen.id_konsumen', 'left');
        $this->db->where('status_order=2');


        $this->db->where('YEAR(tgl_order)', $tahun);
        return $this->db->get()->result();
    }
}

/* End of file mLaporan.php */
