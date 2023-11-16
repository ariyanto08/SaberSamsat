@extends('mimin.base')
@section('content')
    
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Kecamatan Delta Pawan</a></li>
                
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
                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Layanan</p>
                                <h4 class="mb-0">198 Layanan</h4>
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
                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                            <div class="media-body text-white text-end">
                                <p class="mb-1">Pendapatan Pajak</p>
                                <h3 class="text-white">Rp. 80.500.000.000,-</h3>
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
                                <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                                    <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                    <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                    <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                </svg>
                            </span>
                            <div class="media-body text-white text-end">
                                <p class="mb-1">Selesai Pelayanan</p>
                                <h3 class="text-white">197</h3>
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
                        <h4 class="card-title">Data Pelayanan Kecamatan Delta Pawan</h4>
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
                                <tbody>
                                    <tr>
                                        <td>#123423</td>
                                        <td>Merli Andika</td>
                                        <td>61041234445056</td>
                                        <td>085228928005</td>
                                        <td>Jl. Gatot Subroto No. 172</td>
                                        <td>
                                            <a href="javascript:void(0)" class="badge badge-rounded badge-success">KB 1234 GA</a>

                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="badge badge-rounded badge-outline-success">1 Nopember 2023</a>

                                        </td>
                                        <td>
                                            <span class="badge badge-success badge-lg light">Selesai</span>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-check"></i></a>
                                            </div>
                                        </td>
                                    </tr>
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