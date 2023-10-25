<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guest Book</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    {{-- @vite('resources/css/app.css') --}}
</head>

<body>
    <section class="container border shadow-lg">
        <div class="row">
            <div class="col-md-6 p-0">
                <div class="card text-white rounded-0">
                    <img src="../assets/wallpaper01.jpeg" class="card-img rounded-0 opacity-50" alt="Background Buku Tamu Digital" style="height: 100vh; transform: scaleX(-1)">
                    <div class="card-img-overlay" style="color: #B2533E; margin-top: 150px">
                        <p class="fw-bold mb-0 lh-1" style="font-size: 50px">Aplikasi</p>
                        <p class="fw-bold mb-0 lh-1" style="font-size: 80px">Buku Tamu</p>
                        <p class="text-black">Memudahkan pengelolaan daftar tamu seperti :<br> <span class="fw-bold">Download Laporan, Grafik Bulanan, Detail jumlah pengunjung, Terhubungan dengan Whatsapp</span></p>
                        <h3 class="pt-5 fw-bold position-absolute bottom-0 start-25">KOTABARU GO SMART CITY</h3>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <input type="submit" value="Logout" class="btn btn-outline-light btn-sm mt-5 position-absolute bottom-0 mb-2" style="right: 10px">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 p-3">
                <h2 class="text-uppercase fw-bold">Data Tamu</h2>
                <p class="text-secondary">Tidak perlu buru - buru, silahkan ketik data tamu dengan benar dan lengkap</p>
                <form class="pt-3" action="/guest" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="full_name" class="form-control form-control-lg rounded-0 border-secondary" id="full_name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp" class="form-label">Nomor Whatsapp</label>
                        <input type="text" name="phone" class="form-control form-control-lg rounded-0 border-secondary" id="whatsapp">
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Instansi atau Perusahaan</label>
                        <input type="text" name="company" class="form-control form-control-lg rounded-0 border-secondary" id="company">
                    </div>
                    <button type="submit" class="btn btn-lg btn-success float-end">Simpan</button>
                </form>
                <button class="btn btn-lg btn-danger float-end position-absolute bottom-0"><a href="/"><font color="white">back</font></a></button>
            </div>
        </div>
    </section>

    @if (isset($modalTitle) && isset($modalBody))
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">{{ $modalTitle }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ $modalBody }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#successModal').modal('show');
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>