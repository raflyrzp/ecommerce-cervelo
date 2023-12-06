@extends('admin/layout/main')

@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Produk</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Data Produk</li>
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
                                <h3 class="card-title">Tabel Data Produk</h3>
                                <a href="" class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#tambahModal"><i class="fas fa-plus"></i>
                                    Tambah</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_produk as $i => $produk)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td><img src="{{ asset('storage/produk/' . $produk->image) }}"
                                                        alt="" width="100px"></td>
                                                <td>{{ $produk->nama_produk }}</td>
                                                <td>IDR. {{ number_format($produk->harga_produk,0,',','.') }},00</td>
                                                <td>{{ $produk->stok }}</td>
                                                <td>{{ $produk->satuan }}</td>
                                                <td>{{ $produk->deskripsi }}</td>
                                                <td style="width: 6em;">
                                                    <a href="" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#editModal{{ $produk->id }}"><i
                                                            class="fas fa-edit"></i></a>
                                                    <form action="{{ route('produk.destroy', $produk->id) }}" method="post"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Anda yakin ingin menghapus produk ini?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>

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

    @foreach ($data_produk as $produk)
        <div class="modal fade" id="editModal{{ $produk->id }}">
            <div class="modal-dialog modal-lg">

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('produk.update', $produk->id) }}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_produk" class="col-form-label">Nama Produk :</label>
                                <input type="text" name="nama_produk" class="form-control" id="nama_produk"
                                    value="{{ $produk->nama_produk }}">
                            </div>

                            <div class="mb-3">
                                <label for="harga_produk" class="col-form-label">Harga Produk :</label>
                                <input type="text" name="harga_produk" class="form-control" id="harga_produk"
                                    value="{{ $produk->harga_produk }}">
                            </div>

                            <div class="mb-3">
                                <label for="stok" class="col-form-label">Stok :</label>
                                <input type="number" name="stok" class="form-control" id="stok"
                                    value="{{ $produk->stok }}">
                            </div>

                            <div class="mb-3">
                                <label for="satuan" class="col-form-label">Satuan :</label>
                                <input type="text" name="satuan" class="form-control" id="satuan"
                                    value="{{ $produk->satuan }}">
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="col-form-label">Deskripsi :</label>
                                <textarea class="form-control" name="deskripsi" rows="5" id="deskripsi">{{ $produk->deskripsi }}</textarea>
                            </div>

                            <label class="col-form-label">Image :</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="exampleInputFile" />
                                <label class="custom-file-label" for="exampleInputFile">Unggah foto</label>
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



        <div class="modal fade" id="tambahModal">
            <div class="modal-dialog modal-lg">

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_produk" class="col-form-label">Nama Produk :</label>
                                <input type="text" name="nama_produk" class="form-control" id="nama_produk">
                            </div>

                            <div class="mb-3">
                                <label for="harga_produk" class="col-form-label">Harga Produk :</label>
                                <input type="text" name="harga_produk" class="form-control" id="harga_produk">
                            </div>

                            <div class="mb-3">
                                <label for="stok" class="col-form-label">Stok :</label>
                                <input type="number" name="stok" class="form-control" id="stok">
                            </div>

                            <div class="mb-3">
                                <label for="satuan" class="col-form-label">Satuan :</label>
                                <input type="text" name="satuan" class="form-control" id="satuan">
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="col-form-label">Deskripsi :</label>
                                <textarea class="form-control" name="deskripsi" rows="5" id="deskripsi"></textarea>
                            </div>

                            <label class="col-form-label">Image :</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="exampleInputFile" />
                                <label class="custom-file-label" for="exampleInputFile">Unggah foto</label>
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
