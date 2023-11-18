@extends('mimin.base')
@section('content')

    <div class="container-fluid">
                    
        <!-- row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="row">

                    @foreach ($list_kecamatan as $item)
                        <div class="col-xl-6"><a href="{{url('mimin/permohonan-detail', $item->kecamatan_id)}}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <div class="d-flex">
                                            
                                            <div>
                                                <h4 class="fs-20 mb-1">{{$item->kecamatan_nama}}</h4>
                                                @foreach ($item->lokasi as $lokasi)
                                                    <span class="d-block text-capitalize"><i class="fas fa-map-marker-alt me-2"></i>{{$lokasi->lokasi_nama}}</span>                                                    
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="job-available">
                                            <a href="" class="btn btn-outline-success btn-rounded">Target {{$item->kecamatan_target}}</a>
                                            <a href="" class="btn btn-outline-primary btn-rounded">{{$item->daftar_count}} Permohonan</a>
                                        </div>
                                    </div>	
                                </div>
                            </div></a>
                        </div>                        
                    @endforeach
                    
                </div>
            </div>
        </div>
        
    </div>

@endsection