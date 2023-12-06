@extends('admin/layout/main')

@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Administrator</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Data Administrator</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Main row -->
                <div class="row">
                    <div class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Data Administrator</h3>
                            <a href="" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#tambahModal"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>No. Telepon</th>
                                        <th>No. Rekening</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_admin as $i => $admin)
                                        <tr>
                                            <td class="col-1">{{ $i + 1 }}</td>
                                            <td>{{ $admin->fullname }}</td>
                                            <td>{{ $admin->username }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->telp }}</td>
                                            <td>{{ $admin->rekening }}</td>
                                            <td>{{ $admin->alamat }}</td>
                                            <td style="width: 6em;">
                                                <a href="" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#editModal{{ $admin->id }}"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.destroy', $admin->id) }}" method="post"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Anda yakin ingin menghapus admin ini?')">
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
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    @foreach ($data_admin as $admin)
        <div class="modal fade" id="editModal{{ $admin->id }}">
            <div class="modal-dialog modal-lg">

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.update', $admin->id) }}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="fullname" class="col-form-label">Fullname :</label>
                                <input type="text" name="fullname" class="form-control" id="fullname"
                                    value="{{ $admin->fullname }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="col-form-label">Username :</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    value="{{ $admin->username }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="col-form-label">Email :</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ $admin->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="col-form-label">Role :</label>
                                <input type="text" name="role" class="form-control" id="role"
                                    value="{{ $admin->role }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="telp" class="col-form-label">Telepon :</label>
                                <input type="text" name="telp" class="form-control" id="telp"
                                    value="{{ $admin->telp }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="rekening" class="col-form-label">Rekening :</label>
                                <input type="text" name="rekening" class="form-control" id="rekening"
                                    value="{{ $admin->rekening }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="provinsi" class="col-form-label">Provinsi :</label>
                                <input type="text" name="provinsi" class="form-control" id="provinsi"
                                    value="{{ $admin->provinsi }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="kota" class="col-form-label">Kota :</label>
                                <input type="text" name="kota" class="form-control" id="kota"
                                    value="{{ $admin->kota }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="kode_pos" class="col-form-label">Kode Pos :</label>
                                <input type="text" name="kode_pos" class="form-control" id="kode_pos"
                                    value="{{ $admin->kode_pos }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="col-form-label">Alamat :</label>
                                <textarea class="form-control" name="alamat" rows="5" id="alamat" required>{{ $admin->alamat }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="col-form-label">Password :</label>
                                <input type="password" name="password" class="form-control" id="password">
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
                    <form action="{{ route('user.store', 'admin') }}" method="post">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="fullname" class="col-form-label">Fullname :</label>
                                <input type="text" name="fullname" class="form-control" id="fullname" required>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="col-form-label">Username :</label>
                                <input type="text" name="username" class="form-control" id="username" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="col-form-label">Email :</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="col-form-label">Role :</label>
                                <input type="text" name="role" class="form-control" id="role" value="admin"
                                    readonly>
                            </div>

                            <div class="mb-3">
                                <label for="telp" class="col-form-label">Telepon :</label>
                                <input type="text" name="telp" class="form-control" id="telp" required>
                            </div>

                            <div class="mb-3">
                                <label for="rekening" class="col-form-label">Rekening :</label>
                                <input type="text" name="rekening" class="form-control" id="rekening" required>
                            </div>

                            <div class="mb-3">
                                <label for="provinsi" class="col-form-label">Provinsi :</label>
                                <input type="text" name="provinsi" class="form-control" id="provinsi" required>
                            </div>

                            <div class="mb-3">
                                <label for="kota" class="col-form-label">Kota :</label>
                                <input type="text" name="kota" class="form-control" id="kota" required>
                            </div>

                            <div class="mb-3">
                                <label for="kode_pos" class="col-form-label">Kode Pos :</label>
                                <input type="text" name="kode_pos" class="form-control" id="kode_pos" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="col-form-label">Alamat :</label>
                                <textarea class="form-control" name="alamat" rows="5" id="alamat" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="col-form-label">Password :</label>
                                <input type="password" name="password" class="form-control" id="password" required>
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
