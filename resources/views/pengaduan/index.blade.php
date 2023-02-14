@extends('master')



@section('content')
<H1>DATA</H1>
<div class="card">
    <table id="example2" class="table table-bordered table-hover" class="datatable" style="width: 100%" id="table1">
        <thead>
          <tr>  
            <th>No</th>
            <th>Tanggal Pengaduan</th>
            <th>Isi Laporan</th>
            <th>Foto</th>
            <th>Status</th>
            <th>Action</th> 
          </tr>
        </thead>
        <tbody>
          <tr>
            @forelse ($pengaduans as $pengaduan)
            <tr>
              <td>{{ $loop -> iteration }}</td>
              <td>{{ $pengaduan -> tgl_pengaduan }}</td>
              <td>{{ $pengaduan -> isi_laporan }}</td>
              <td>{{ $pengaduan -> Foto }}</td>
              <td>{{ $pengaduan -> status }}</td>
              <td>{{ $pengaduan -> action }}</td>
              <td>
                @if (auth()->user()->level === 'petugas')
                <div class="d-flex flex-nowrap flex-column flex-md-row justify-center">
                  <form action="/pengaduan/{{ $pengaduan->id }}" method="POST">
                    <a class="btn btn-info mr3" href="/pengaduan{{ $pengaduan->id }}">Detail</a>
                    <a class="btn btn-warning mr3" href="/pengaduan{{ $pengaduan->id }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete" >
                  </form>
                </div>
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="5" style="text-align: center" class="text-danger"> <strong>DATA PENGADUAN KOSONG</strong> </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
  
@endsection
<!-- 
@push('scripts')
<script src="{{ asset ('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset ('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
$(function () {
    $('#data-table').DataTable();
});
<script>
    $(function () {
      $("#example2").DataTable();
    });
  </script>
@endpush -->