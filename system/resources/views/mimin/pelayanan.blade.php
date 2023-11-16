@extends('mimin.base')
@section('content')
    
    <div class="container-fluid">
                    
        <!-- row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-6"><a href="{{url('mimin/pelayanan-detail')}}">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="d-flex">
                                        
                                        <div>
                                            <h4 class="fs-20 mb-1">Delta Pawan</h4>
                                            
                                            <span class="d-block"><i class="fas fa-map-marker-alt me-2"></i>Gedung Pancasila</span>
                                            <span class="d-block"><i class="fas fa-map-marker-alt me-2"></i>Gedung Kantor GOLKAR</span>
                                        </div>
                                    </div>
                                    <div class="job-available">
                                        
                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded">198 Pelayanan</a>
                                    </div>
                                </div>	
                            </div>
                        </div></a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        
    </div>

@endsection