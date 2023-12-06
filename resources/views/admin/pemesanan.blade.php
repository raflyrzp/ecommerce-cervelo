@extends('admin/layout/main')

@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Pemesanan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Data Pemesanan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Data Pemesanan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Pembeli</th>
                                            <th>Nama Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Qty</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Total Harga</th>
                                            <th>Telp</th>
                                            <th>Email</th>
                                            <th>Provinsi</th>
                                            <th>Kota</th>
                                            <th>Alamat</th>
                                            <th>Kode Pos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_pemesanan as $i => $pemesanan)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td><img src="{{ asset('storage/produk/' . $pemesanan->produk->image) }}"
                                                        alt="" width="100px"></td>
                                                <td>{{ $pemesanan->pembeli->fullname }}</td>
                                                <td>{{ $pemesanan->produk->nama_produk }}</td>
                                                <td>IDR. {{ number_format($pemesanan->produk->harga_produk,0,',','.') }},00</td>
                                                <td>{{ $pemesanan->jumlah_produk }}</td>
                                                <td>{{ $pemesanan->tgl_pemesanan }}</td>
                                                <td> <a href=""
                                                    class="btn
                                                    @if ($pemesanan->status === 'dibayar') btn-default
                                                    @elseif($pemesanan->status === 'dikirim') btn-info
                                                    @elseif($pemesanan->status === 'pending') btn-danger
                                                    @elseif($pemesanan->status === 'diterima') btn-success @endif"
                                                    data-toggle="modal"
                                                    data-target="#editModal{{ $pemesanan->id }}">{{ $pemesanan->status }}</a>
                                                </td>
                                                <td>IDR. {{ number_format($pemesanan->total_harga,0,',','.') }},00</td>
                                                <td>{{ $pemesanan->telp }}</td>
                                                <td>{{ $pemesanan->email }}</td>
                                                <td>{{ $pemesanan->provinsi }}</td>
                                                <td>{{ $pemesanan->kota }}</td>
                                                <td>{{ $pemesanan->alamat }}</td>
                                                <td>{{ $pemesanan->kode_pos }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    @foreach ($data_pemesanan as $pemesanan)
        <div class="modal fade" id="editModal{{ $pemesanan->id }}">
            <div class="modal-dialog modal-lg">

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('pemesanan.update', $pemesanan->id) }}" method="post">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_produk" value="{{ $pemesanan->id_produk }}">
                            <input type="hidden" name="id_pembeli" value="{{ $pemesanan->id_pembeli }}">
                            <input type="hidden" name="tgl_pemesanan" value="{{ $pemesanan->tgl_pemesanan }}">
                            <input type="hidden" name="total_harga" value="{{ $pemesanan->total_harga }}">
                            <input type="hidden" name="jumlah_produk" value="{{ $pemesanan->jumlah_produk }}">
                            <input type="hidden" name="alamat" value="{{ $pemesanan->alamat }}">
                            <input type="hidden" name="provinsi" value="{{ $pemesanan->provinsi }}">
                            <input type="hidden" name="kota" value="{{ $pemesanan->kota }}">
                            <input type="hidden" name="kode_pos" value="{{ $pemesanan->kode_pos }}">
                            <input type="hidden" name="telp" value="{{ $pemesanan->telp }}">
                            <input type="hidden" name="email" value="{{ $pemesanan->email }}">
                            <input type="hidden" name="id_pengiriman" value="{{ $pemesanan->id_pengiriman }}">
                            <div class="mb-3">
                                <label for="status" class="col-form-label">Status :</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="pending" {{ $pemesanan->status === 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="dibayar" {{ $pemesanan->status === 'dibayar' ? 'selected' : '' }}>
                                        Dibayar</option>
                                    <option value="dikirim" {{ $pemesanan->status === 'dikirim' ? 'selected' : '' }}>
                                        Dikirim</option>
                                    <option value="diterima" {{ $pemesanan->status === 'diterima' ? 'selected' : '' }}>
                                        Diterima</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    @endforeach
@endsection
