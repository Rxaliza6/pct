<?php

use App\Models\User;

function rupiah($angka)
{

	$hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
	return $hasil_rupiah;
}

function cekAkun($id)
{
	$user = User::find($id);
	if (is_null($user->nama) || is_null($user->no_hp) || is_null($user->kecamatan_id) || is_null($user->alamat)) {
		return false;
	} else return true;
}

function deleteFile($foto, $path)
{
	$existingFoto = $path . $foto;
	if (file_exists($existingFoto) && is_file($existingFoto)) {
		return unlink($existingFoto);
	}

	return false;
}
