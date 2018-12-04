<?php

class Dashboard_model extends CI_Model{
	public function jumlah_surat($tipe) {
		switch ($tipe){
			case 'surat_keluar':
				$data = $this->db->where('tbl_surat.deleted_at',NULL)->count_all_results('tbl_surat');
				break;
			case 'surat_masuk':
				$data = $this->db->where('tbl_surat_masuk.deleted_at',NULL)->count_all_results('tbl_surat_masuk');
				break;
			case 'sppd':
				$data = $this->db->where('tbl_sppd.deleted_at',NULL)->count_all_results('tbl_sppd');
				break;
			case 'spj':
				$sppd = $this->db->where('tbl_sppd.deleted_at',NULL)->count_all_results('tbl_sppd');

				$spj = $this->db->where('tbl_spj.deleted_at',NULL)->count_all_results('tbl_spj');
				$data = ($sppd == 0 ? $data = 0 : (($spj/$sppd)*100));
				break;
			default:
				$data = 0;
		}

		return $data;
	}
}