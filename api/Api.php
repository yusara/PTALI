<?php

//Api.php

class API
{
	private $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=p-tali", "root", "");
	}

	function fetch_all()
	{
		$query = "SELECT * FROM tbl_anggota ORDER BY id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{
		if(isset($_POST["nama"]))
		{
			$form_data = array(
				':nama'					=>	$_POST["nama"],
				':alamat'				=>	$_POST["alamat"],
				':usia'					=>	$_POST["usia"],
				':bidang_keahlian'		=>	$_POST["bidang_keahlian"]
			);
			$query = "
			INSERT INTO tbl_anggota
			(nama, alamat, usia, bidang_keahlian) VALUES 
			(:nama, :alamat, :usia, :bidang_keahlian)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function fetch_single($id)
	{
		$query = "SELECT * FROM tbl_anggota WHERE id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['nama'] = $row['nama'];
				$data['alamat'] = $row['alamat'];
				$data['usia'] = $row['usia'];
				$data['bidang_keahlian'] = $row['bidang_keahlian'];
			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["nama"]))
		{
			$form_data = array(
				':nama'				=>	$_POST['nama'],
				':alamat'			=>	$_POST['alamat'],
				':usia'				=>	$_POST['usia'],
				':bidang_keahlian'	=>	$_POST['bidang_keahlian'],
				':id'				=>	$_POST['id']
			);
			$query = "
			UPDATE tbl_anggota 
			SET nama = :nama, alamat = :alamat, usia = :usia, bidang_keahlian = :bidang_keahlian
			WHERE id = :id
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function delete($id)
	{
		$query = "DELETE FROM tbl_anggota WHERE id = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>