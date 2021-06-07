@extends('Layout.template')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Supplier</h3>
    </div>
    <div class="card-body">

      <table id="gudang" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Kode</th>
          <th>Nama Supplier</th>
          <th>No Telp</th>
          <th>Alamat</th>
          <th>Opsi</th>
        </tr>
        </thead>
        <tbody>
            @foreach($supplier as $item)
            <tr>
                <td>{{ $item->kode_sp }}</td>
                <td>{{ $item->nm_sp }}</td>
                <td>{{ $item->notlp_sp }}</td>
                <td>{{ $item->alamat_sp }}</td>
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
      $("#gudang").DataTable({
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
