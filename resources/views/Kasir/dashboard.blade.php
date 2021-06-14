<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Kasir</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"><!-- Toastr -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="{{asset('template')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">AIC</span><span class="brand-text font-weight-light">ompany</span>
      </a>

      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/kasir" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="/kasir/history" class="nav-link">History</a>
          </li>
        </ul>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
            <a href="#" data-toggle="modal" data-target="#modal-logout" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><strong>Transaksi</strong>  <small>Penjualan</small></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <a class="card-title float-sm-right" href="#" data-toggle="modal" data-target="#modal-barang"><strong><u> Pilih Barang </u></strong></a>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-sm">
                  <thead>
                    <tr>
                      <th class="text-center" style="width:5%">No</th>
                      <th class="text-center">Kode</th>
                      <th class="text-center">Nama Barang</th>
                      <th class="text-center">Warna</th>
                      <th class="text-center">Ukuran</th>
                      <th class="text-center">Harga</th>
                      <th class="text-center">Qty</th>
                      <th class="text-center">Sub Total</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $no=1
                    @endphp
                    @forelse($cart_data as $index=>$item2)
                    <tr style="text-align:center;">
                      <td>
                        {{$no++}}
                      </td>
                      <td>
                        {{$item2['code']}}
                      </td>
                      <td>
                        {{$item2['name']}} 
                      </td>
                      <td>
                        {{$item2['color']}} 
                      </td>
                      <td>
                        {{$item2['size']}} 
                      </td>
                      <td>
                        Rp.{{ number_format($item2['pricesingle'],2,',','.') }}
                      </td>
                      <td class="font-weight-bold">
                        <form action="{{url('/kasir/decreasecart', $item2['rowId'])}}"method="POST" style='display:inline;'>
                          @csrf
                          <button class="btn btn-sm btn-info" style="display: inline;padding:0.4rem 0.6rem!important">
                          <i class="fas fa-minus"></i></button>
                        </form>
                        <a style="display: inline">{{$item2['qty']}}</a>
                        <form action="{{url('/kasir/increasecart', $item2['rowId'])}}" method="POST" style='display:inline;'>
                          @csrf
                          <button class="btn btn-sm btn-primary"style="display: inline;padding:0.4rem 0.6rem!important">
                          <i class="fas fa-plus"></i></button>
                        </form>
                      </td>
                      <td>Rp. {{ number_format($item2['price'],2,',','.') }}</td>
                      <td>
                        <form action="{{url('/kasir/removeproduct',$item2['rowId'])}}"method="POST">
                          @csrf
                          <a onclick="this.closest('form').submit();return false;">
                          <i class="fas fa-trash" style="color: rgb(134, 134, 134); cursor: pointer;" title="Batalkan Transaksi"></i></a>
                        </form>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="9" class="text-center">Data Kosong</td>
                    </tr>
                    @endforelse
                  </tbody>

                </table>
                <br>
                <hr>
                <table class="table table-sm table-borderless">
                        <tr>
                            <td style="width:760px;" rowspan="4">
                              <form action="{{ url('/kasir/clear') }}" method="POST">
                              @csrf
                              <button class="btn btn-info btn-lg"onclick="return confirm('Apakah anda yakin ingin menghapus semua transaksi ini ?');"
                              type="submit">Clear</button>
                              </form>
                            </td>
                            <th>Total Belanja</th>
                            <th class="text-right">Rp.
                                {{ number_format($data_total['sub_total'],2,',','.') }} </th>
                        </tr>
                        <tr>
                            <th>
                                <form action="{{ url('/kasir') }}" method="get">
                                    PPN 10%
                                    <input type="checkbox" {{ $data_total['tax'] > 0 ? "checked" : ""}} name="tax"
                                        value="true" onclick="this.form.submit()">
                                </form>
                            </th>
                            <th class="text-right">Rp.
                                {{ number_format($data_total['tax'],2,',','.') }}</th>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <th class="text-right font-weight-bold">Rp.
                                {{ number_format($data_total['total'],2,',','.') }}</th>
                        </tr>
                        <tr>
                          <th colspan="2">
                            <button class="btn btn-primary btn-lg btn-block"
                                data-toggle="modal" data-target="#fullHeightModalRight">Bayar</button> 
                          </th>
                        </tr>
                    </table>
                <br>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <!-- Modal Barang -->
      <div class="modal fade" id="modal-barang">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Data Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" style="overflow:scroll;height:440px;">
                      <table class="table table-bordered" style="font-size:11px;" id="mydata">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama</th>
                            <th>Warna</th>
                            <th>Ukuran</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Detail</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($gudang as $k => $item)
                      <tr>
                          <td>{{$k+1}}</td>
                          <td>{{ $item->kode_brg }}</td>
                          <td>{{ $item->nm_brg }}</td>
                          <td>{{ $item->warna }}</td>
                          <td>{{ $item->ukuran}}</td>
                          <td>{{ $item->stok_brg }}</td>
                          <td>@currency( $item->harga_jual_brg )</td>
                          <td>{{ $item->detail }}</td>
                          <td>
                    <form action="{{url('/kasir/addproduct', $item->id)}}" method="POST">
                    @csrf
                              @if($item->stok_brg == 0)                    
                              <button type="submit" class="btn btn-xs btn-info disabled" title="Stok Habis" style="cursor: no-drop">
                              <span class="fa fa-edit"></span> Pilih </button>
                              @else
                              <button type="submit" class="btn btn-xs btn-info "onclick="this.closest('form').submit();return false;">
                              <span class="fa fa-edit"></span> Pilih </button>
                              @endif
                    </form>

                          </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
    </div>
    <!-- /.modal Barang -->
    <!-- Logout Modal-->
    <div class="modal fade" id="modal-logout">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Keluar Aplikasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah anda yakin ingin keluar dari program ini ?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}">Ya</a>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade right" id="fullHeightModalRight" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">

        <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
        <div class="modal-dialog modal-full-height modal-right" role="document">

        <!-- Sorry campur2 bahasa indonesia sama inggris krn kebiasaan make b.inggris eh ternyata buat aplikasi buat indonesia jadi gini deh  -->
            <div class="modal-content">
                <div class="modal-header indigo">
                    <h6 class="modal-title w-100 text-dark" id="myModalLabel">Billing Information</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <th width="60%">Sub Total</th>
                            <th width="40%" class="text-right">Rp.
                                {{ number_format($data_total['sub_total'],2,',','.') }} </th>
                        </tr>
                        @if($data_total['tax'] > 0)
                        <tr>
                            <th>PPN 10%</th>
                            <th class="text-right">Rp.
                                {{ number_format($data_total['tax'],2,',','.') }}</th>
                        </tr>
                        @endif
                    </table>
                    <form action="{{ url('/kasir/bayar') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="oke">Input Nominal</label>
                        <input id="oke" class="form-control" type="number" name="bayar" autofocus />
                    </div>
                    <h3 class="font-weight-bold">Total:</h3>
                    <h1 class="font-weight-bold mb-5">Rp. {{ number_format($data_total['total'],2,',','.') }}</h1>
                    <input id="totalHidden" type="hidden" name="totalHidden" value="{{$data_total['total']}}" />

                    <h3 class="font-weight-bold">Bayar:</h3>
                    <h1 class="font-weight-bold mb-5" id="pembayaran"></h1>

                    <h3 class="font-weight-bold text-primary">Kembalian:</h3>
                    <h1 class="font-weight-bold text-primary" id="kembalian"></h1>
                </div>
                
                <div class="modal-footer justify-content-between"">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="saveButton" disabled onClick="openWindowReload(this)">Simpan Transaksi</button>
                </div>
                </form>
            </div>
        </div>
    </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <div class="text-center">
        <strong>Copyright &copy; AhmadIlhamCompany 2021 </strong>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template')}}/dist/js/demo.js"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset('template')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- Toastr -->
<script src="{{asset('template')}}/plugins/toastr/toastr.min.js"></script>

<script>
  $(function () {
    $('#mydata').DataTable();
  });
</script>

@if(Session::has('error'))
    <script>
        toastr.error(
            'Telah mencapai jumlah maximum Product | Silahkan tambah stock Product terlebih dahulu untuk menambahkan'
        )

    </script>
    @endif

    @if(Session::has('errorTransaksi'))
    <script>
        toastr.error(
            'Transaksi tidak valid | perhatikan jumlah pembayaran | cek jumlah product'
        )

    </script>
    @endif

    @if(Session::has('success'))
    <script>
        toastr.success(
            'Transaksi berhasil | Thank Your from Tahu Coding'
        )

    </script>
    @endif

    <script>
        $(document).ready(function () {
            $('#fullHeightModalRight').on('shown.bs.modal', function () {
                $('#oke').trigger('focus');
            });
        });

        oke.oninput = function () {
            let jumlah = parseInt(document.getElementById('totalHidden').value) ? parseInt(document.getElementById('totalHidden').value) : 0;
            let bayar = parseInt(document.getElementById('oke').value) ? parseInt(document.getElementById('oke').value) : 0;
            let hasil = bayar - jumlah;
            document.getElementById("pembayaran").innerHTML = bayar ? 'Rp ' + rupiah(bayar) + ',00' : 'Rp ' + 0 +
                ',00';
            document.getElementById("kembalian").innerHTML = hasil ? 'Rp ' + rupiah(hasil) + ',00' : 'Rp ' + 0 +
                ',00';

            cek(bayar, jumlah);
            const saveButton = document.getElementById("saveButton");   

            if(jumlah === 0){
                saveButton.disabled = true;
            }

        };

        function cek(bayar, jumlah) {
            const saveButton = document.getElementById("saveButton");   

            if (bayar < jumlah) {
                saveButton.disabled = true;
            } else {
                saveButton.disabled = false;
            }
        }

        function rupiah(bilangan) {
            var number_string = bilangan.toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        }

    </script>

</body>
</html>
