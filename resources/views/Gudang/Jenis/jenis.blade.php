@extends('Layout.template')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Jenis</h3>
    </div>
    <div class="card-body">

      <table id="jenis" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Kode</th>
          <th>Nama Jenis</th>
          <th>Detail</th>
          <th>Opsi</th>
        </tr>
        </thead>
        <tbody>
            @foreach($jenis as $item)
            <tr>
                <td>{{ $item->kode_jns }}</td>
                <td>{{ $item->nm_jns }}</td>
                <td>{{ $item->detail }}</td>
                <td>
                    <button class="btn btn-sm btn-warning" onclick="">Ubah</button>
                    <button class="btn btn-sm btn-danger" onclick="">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-end py-3 px-3">
        <button class="btn btn-success" id="modalBarang">Tambah</button>
    </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
