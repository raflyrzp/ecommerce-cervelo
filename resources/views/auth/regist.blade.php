<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="bg-primary">

    <section class="" style="background-color: #616a9a;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            {{-- <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('pembeli/assets/images/bg-login.jpg') }}" alt="login form"
                                    class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div> --}}
                            <div class="col-12 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="post">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">CERVELO</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ayo registrasi!!!
                                        </h5>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-outline mb-4">
                                                    <input type="text" id="fullname"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" name="fullname"
                                                        value="{{ old('fullname') }}" for="fullname">Nama
                                                        Lengkap</label>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <input type="text" id="username"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" name="username"
                                                        value="{{ old('username') }}" for="username">Username</label>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <input type="email" id="email"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" name="email" value="{{ old('email') }}"
                                                        for="email">Email</label>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-outline mb-4">
                                                            <input type="password" id="password"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label" name="password"
                                                                for="password">Password</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-outline mb-4">
                                                            <input type="password" id="confirm_password"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label" name="confirm_password"
                                                                for="password">Confirm Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-outline mb-4">
                                                    <textarea class="form-control" name="alamat" id="alamat"></textarea>
                                                    <label class="form-label" name="alamat" value="{{ old('alamat') }}"
                                                        for="alamat">Alamat</label>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-outline mb-4">
                                                            <input type="text" id="provinsi"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label" name="provinsi"
                                                                value="{{ old('provinsi') }}"
                                                                for="provinsi">Province</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-outline mb-4">
                                                            <input type="text" id="kota"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label" name="kota"
                                                                value="{{ old('kota') }}" for="kota">City</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-outline mb-4">
                                                            <input type="text" id="kode_pos"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label" name="kode_pos"
                                                                value="{{ old('kode_pos') }}"
                                                                for="kode_pos">Postcode</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-outline mb-4">
                                                            <input type="text" id="telp"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label" name="telp"
                                                                value="{{ old('telp') }}"
                                                                for="telp">Phone</label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-outline mb-4">
                                                    <input type="text" id="rekening"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" name="rekening"
                                                        value="{{ old('rekening') }}" for="rekening">No.
                                                        Rekening</label>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block"
                                                type="submit">Registrasi</button>
                                        </div>

                                        {{-- <a class="small text-muted" href="#!">Forgot password?</a> --}}
                                        <p class=" pb-lg-2" style="color: #393f81;">Sudah punya akun? <a
                                                href="{{ route('login') }}" style="color: #393f81;">Login disini</a>
                                        </p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
