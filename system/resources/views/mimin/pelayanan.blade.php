@extends('mimin.base')
@section('content')
    <div class="container-fluid">

        <!-- row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    @foreach ($list_jadwal as $item)
                        <div class="col-xl-6"><a href="{{ url('mimin/pelayanan-detail', $item->jadwal_id) }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="d-flex">

                                                <div>
                                                    <h4 class="fs-20 mb-1">{{ Carbon\Carbon::parse($item->jadwal_mulai)->format('d F Y') }}</h4>

                                                    <span class="d-block"><i class="fas fa-map-marker-alt me-2"></i>{{ $item->kecamatan->kecamatan_nama }}</span>
                                                    <span class="d-block"><i class="fas fa-map-marker-alt me-2"></i>{{ $item->lokasi->lokasi_nama }}</span>
                                                </div>
                                            </div>
                                            <div class="job-available">
                                                @if ($item->layanan->where('layanan_status', 1)->count() == $item->layanan->count())
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-success btn-rounded">Selesai</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded">{{ $item->daftar_count }}
                                                        Pelayanan</a>
                                                @elseif ($item->jadwal_status == 1)
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-warning btn-rounded">Tutup</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded">{{ $item->jumlah_nopol }}
                                                        Pelayanan</a>
                                                @else
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary btn-rounded">{{ $item->jumlah_nopol }}
                                                        Pelayanan</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>

    </div>
@endsection
