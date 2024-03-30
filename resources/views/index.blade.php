<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>
 
	<div class="container" style="text-align : center">
		<h3>Data Pegawai</h3>
 
	<a href="/pegawai/tambah"> + Tambah Pegawai Baru</a>
	<div id="time-widget">
        <h2>Waktu Terkini WIB</h2>
        <div id="time-info">
            <p>Loading...</p>
        </div>
    </div>
	
	{{-- timer set --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var apiUrl = 'http://worldtimeapi.org/api/timezone/Asia/Jakarta';

            $.getJSON(apiUrl, function(data) {
                    // Mendapatkan waktu terkini dalam WIB dari respon API
                    var currentTime = new Date(data.utc_datetime);
                    var currentTimeString = currentTime.toLocaleString('id-ID', {
                        timeZone: 'Asia/Jakarta'
                    });

                    // Memperbarui tampilan widget waktu dengan waktu terkini dalam WIB
                    $('#time-info').html('<p>Waktu terkini: ' + currentTimeString + '</p>');
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    // Menampilkan pesan kesalahan jika terjadi kesalahan dalam melakukan permintaan ke server
                    $('#time-info').html('<p>Terjadi kesalahan: ' + textStatus + '</p>');
                });
        });
    </script>
	
	<br/>
	<br/>
 
	<style>
		.table-center {
		  display: flex;
		  justify-content: center;
		}
	  </style>
	  
	  <div class="table-center">
		<table border="1">
		  <tr>
			<th>Nama</th>
			<th>Jabatan</th>
			<th>Umur</th>
			<th>Alamat</th>
			<th>Opsi</th>
		  </tr>
		  @foreach($pegawai as $p)
		  <tr>
			<td>{{ $p->pegawai_nama }}</td>
			<td>{{ $p->pegawai_jabatan }}</td>
			<td>{{ $p->pegawai_umur }}</td>
			<td>{{ $p->pegawai_alamat }}</td>
			<td>
			  <a href="/pegawai/edit/{{ $p->pegawai_id }}">Edit</a>
			  |
			  <a href="/pegawai/hapus/{{ $p->pegawai_id }}">Hapus</a>
			</td>
		  </tr>
		  @endforeach
		</table>
	  </div>
	  
	</div>
 
 
</body>
</html>