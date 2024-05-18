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
    <section class="container">
        <div class="row">
            <div class="p-3">
                <img src="../assets/Profile-Gekrafs.webp" alt="banner-gekrafs" class="img-fluid rounded-4">
                <div class="card mt-3 p-3 bg-light">
                    <h2 class="text-uppercase fw-bold">Data Tamu</h2>
                    <p class="text-secondary">Tidak perlu buru - buru, silahkan ketik data pian dengan benar dan lengkap</p>
                    <form class="pt-3" action="/simpan" method="POST">
                        @csrf
                        {{-- @method('post') --}}
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Nama Lengkap</label>
                            <input type="text" name="full_name" class="form-control form-control-lg rounded-0 border-0 border-bottom bg-light border-secondary" id="full_name" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="whatsapp" class="form-label">Nomor Whatsapp</label>
                            <input type="text" name="phone" class="form-control form-control-lg rounded-0 border-0 border-bottom bg-light border-secondary" id="whatsapp">
                        </div>
                        {{-- <div class="mb-3">
                            <label for="company" class="form-label">Instansi atau Perusahaan</label>
                            <input type="text" name="company" class="form-control form-control-lg rounded-0 border-secondary" id="company">
                        </div> --}}
                        <button type="submit" class="btn btn-lg btn-success float-end">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @if (isset($modalTitle) && isset($modalBody) && isset($date))
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">{{ $modalTitle }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="javascript:window.location='/daftar'"></button>
                    </div>
                    <div class="modal-body">
                        {{ $modalBody }}
                        <br><br>
                        Silahkan mengikuti undian berhadiah di boot Gekrafs Kotabaru dengan batas waktu {{ $date }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="javascript:window.location='/daftar'">Close</button>
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