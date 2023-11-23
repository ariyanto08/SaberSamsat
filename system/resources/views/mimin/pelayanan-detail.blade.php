@extends('mimin.base')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Kecamatan {{ $jadwal->kecamatan->kecamatan_nama }}</a>
                </li>

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
                                <p class="mb-1">Layanan</p>
                                <h4 class="mb-0">{{ $layanan_count }} Layanan</h4>
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
                                <p class="mb-1">Pendapatan Pajak</p>
                                <h3 class="text-white">Rp. {{ number_format($grandtotal_pajak) }},-</h3>
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
                                <p class="mb-1">Selesai Pelayanan</p>
                                <h3 class="text-white">{{ $pelayanan_count }}</h3>
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
                        <h4 class="card-title">Data Pelayanan Kecamatan {{ $jadwal->kecamatan->kecamatan_nama }}</h4>
                        @if ($jadwal->jadwal_status == 0)
                            <form
                                action="{{ url('mimin/pelayanan-tutup', $jadwal->jadwal_id) }}"
                                method="post">
                                @csrf
                                <button type="submit" class="btn light btn-primary btn-xs">Tutup Layanan</button>
                            </form>                            
                        @endif
                        @if ($jadwal->jadwal_status == 1)
                        <a href="javascript:void(0)" class="btn light btn-primary btn-xs">Layanan Sudah Ditutup</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table-datatable" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>No. Telp</th>
                                        <th>Alamat</th>
                                        <th>Nopol</th>
                                        <th>Tanggal Pelayanan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($list_pelayanan as $layanan)
                                        <tr>
                                            <td>#{{ $layanan->daftar_id }}</td>
                                            <td>{{ $layanan->daftar_nama }}</td>
                                            <td>{{ $layanan->daftar_nik }}</td>
                                            <td>{{ $layanan->daftar_wa }}</td>
                                            <td>{{ $layanan->daftar_alamat }}</td>
                                            @if ($layanan->layanan->layanan_status == 1)
                                                <td>
                                                    @foreach (App\Models\DaftarNopol::where('nopol_daftar', $layanan->daftar_id)->get() as $item)
                                                        <a href="" class="badge badge-rounded badge-success">KB <span
                                                                class="text-uppercase"> {{ $item->nopol_tengah }}
                                                                {{ $item->nopol_belakang }}</span></a>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href=""
                                                        class="badge badge-rounded badge-outline-success">{{ Carbon\Carbon::parse($layanan->jadwal_mulai)->format('d F Y') }}
                                                        -
                                                        {{ Carbon\Carbon::parse($layanan->jadwal_selesai)->format('d F Y') }}</a>
                                                </td>
                                                <td><span
                                                        class="badge badge-success badge-lg light">{{ $layanan->status_string }}</span>
                                                </td>
                                                <td>

                                                </td>
                                            @else
                                                <td>
                                                    @foreach (App\Models\DaftarNopol::where('nopol_daftar', $layanan->daftar_id)->get() as $item)
                                                        <a href="" class="badge badge-rounded badge-danger">KB
                                                            <span class="text-uppercase"> {{ $item->nopol_tengah }}
                                                                {{ $item->nopol_belakang }}</span></a>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href=""
                                                        class="badge badge-rounded badge-outline-danger">{{ Carbon\Carbon::parse($layanan->jadwal_mulai)->format('d F Y') }}
                                                        -
                                                        {{ Carbon\Carbon::parse($layanan->jadwal_selesai)->format('d F Y') }}</a>
                                                </td>
                                                <td><span
                                                        class="badge badge-danger badge-lg light">{{ $layanan->layanan->status_string }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form
                                                            action="{{ url('mimin/pelayanan-detail') }}/{{ $layanan->layanan->layanan_id }}"
                                                            method="post">
                                                            @csrf
                                                            @method('post')
                                                            <input type="hidden" name="id_layanan"
                                                                value="{{ $layanan->layanan->layanan_id }}">
                                                            <input type="hidden" name="id_daftar"
                                                                value="{{ $layanan->layanan->layanan_daftar }}">
                                                            <a onclick="return confirm('Yakin mah e?')">
                                                                <button type="submit"
                                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                        class="fas fa-check"></i></button>
                                                            </a>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                                <tbody>
                                    @foreach ($list_pelayanan as $item)
                                        <tr>
                                            <td>#{{ $item->daftar->daftar_id }}</td>
                                            <td>{{ $item->daftar->daftar_nama }}</td>
                                            <td>{{ $item->daftar->daftar_nik }}</td>
                                            <td>{{ $item->daftar->daftar_wa }}</td>
                                            <td>{{ $item->daftar->daftar_alamat }}</td>
                                            @if ($item->layanan_status == 1)
                                                <td>
                                                        <a href="javascript:void(0)"
                                                            class="badge badge-rounded badge-success">KB
                                                            {{ $item->nopol->nopol_tengah }} <span
                                                                class="text-uppercase">{{ $item->nopol->nopol_belakang }}</span></a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        class="badge badge-rounded badge-outline-success">{{ Carbon\Carbon::parse($item->jadwal->jadwal_mulai)->format('d F Y') }}
                                                        -
                                                        {{ Carbon\Carbon::parse($item->jadwal->jadwal_selesai)->format('d F Y') }}</a>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge badge-success badge-lg light">{{ $item->status_string }}</span>
                                                </td>
                                                <td>

                                                </td>
                                            @endif
                                            @if ($item->layanan_status == 0)
                                                <td>
                                                    <a href="javascript:void(0)"
                                                    class="badge badge-rounded badge-danger">KB
                                                    {{ $item->nopol->nopol_tengah }} <span
                                                        class="text-uppercase">{{ $item->nopol->nopol_belakang }}</span></a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        class="badge badge-rounded badge-outline-danger">{{ Carbon\Carbon::parse($item->jadwal->jadwal_mulai)->format('d F Y') }}
                                                        -
                                                        {{ Carbon\Carbon::parse($item->jadwal->jadwal_selesai)->format('d F Y') }}</a>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge badge-danger badge-lg light">{{ $item->status_string }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form
                                                            action="{{ url('mimin/pelayanan-detail', $item->layanan_id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('post')
                                                            <button type="submit"
                                                                class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                    class="fas fa-check"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                            @if ($item->layanan_status ==2)
                                                <td>
                                                    @foreach ($item->daftar->nopol as $nopol)
                                                        <a href="javascript:void(0)"
                                                            class="badge badge-rounded badge-danger">KB
                                                            {{ $nopol->nopol_tengah }} <span class="text-uppercase">{{ $nopol->nopol_belakang }}</span></a>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        class="badge badge-rounded badge-outline-danger">{{ Carbon\Carbon::parse($item->jadwal->jadwal_mulai)->format('d F Y') }}
                                                        -
                                                        {{ Carbon\Carbon::parse($item->jadwal->jadwal_selesai)->format('d F Y') }}</a>

                                                </td>
                                                <td>
                                                    <span
                                                        class="badge badge-danger badge-lg light">{{ $item->status_string }}</span>
                                                </td>
                                                <td></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>No. Telp</th>
                                        <th>Alamat</th>
                                        <th>Nopol</th>
                                        <th>Tanggal Pelayanan</th>
                                        <th>Status</th>
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
@endsection
