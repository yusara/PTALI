<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>

<head>
	<title>Data Anggota PTALI</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container-fluid">
		<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">PTALI</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
						<li><a href="#">Link</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">One more separated link</a></li>
							</ul>
						</li> -->
					</ul>
					<!-- <form class="navbar-form navbar-left">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form> -->
					<ul class="nav navbar-nav navbar-right">
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akun <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Profil</a></li>
								<li><a href="#">Pengaturan</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="logout.php">Keluar</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
		</nav>

		<br />

		<h3 align="center">Data Anggota PTALI</h3>
		<br />
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10	">
				<div align="right" style="margin-bottom:5px;">
					<button type="button" name="add_button" id="add_button" class="btn btn-success btn-xs">Add</button>
				</div>
				
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Usia</th>
								<th>Bidang Keahlian</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	`<div id="apicrudModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" id="api_crud_form">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Tambah Data</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Masukkan Nama Lengkap</label>
							<input type="text" name="nama" id="nama" class="form-control" />
						</div>
						<div class="form-group">
							<label>Masukkan Alamat</label>
							<input type="text" name="alamat" id="alamat" class="form-control" />
						</div>
						<div class="form-group">
							<label>Masukkan Usia</label>
							<input type="text" name="usia" id="usia" class="form-control" />
						</div>
						<div class="form-group">
							<label>Masukkan Bidang Keahlian (x: Pertanian)</label>
							<input type="text" name="bidang_keahlian" id="bidang_keahlian" class="form-control" />
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="hidden_id" id="hidden_id" />
						<input type="hidden" name="action" id="action" value="insert" />
						<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>

</html>


<script type="text/javascript">
	$(document).ready(function() {

		fetch_data();

		function fetch_data() {
			$.ajax({
				url: "fetch.php",
				success: function(data) {
					$('tbody').html(data);
				}
			})
		}

		$('#add_button').click(function() {
			$('#action').val('insert');
			$('#button_action').val('Insert');
			$('.modal-title').text('Add Data');
			$('#apicrudModal').modal('show');
		});

		$('#api_crud_form').on('submit', function(event) {
			event.preventDefault();
			if ($('#nama').val() == '') {
				alert("Masukan Nama");
			} else if ($('#alamat').val() == '') {
				alert("Masukkan Alamat");
			} else if ($('#usia').val() == '') {
				alert("Masukkan Usia");
			} else if ($('#bidang_keahlian').val() == '') {
				alert("Masukkan Bidang Keahlian");
			} else {
				var form_data = $(this).serialize();
				$.ajax({
					url: "action.php",
					method: "POST",
					data: form_data,
					success: function(data) {
						fetch_data();
						$('#api_crud_form')[0].reset();
						$('#apicrudModal').modal('hide');
						if (data == 'insert') {
							alert("Data anggota Ditambahkan");
						}
						if (data == 'update') {
							alert("Data anggota berhasil di update");
						}
					}
				});
			}
		});

		$(document).on('click', '.edit', function() {
			var id = $(this).attr('id');
			var action = 'fetch_single';
			$.ajax({
				url: "action.php",
				method: "POST",
				data: {
					id: id,
					action: action
				},
				dataType: "json",
				success: function(data) {
					$('#hidden_id').val(id);
					$('#nama').val(data.nama);
					$('#alamat').val(data.alamat);
					$('#usia').val(data.usia);
					$('#bidang_keahlian').val(data.bidang_keahlian);
					$('#action').val('update');
					$('#button_action').val('Update');
					$('.modal-title').text('Edit Data');
					$('#apicrudModal').modal('show');
				}
			})
		});

		$(document).on('click', '.delete', function() {
			var id = $(this).attr("id");
			var action = 'delete';
			if (confirm("Apakah anda yakin menghapus data anggota?")) {
				$.ajax({
					url: "action.php",
					method: "POST",
					data: {
						id: id,
						action: action
					},
					success: function(data) {
						fetch_data();
						alert("Data berhasil dihapus");
					}
				});
			}
		});

	});
</script>