@extends('mimin.base')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Permohonan Kecamatan
                        {{ $kecamatan->kecamatan_nama }}</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">

            <div class="col-xl-3 col-xxl-3 col-lg-3 col-sm-3">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-primary text-primary">
                                <!-- <i class="ti-user"></i> -->
                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Target Layanan</p>
                                <h4 class="mb-0">{{ $kecamatan->kecamatan_target }} Layanan</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-6 col-xxl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-success">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="me-3">
                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                            <div class="media-body text-white text-end">
                                <p class="mb-1">Target Pendapatan</p>
                                <h3 class="text-white">Rp. {{ number_format($kecamatan->kecamatan_target_pendapatan) }},-
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-lg-3 col-sm-3">
                <div class="widget-stat card bg-danger">
                    <div class="card-body  p-4">
                        <div class="media">
                            <span class="me-3">
                                <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                                    <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                    <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                    <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                </svg>
                            </span>
                            <div class="media-body text-white text-end">
                                <p class="mb-1">Permohonan</p>
                                <h3 class="text-white">{{ $permohonan_count }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Pemohon Kecamatan Delta Pawan</h4>
                        @if ($permohonan_count >= $kecamatan->kecamatan_target)
                            <a href="{{ url('mimin/permohonan-proses', $kecamatan->kecamatan_id) }}">
                                <button type="button" class="btn light btn-primary btn-xs">Proses Permohonan</button>
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table-datatable" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>No. Telp</th>
                                        <th>Alamat</th>
                                        <th>Nopol</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($list_permohonan as $item)
                                        <tr>
                                            <td>{{ $item->daftar_nama }}</td>
                                            <td>{{ $item->daftar_nik }}</td>
                                            <td>{{ $item->daftar_wa }}</td>
                                            <td>{{ $item->daftar_alamat }}</td>
                                            <td>
                                                @foreach ($item->nopol as $nopol)
                                                    <a href="javascript:void(0)"
                                                        class="badge badge-rounded badge-secondary">KB
                                                        {{ $nopol->nopol_tengah }} <span
                                                            class="text-uppercase">{{ $nopol->nopol_belakang }}</span></a>
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fas fa-pencil-alt" data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $item->daftar_id }}"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>No. Telp</th>
                                        <th>Alamat</th>
                                        <th>Nopol</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @foreach ($list_permohonan as $item)
        <div class="modal fade" id="editModal{{ $item->daftar_id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <form action="{{ url('mimin/permohonan-edit', $item->daftar_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputAddress">Nama</label>
                                <input type="text" class="form-control" id="inputAddress" name="daftar_nama" value="{{$item->daftar_nama}}">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">NIK</label>
                                <input type="text" class="form-control" id="inputAddress2" name="daftar_nik" value="{{$item->daftar_nik}}">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Nomor Telepon</label>
                                <input type="text" class="form-control" id="inputAddress" name="daftar_wa" value="{{$item->daftar_wa}}">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Alamat</label>
                                <input type="text" class="form-control" id="inputAddress2" name="daftar_alamat" value="{{$item->daftar_alamat}}">
                            </div>
                            <div class="form-group">
                                <label for="inputState">Kecamatan</label>
                                <select id="inputState" class="form-control" onchange="gantiKecamatanMimin(this.value)">
                                    <option value="{{$item->daftar_id}}" selected>{{$item->kecamatan->kecamatan_nama}}</option>
                                    @foreach ($kecamatanlist as $kecamatan)
                                        <option value="{{ $kecamatan->kecamatan_id }}">{{ $kecamatan->kecamatan_nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <select id="lokasi" class="form-control">
                                    <option value="{{$item->daftar_lokasi}}" selected>{{$item->lokasi->lokasi_nama}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function gantiKecamatanMimin(kecamatan_id) {
            // Inisialisasi variabel option
            var option = '';

            // Kirim permintaan GET menggunakan jQuery
            $.get("api/lokasi_mimin/" + kecamatan_id, function(result) {
                // Parse hasil JSON
                result = JSON.parse(result);

                // Loop melalui hasil dan buat opsi untuk setiap lokasi
                for (var i = 0; i < result.length; i++) {
                    option += '<option value="' + result[i].lokasi_id + '">' + result[i].lokasi_nama + '</option>';
                }

                // Setel HTML dari elemen dengan ID "lokasi" dengan opsi yang dibuat
                $("#lokasi").html(option);
            });
        }
    </script>
@endsection
