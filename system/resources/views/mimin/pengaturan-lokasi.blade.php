@extends('mimin.base')
@section('content')

    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pengaturan Lokasi Kecamatan {{$kecamatan->kecamatan_nama}}</h4>
                        <a>
                            <button type="button" class="btn light btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#basicModal">Tambah Lokasi</button>
                            <!-- Modal -->
                            <div class="modal fade" id="basicModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Lokasi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <form action="{{url('mimin/tambah-lokasi', $kecamatan->kecamatan_id)}}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="basic-form">
                                                    <input type="text" name="lokasi_kecamatan" value="{{$kecamatan->kecamatan_id}}" hidden>
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Lokasi</label>
                                                        <input type="text" name="lokasi_nama" class="form-control" placeholder="Nama Lokasi">
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
                                        <th>Nama Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_lokasi_kecamatan as $item)
                                        <tr>
                                            <td>{{$item->kecamatan->kecamatan_nama}}</td>
                                            <td>{{$item->lokasi_nama}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-primary shadow btn-xs sharp me-1" onclick="confirmDelete('{{url('mimin/prosesHapus', $item->lokasi_id)}}', '{{ csrf_token() }}')"><i class="fas fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Kecamatan</th>
                                        <th>Nama Lokasi</th>
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

    <script>
        function confirmDelete(url, csrfToken) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: 'Data tidak bisa dikembalikan!!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#68e365',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, saya yakin!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.action = url;
                    form.method = 'POST';

                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = csrfToken;

                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';

                    form.appendChild(csrfInput);
                    form.appendChild(methodInput);

                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>

@endsection
