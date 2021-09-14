@extends('layouts.app', ['activePage' => 'senarai-gred', 'title' => 'Sistem Data Perkhidmatan', 'navName' => 'Senarai
Gred', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">Senarai Gred</h3>
                                    <p class="text-sm mb-0">
                                        
                                    </p>
                                </div>
                                <div class="col-4 text-right">
                                    <!-- Button trigger modal -->
                                    {{-- <button type="button" class="btn btn-sm btn-default" data-toggle="modal"
                                        data-target="#tambahjbtn">
                                        Tambah Jabatan
                                    </button> --}}

                                    <!-- Modal -->
                                    <div class="modal fade" id="tambahjbtn" tabindex="-1" role="dialog"
                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah jabatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ url('tambah-jabatan') }}" method="post">
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="jabatan">Nama Jabatan/Agensi</label>
                                                                <input type="text"
                                                                    onkeyup="this.value = this.value.toUpperCase();"
                                                                    class="form-control" name="jabatan" id="jabatan"
                                                                    aria-describedby="helpId"
                                                                    placeholder="Nama Jabatan/Agensi">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="kategori">Kategori</label>
                                                                <select class="form-control" name="kategori" id="kategori"
                                                                    required>
                                                                    <option value="">SILA PILIH</option>
                                                                    @foreach ($kategori as $kj)
                                                                        <option value="{{ $kj->id }}">
                                                                            {{ $kj->kategori }}</option>
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
                                        <th>Gred</th>
                                        <th>Senarai Pegawai</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Gred</th>
                                        <th>Senarai Pegawai</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($gred as $index => $grd)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $grd->kod_skim }}{{ $grd->gred }}</td>
                                            <td >
                                                <a class="btn btn-danger btn-fill btn-wd" href="{{ url('senarai-pegawai', [$grd->id]) }}" role="button">SENARAI PEGAWAI</a>
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
        $('#tambahjbtn').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM

        });
    </script>
@endsection
