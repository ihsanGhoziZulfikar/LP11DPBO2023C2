<?php


include_once("kontrak/KontrakPasien.php");
include_once("presenter/ProsesPasien.php");

class TampilPasien implements KontrakPasienView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
			<a href='index.php?edit=".$this->prosespasien->getId($i)."'>edit</a>
			<a href='index.php?delete=".$this->prosespasien->getId($i)."'>delete</a>
			</td>";
		}

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
	function showAddForm(){
		$submitName = "add";
		// Membaca template skin.html
		$this->tpl = new Template("templates/skinFormPasien.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_SUBMIT_NAME", $submitName);

		// Menampilkan ke layar
		$this->tpl->write();
	}
	function showEditForm($id){
		$submitName = "edit";
		$dataId = '<input type="hidden" name="id" value="'.$id.'">';
		$this->prosespasien->prosesDataPasienById($id);

		// Membaca template skin.html
		$this->tpl = new Template("templates/skinFormPasien.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_NIK", $this->prosespasien->getNik());
		$this->tpl->replace("DATA_NAMA", $this->prosespasien->getNama());
		$this->tpl->replace("DATA_TEMPAT", $this->prosespasien->getTempat());
		$this->tpl->replace("DATA_TL", $this->prosespasien->getTl());
		$this->tpl->replace("DATA_GENDER", $this->prosespasien->getGender());
		$this->tpl->replace("DATA_EMAIL", $this->prosespasien->getEmail());
		$this->tpl->replace("DATA_TELP", $this->prosespasien->getTelp());
		$this->tpl->replace("DATA_ID", $dataId);
		$this->tpl->replace("DATA_SUBMIT_NAME", $submitName);
		// Menampilkan ke layar
		$this->tpl->write();
	}

	function onFormAdd($data){
		$this->prosespasien->onFormAdd($data);
		header('location:index.php');
	}
	function onFormEdit($data){
		$this->prosespasien->onFormEdit($data);
		header('location:index.php');
	}
	function onFormDelete($id){
		$this->prosespasien->onFormDelete($id);
		header('location:index.php');
	}
}
