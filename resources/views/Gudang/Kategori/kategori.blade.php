@extends('Layout.template')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Kategori</h3>
    </div>
    <div class="card-body">

      <table id="kategori" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Kode</th>
          <th>Nama Kategori</th>
          <th>Detail</th>
          <th>Opsi</th>
        </tr>
        </thead>
        <tbody>
            @foreach($kat as $item)
            <tr>
                <td>{{ $item->kode_kat }}</td>
                <td>{{ $item->nm_kat }}</td>
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
