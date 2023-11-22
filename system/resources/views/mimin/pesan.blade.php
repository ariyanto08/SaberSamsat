@extends('mimin.base')
@section('content')

    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pesan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table-datatable" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nama Pengirim</th>
                                        <th>Email Pengirim</th>
                                        <th>Judul Pesan</th>
                                        <th>Isi Pesan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_pesan as $item)
                                        @if ($item->kontak_status == 0)
                                            <tr>
                                                <td>{{$item->kontak_nama}}</td>
                                                <td>{{$item->kontak_email}}</td>
                                                <td>{{$item->kontak_judul}}</td>
                                                <td>{{$item->kontak_pesan}}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form
                                                            action="{{ url('mimin/pesan', $item->kontak_id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('post')
                                                            <button type="submit"
                                                                class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                    class="fas fa-check"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                        <tr>
                                            <td>{{$item->kontak_nama}}</td>
                                            <td>{{$item->kontak_email}}</td>
                                            <td>{{$item->kontak_judul}}</td>
                                            <td>{{$item->kontak_pesan}}</td>
                                            <td>
                                                <span
                                                        class="badge badge-success badge-lg light">Selesai</span>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Pengirim</th>
                                        <th>Email Pengirim</th>
                                        <th>Judul Pesan</th>
                                        <th>Isi Pesan</th>
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
