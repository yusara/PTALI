<?php

//fetch.php

$api_url = "http://localhost/rest-crud-ptali/api/test_api.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row->nama.'</td>
			<td>'.$row->alamat.'</td>
			<td>'.$row->usia.'</td>
			<td>'.$row->bidang_keahlian.'</td>
			<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button></td>
			<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">Data Tidak Ditemukan</td>
	</tr>
	';
}

echo $output;

?>