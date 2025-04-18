@extends('layoutbootstrap')

@section('konten')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Toko</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12 col-sm-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Toko</h6>
                    
                    <!-- Tombol Tambah Data -->
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data</span>
                    </a>
                    <!-- Akghir Tombol Tambah Data -->

                </div>
                <!-- Card Body -->
                <div class="card-body">
                        <div class="chart-area" hidden>
                            <canvas id="myAreaChart"></canvas>
                        </div>

                    <!-- Display Error jika ada error -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Akhir Display Error -->

                    

                    <!-- Awal Dari Input Form -->
                    <form action="{{ route('toko.update', $toko->id) }}" method="post">
                        @csrf
                        @method('PUT')
                            <div class="mb-3"><label for="kodetokolabel">Kode Toko</label><input class="form-control form-control-solid" id="kode_toko" name="kode_toko" type="text" placeholder="Contoh: PR-001" value="{{$toko->kode_toko}}" readonly></div>
                            
                            <div class="mb-3"><label for="namatokolabel">Nama Toko</label>
                            <input class="form-control form-control-solid" id="nama_toko" name="nama_toko" type="text" placeholder="Contoh: Toko Mukena Sejuk Menenangkan" value="{{$toko->nama_toko}}">
                            </div>
                            
            
                            <div class="mb-0"><label for="alamattokolabel">Alamat Toko</label>
                                <textarea class="form-control form-control-solid" id="alamat_toko" name="alamat_toko" rows="3" placeholder="Cth: Jl Pelajar Pejuan 45">{{$toko->alamat_toko}}</textarea>
                            </div>
                            <br>
                            <!-- untuk tombol simpan -->
                            
                            <input class="col-sm-1 btn btn-info btn-sm" type="submit" value="Ubah">

                            <!-- untuk tombol batal simpan -->
                            <a class="col-sm-1 btn btn-dark  btn-sm" href="{{ url('/toko') }}" role="button">Batal</a>
                    </form>
                    <!-- Akhir Dari Input Form -->
                </div>
            </div>
        </div>

        
    </div>

    
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection