<!DOCTYPE html>
<html>
<head>
	<title>Cetak Nilai Kelas ( {{$nama_kelas->kelas}} )</title>
</head>
<body>
    <style type="text/css">
    .table1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #f2f5f7;
}

.table1 tr th{
    background: #35A9DB;
    color: #fff;
    font-weight: normal;
}
h2{
    color: grey;
    font-weight: bold;
}
.table1, th, td {
    padding: 8px 20px;
    text-align: center;
}

.table1 tr:hover {
    background-color: #f5f5f5;
}

.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}
		table tr td,
		table tr th{
			font-size: 11pt;
		}
	</style>
	<center>
		<h2>Cetak Nilai Kelas ( {{$nama_kelas->kelas}} )</h2>
    </center>

	<table class='table1'>
		<thead>
            <tr>
                <th>NO</th>
                <th>NAMA MURID</th>
                <th>JUDUL</th>
                <th>NILAI</th>
            </tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
            @foreach ($data as $item)
            <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->nilai}}</td>
                    
            </tr>
            @endforeach
		</tbody>
        
	</table>
 
</body>
</html>