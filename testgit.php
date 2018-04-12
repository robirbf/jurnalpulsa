<?php

public function daftartransaksi()
	{
		$list = $this->transaksi->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $transaksi) {
			$no++;
			$row = array();
			$row[] = $transaksi->tanggal;
			$row[] = $transaksi->kode;
			$row[] = $transaksi->trxid;
			$row[] = $transaksi->tujuan;
            $row[] = $transaksi->status;
            $row[] = $transaksi->harga;
            $row[] = $transaksi->sn;
            $row[] = $transaksi->pengirim;
            $row[] = $transaksi->via;
            
            $data[] = $row;
		}

        ?>