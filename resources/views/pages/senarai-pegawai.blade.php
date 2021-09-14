@extends('layouts.app', ['activePage' => 'senarai-pegawai', 'title' => 'Sistem Data Perkhidmatan', 'navName' => 'Senarai
Pegawai', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">
                        <div class="card-header">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close"
                                        data-dismiss="alert">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                    <span>
                                        <b>{{ session()->get('success') }}</span>
                                </div>
                            @endif
                            <div class="row align-items-center">
                                <div class="col-8">
                                    @foreach ($gred2 as $grd)
                                    <h3 class="mb-0">Senarai Pegawai Gred {{ $grd->kod_skim }}{{ $grd->gred }}</h3>
                                    
                                    <p class="text-sm mb-0">
                                        
                                    </p>
                                </div>
                                <div class="col-4 text-right">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-default" data-toggle="modal"
                                        data-target="#tambahpegawai">
                                        Tambah Pegawai
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="tambahpegawai" tabindex="-1" role="dialog"
                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Pegawai</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ url('tambah-pegawai') }}" method="post" autocomplete="off">
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="nama">Nama Pegawai</label>
                                                                <input type="text"
                                                                    onkeyup="this.value = this.value.toUpperCase();"
                                                                    class="form-control" name="nama" id="nama"
                                                                    aria-describedby="helpId"
                                                                    placeholder="Nama Pegawai">
                                                            </div>
                                                            <input type="hidden" name="id_gred" value="{{ $grd->id }}">
                                                            <div class="form-group">
                                                                <label for="no_kp">No Kad Pengenalan</label>
                                                                <input type="text"
                                                                    onkeyup="this.value = this.value.toUpperCase();"
                                                                    class="form-control" name="no_kp" id="no_kp"
                                                                    aria-describedby="helpId"
                                                                    placeholder="No Kad Pengenalan">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tarikh_lahir">Tarikh Lahir</label>
                                                                <input type="date" class="form-control" name="tarikh_lahir" id="tarikh_lahir"
                                                                    placeholder="Tarikh Lahir">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="id_jawatan">No Kad Pengenalan</label>
                                                                <select class="form-control" name="id_jawatan" id="id_jawatan">
                                                                    <option value="">Sila Pilih</option>
                                                                    @foreach ($jawatan_sandangan as $js)
                                                                        <option value="{{ $js->id }}">{{ $js->jawatan }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                        </div>

                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Nama</th>
                                        <th>jawatan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Nama</th>
                                        <th>jawatan</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($listpegawai as $index => $lg)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $lg->nama }}</td>
                                            <td>{{ $lg->jawatan }}</td>
                                            <td >
                                                <a class="btn btn-danger btn-fill btn-wd" href="{{ url('profil', [$grd->id]) }}" role="button">PROFIL PEGAWAI</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $('#tambahpegawai').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM

        });
    </script>
@endsection
