@extends('mimin.base')
@section('content')
    
    <div class="container-fluid">
                    
                    
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pengaturan Kecamatan Layanan</h4>
                        <a>
                            <button type="button" class="btn light btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#basicModal">Tambah Kecamatan</button>
                            <!-- Modal -->
                            <div class="modal fade" id="basicModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Kecamatan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <form action="{{url('mimin/tambah-kecamatan')}}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="basic-form">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Kecamatan</label>
                                                        <input type="text" name="kecamatan_nama" class="form-control" placeholder="Nama Kecamatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Target Layanan</label>
                                                        <input type="number" name="kecamatan_target" class="form-control" placeholder="Target Layanan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Target Pendapatan</label>
                                                        <input type="text" name="kecamatan_target_pendapatan" class="form-control" placeholder="Target Pendapatan">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table-datatable" style="min-width: 845px">
                                <thead>
                                    <tr>                                    
                                        <th>Nama Kecamatan</th>
                                        <th>Target Layanan</th>
                                        <th>Target Pendapatan</th>                                        
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_kecamatan as $item)
                                        <tr>                                        
                                            <td><a href="{{url('mimin/pengaturan-lokasi', $item->kecamatan_id)}}">{{$item->kecamatan_nama}}</a></td>
                                            <td>{{$item->kecamatan_target}}</td>
                                            <td>{{$item->kecamatan_target_pendapatan}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="fas fa-pencil-alt"></i></a>
                                                </div>
                                            </td>
                                        </tr>                                        
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Kecamatan</th>
                                        <th>Target Layanan</th>
                                        <th>Target Pendapatan</th>                                        
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="editModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Kecamatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <form action="{{url('mimin/tambah-kecamatan')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="basic-form">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Kecamatan</label>
                                        <input type="text" name="kecamatan_nama" class="form-control" placeholder="Nama Kecamatan">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Target Layanan</label>
                                        <input type="number" name="kecamatan_target" class="form-control" placeholder="Target Layanan">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Target Pendapatan</label>
                                        <input type="text" name="kecamatan_target_pendapatan" class="form-control" placeholder="Target Pendapatan">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>

@endsection