@extends('Layout.template')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Pakaian</h3>
    </div>
    <div class="card-body">

      <table id="gudang" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Kode</th>
          <th>Nama</th>
          <th>Kategori</th>
          <th>Jenis</th>
          <th>Stok</th>
          <th>Satuan</th>
          <th>Harga</th>
          <th>Detail</th>
          <th>Opsi</th>
        </tr>
        </thead>
        <tbody>
            @foreach($gudang as $item)
            <tr>
                <td>{{ $item->kode_brg }}</td>
                <td>{{ $item->nm_brg }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->jenis }}</td>
                <td>{{ $item->ukuran}}</td>
                <td>{{ $item->stok_brg }}</td>
                <td>{{ $item->satuan_brg }}</td>
                <td>{{ $item->harga_brg }}</td>
                <td>{{ $item->detail }}</td>
                <td>
                    <a href="barang/edit/{{$item->id}}"><i class="fa fa-edit"></i> </a>
					<a href="barang/delete/{{$item->id}}"><i class="fa fa-trash"></i> </a>
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

<div class="modal modalBarang" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Kelola Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="modal-body">
                <div class="row py-2 px-4">
                    <form accept-charset="utf-8"  id="formBarang" method="post" enctype="multipart/form-data" >
                        <div class="row">
                            <input type="hidden" name="id" id="idUser"/>
                            <div class="form-group col-6">
                                <label for="">Kode</label>
                                <input type="text" name="kode_brg" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kategori</label>
                                <select name="kat_brg" id="" class="form-control">
                                    <option>Pilih Kategori</option>
                                    {{-- @foreach ($kat_brg as $items)
                                    <option value="{{$items->id}}">{{$items->nama}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Jenis</label>
                                <select name="jenis_brg" id="" class="form-control">
                                    <option>Pilih Jenis</option>
                                    {{-- @foreach ($jenis as $item)
                                    <option value="{{$items->id}}">{{$items->nama}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Ukuran</label>
                                <input type="text" name="stok_brg" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Stok</label>
                                <input type="text" name="stok_brg" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Satuan</label>
                                <input type="text" name="satuan_brg" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Harga</label>
                                <input type="text" name="hrg_brg" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Detail</label>
                                <input type="textArea" name="detail" class="form-control">
                            </div>

                        </div>
                    </form>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

@endsection
@section('js')
<script>
    $('#modalBarang').click(function () {
        $('.modalBarang').modal('show')
    })
</script>
@endsection
