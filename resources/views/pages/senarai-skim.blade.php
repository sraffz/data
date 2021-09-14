@extends('layouts.app', ['activePage' => 'senarai-skim', 'title' => 'Sistem Data Perkhidmatan', 'navName' => 'Senarai
Skim', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">
                        <div class="card-header">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                    <span> <b>{{ session()->get('success') }}</span>
                                </div>
                            @endif
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Senarai Skim</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-default btn-fill btn-wd" data-toggle="modal"
                                        data-target="#tambahskim">
                                        Tambah Skim Perkhidmatan
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="tambahskim" tabindex="-1" role="dialog"
                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Skim Perkhidmatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ url('tambah-skim') }}" method="post" autocomplete="off">
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="nama_skim">Nama Skim Perkhidmatan</label>
                                                                <input type="text"
                                                                    onkeyup="this.value = this.value.toUpperCase();"
                                                                    class="form-control" name="nama_skim" id="nama_skim"
                                                                    aria-describedby="helpId"
                                                                    placeholder="Nama  Skim Perkhidmatan">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="kod_skim">Kod Skim Perkhidmatan</label>
                                                                <input type="text"
                                                                    onkeyup="this.value = this.value.toUpperCase();"
                                                                    class="form-control" name="kod_skim" id="kod_skim"
                                                                    aria-describedby="helpId"
                                                                    placeholder="Kod Skim Perkhidmatan">
                                                                <small id="helpId" class="form-text text-muted">Contoh:
                                                                    N,S</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jenis_skim">Jenis Skim Perkhidmatan</label>
                                                                <select class="form-control" name="jenis_skim"
                                                                    id="jenis_skim" required>
                                                                    <option value="">SILA PILIH</option>
                                                                    <option value="PENGURUSAN TERTINGGI">PENGURUSAN
                                                                        TERTINGGI</option>
                                                                    <option value="PENGURUSAN DAN PROFESIONAL">PENGURUSAN
                                                                        DAN PROFESIONAL</option>
                                                                    <option value="PELAKSANA">PELAKSANA</option>
                                                                    <option value="BERSEPADU">BERSEPADU</option>
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
                                        <th>Skim Perkhidmatan</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Skim Perkhidmatan</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($skim as $index => $skm)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $skm->nama_skim }}</td>
                                            <td class="text-center">
                                                <a name="" id="" class="btn btn-primary btn-fill btn-wd" href="{{ url('butiran-skim', [$skm->id]) }}" role="button">Butiran</a>
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
        $('#tambahskim').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM

        });
    </script>
@endsection
