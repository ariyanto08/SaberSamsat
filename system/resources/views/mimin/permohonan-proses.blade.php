@extends('mimin.base')
@section('content')
    
    <div class="container-fluid">
                    
        <!-- row -->
        
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Proses Permohonan Kecamatan Delta Pawan</h4>
                    </div>
                    <div class="card-body">
                        <div id="smartwizard" class="form-wizard order-create">
                            {{-- <ul class="nav nav-wizard">
                                <li><a class="nav-link" href="#wizard_Service"> 
                                    <span>1</span> 
                                </a></li>
                                <li><a class="nav-link" href="#wizard_Time">
                                    <span>2</span>
                                </a></li>
                                
                            </ul> --}}
                            <div class="tab-content">
                                <form action="{{url('mimin/permohonan-proses')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Penanggung Jawab<span class="text-danger">*</span></label>
                                                <input type="text" name="firstName" class="form-control" placeholder="Nama Penanggung Jawab" required>
                                            </div>
                                        </div>                                        
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Tanggal Mulai<span class="text-danger">*</span></label>
                                                <div class="example">
                                                    <input class="form-control input-daterange-datepicker" type="date" name="daterange">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Tanggal Selesai<span class="text-danger">*</span></label>
                                                <div class="example">
                                                    <input class="form-control input-daterange-datepicker" type="date" name="daterange">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary float-end">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection