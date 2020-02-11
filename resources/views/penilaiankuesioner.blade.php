<!DOCTYPE html>
<html>
<head>
<!-- <link href="{{url('https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css')}}" rel="stylesheet"/> -->
<!-- <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js')}}"></script>
<script>
$(function () {
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
            });
        });
</script> -->
</head>
<body>
<meta name="csrf-token" content="{{ csrf_token() }}">
<h2>Kategori Penilaian Kuesioner</h2>

@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
<form action="{{route('daily_report.store')}}" method="POST">
@csrf
  Hari, Tanggal:<br>
  <input class="datepicker" type="date" name="tgl_report">
  <br><br>
  Jam Kerja:<br>
  <select name="jam_kerja">
  <option value="harian" selected="selected">Harian</option>
  <option value="lembur">Lembur</option>
</select>
  <br><br>
  List Kerja Harian/Lembur:<br>
  <textarea rows="15" cols="60" style="text-transform:capitalize" type="text" name="list_kerja"></textarea>
  <br><br>
  Dokumentasi:<br>
  <input type="file" name="foto" id="foto">
  <input style="text-transform:capitalize" type="text" name="ket_foto">
  <br><br>
  <button type="submit" value="Submit">SIMPAN</button>
</form> 

<table style="width:100%">
  <tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Jam Kerja</th>
    <th>Deskripsi Kerja</th>
    <th>Foto</th>
    <th>Keterangan Foto</th>
    <th>Aksi</th>
  </tr>
  @foreach($tabel as $isi)
  <tr>
    <td>{{$isi->id_dokumentasi}}</td>
    <td>{{$isi->tgl_report}}</td>
    <td>{{$isi->jam_kerja}}</td>
    <td>{{$isi->list_kerja}}</td>
    <td>{{$isi->foto}}</td>
    <td>{{$isi->ket_foto}}</td>
    <td><form action="daily_report/{{$isi->id_dokumentasi}}/delete" method="post">
                {{csrf_field()}}
                {{method_field('delete')}}
                <input type="submit" value="delete"></form>
    <a href="{{route('daily_report.edit',$isi->id_dokumentasi)}}"> edit </a>
                </td>           
  </tr>
  @endforeach 
</table>

</body>
</html>