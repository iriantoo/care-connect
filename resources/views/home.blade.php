@extends('layouts.app')

@section('content')
<section class="home py-5">
    <div class="row" style="margin-bottom: 8rem">
        <div class="col-7 d-flex flex-column justify-content-center">
            <div class="row mb-5">
                <div class="col text-center">
                    <h1 class="fw-bold" style="font-size: 3rem">Lawan Pelecehan Seksual</h1>
                    <h1 class="fw-bold" style="font-size: 3rem">Dengan Care Connect</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <h5 class="text-center">Laporkan Insiden dengan Aman, Rahasia</h5>
                <h5 class="text-center mb-3">dan Dapatkan Dukungan yang Anda Butuhkan</h5>
                <div class="col-3">
                    <a href="#" class="btn btn-dark">Lihat Laporan</a>
                </div>
                <div class="col-3">
                    <a href="#" class="btn btn-dark">Daftar & Laporkan</a>
                </div>
            </div>
        </div>
        <div class="col">
            <img src="{{ asset('img/logo.png') }}" alt="">
        </div>
    </div>
</section>
<section class="about bg-light p-4 mb-5" id="about">
    <div class="row mb-5">
        <div class="col text-center">
            <h1 class="fw-bolder">Tentang Kami</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card" style="height: 472px">
                <div class="card-header text-center">
                    <h1>Misi</h1>
                </div>
                <div class="card-body d-flex align-items-center">
                    <p>Care Connect didirikan dengan tujuan untuk memberdayakan korban pelecehan seksual dengan menyediakan alat dan sumber daya yang mereka butuhkan untuk melaporkan insiden dan mendapatkan dukungan. Kami percaya bahwa setiap orang berhak atas rasa aman dan dihormati, dan kami bekerja tanpa henti untuk memastikan hal tersebut tercapai.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Visi</h1>
                </div>
                <div class="card-body">
                    <p>Visi kami adalah menciptakan tempat yang mana semua individu dapat hidup dan bekerja di lingkungan yang bebas dari ancaman dan intimidasi pelecehan seksual. Komitmen kami meliputi:</p>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Memberikan Dukungan Tanpa Syarat</div>
                                <p>Menyediakan layanan yang empatik dan non-diskriminatif kepada semua korban.</p>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Meningkatkan Kesadaran</div>
                                <p>Mendidik masyarakat tentang pelecehan seksual dan pentingnya pelaporan.</p>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Menciptakan Perubahan Sistemik</div>
                                <p>Bekerja sama dengan organisasi dan lembaga untuk memperbaiki kebijakan dan prosedur penanganan pelecehan seksual.</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
