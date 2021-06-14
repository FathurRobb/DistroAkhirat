@extends('Gudang_Layout.template')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Pakaian</h3>
    </div>
    <div class="table-responsive">

      <table id="gudang" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Kode</th>
          <th>Nama</th>
          <th>Warna</th>
          <th>Jenis</th>
          <th>Ukuran</th>
          <th>Stok</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
          <th>Detail</th>
          <th>Opsi</th>
        </tr>
        </thead>
        <tbody>
            @foreach($gudang as $item)
            <tr>
                <td>{{ $item->kode_brg }}</td>
                <td>{{ $item->nm_brg }}</td>
                <td>{{ $item->warna }}</td>
                <td>{{ $item->jenis }}</td>
                <td>{{ $item->ukuran }}</td>
                <td>{{ $item->stok_brg }}</td>
                <td>{{ $item->hrg_beli }}</td>
                <td>{{ $item->hrg_jual }}</td>
                <td>{{ $item->detail }}</td>
                <td>
                    <button class="btn btn-sm btn-warning" onclick="updateBarang(`{{ $item->id}}`)">Ubah</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteBarang(`{{ $item->id}}`)">Hapus</button>
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
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="idbrg"/>
                            <div class="form-group col-12">
                                <label for="">Kode</label>
                                <input type="text" name="kode_brg" class="form-control" required="required">
                            </div>
                            <div class="form-group col-12">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control"required="required">
                            </div>
                            <div class="form-group col-12">
                                <label for="">Warna</label>
                                <input type="text" name="warna" class="form-control" required="required">
                            </div>
                            <div class="form-group col-12">
                                <label for="">Jenis</label>
                                <select name="jenis_brg" id="" class="form-control" required="required">
                                    <option>Pilih Jenis</option>
                                    @foreach ($jenis as $item)
                                    <option value="{{$item->nm_jns}}"{{$item->id}}>{{$item->nm_jns}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Ukuran</label>
                                <input type="text" name="ukuran" class="form-control" required="required">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Stok</label>
                                <input type="text" name="stok_brg" class="form-control" required="required">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Harga beli</label>
                                <input type="text" name="hrg_beli" class="form-control" required="required">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Harga Jual</label>
                                <input type="text" name="hrg_jual" class="form-control" required="required">
                            </div>
                            <div class="form-group col-12">
                                <label for="">Detail</label>
                                <input type="textArea" name="detail" class="form-control" required="required">
                            </div>

                        </div>
                    </form>
                </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="saveBarang">Simpan</button>
          <button type="submit" class="btn btn-success" id="updateBarang">Ubah</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

@endsection
@section('js')
<script>

    let idBrg;

    // $(document).ready(function(){
    //     $('[name=kode_brg]').mask('BR0000');
    // })

    $("#modalBarang").click(function() {
        $(".modal-title").html(`Tambah Barang`);
        $("#saveBarang").show();
        $("#updateBarang").hide();
        $(".modalBarang").modal("show");

        // $.ajax({
        //     url: "/readBrgbyId",
        //     type: "post",
        //     data: {"id" : id},
        //     success: function(response){
        //         $("name=kode_brg").val(response.kode_brg)
        //     },
        //     error: function(jqXHR, textStatus, errorThrown) {
        //         console.log(textStatus, errorThrown);
        //     }
        // });
    })

    $("#saveBarang").click(function(){
        let data = $("#formBarang").serialize();
        console.log(data);
        $.ajax({
                    url: "/gudang/store",
                    type: "post",
                    data: data,
                    success: function(response, status) {
                        location.reload();

            },error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }

        });
    })

    $("#updateBarang").click(function(){

        let data = {
            "id": idBrg,
            "kode_brg": $("[name=kode_brg]").val(),
            "nm_brg": $("[name=nama]").val(),
            "warna": $("[name=warna]").val(),
            "jenis": $("[name=jenis]").val(),
            "ukuran": $("[name=ukuran]").val(),
            "stok_brg": $("[name=stok]").val(),
            "hrg_beli": $("[name=hrg_beli]").val(),
            "hrg_jual": $("[name=hrg_jual]").val(),
            "detail": $("[name=detail]").val(),
        };
        console.log(data);

        $.ajax({
                        url: "/gudang/update",
                        type: "post",
                        data: {

            },
            success: function(response, status) {

            },
        });
    })

    function deleteBarang(id){
        $.ajax({
            url: "/gudang/delete",
            type: "post",
            data: {
                "id": id
            },
            success: function(response, status) {

            },

        });
    }

    function updateBarang(id){
        $.ajax({
            url: "/gudang/edit",
            type: "post",
            data: {
                "id": id
            },
            success: function(response) {
                $("[name=kode_brg]").val(response.kode_brg)
                $("[name=nama]").val(response.nm_brg)
                $("[name=warna]").val(response.warna)
                $("[name=jenis]").val(response.jenis)
                $("[name=ukuran]").val(response.ukuran)
                $("[name=stok_brg]").val(response.stok)
                $("[name=hrg_beli]").val(response.hrg_beli)
                $("[name=hrg_jual]").val(response.harga_jual)
                $("[name=detail]").val(response.detail)


            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);

            }
        })
    }

    idBrg = id;
        $("#saveBarang").hide();
        $("#updateBarang").show();
        $(".modal-title").html(`Ubah Data`);
        $(".modalBarang").modal("show");



</script>
@endsection
