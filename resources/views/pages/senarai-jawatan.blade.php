@extends('layouts.app', ['activePage' => 'senarai-jawatan', 'title' => 'Sistem Data Perkhidmatan', 'navName' => 'Senarai
Jawatan', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">Senarai Jawatan</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-secondary btn-fill btn-wd" data-toggle="modal"
                                        data-target="#tambahjawatan">
                                        Tambah Jawatan
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="tambahjawatan" tabindex="-1" role="dialog"
                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Jawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ url('tambah-jawatan') }}" method="post" autocomplete="off">
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            @csrf
                                                            <input type="hidden" name="id_jabatan" value="{{ $id }}">
                                                            <div class="form-group">
                                                                <label for="jawatan">Jawatan</label>
                                                                <input type="text"
                                                                    onkeyup="this.value = this.value.toUpperCase();"
                                                                    class="form-control" name="jawatan" id="jawatan"
                                                                    aria-describedby="helpId" placeholder="Jawatan">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gred">Gred</label>
                                                                <select class="form-control" data-live-search="true"
                                                                    multiple name="gred" id="gred">
                                                                    @foreach ($gred_skim as $grd)
                                                                        <option value="{{ $grd->id }}">
                                                                            {{ $grd->kod_skim }}{{ $grd->gred }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gred_min">Gred Minimum</label>
                                                                <select class="form-control" name="gred_min" id="gred_min">
                                                                    <option value="">Sila Pilih</option>
                                                                    @foreach ($gred_skim as $grd)
                                                                        <option value="{{ $grd->id }}">{{ $grd->kod_skim }}{{ $grd->gred }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gred_max">Gred Maximum</label>
                                                                <select class="form-control" name="gred_max" id="gred_max">
                                                                    <option value="">Sila Pilih</option>
                                                                    @foreach ($gred_skim as $grd)
                                                                        <option value="{{ $grd->id }}">{{ $grd->kod_skim }}{{ $grd->gred }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jenis">Jenis Jawatan</label>
                                                                <select class="form-control" name="jenis" id="jenis">
                                                                    <option value="">SILA PILIH</option>
                                                                    <option value="HAKIKI">HAKIKI</option>
                                                                    <option value="FLEKSI">FLEKSI</option>
                                                                    <option value="TERBUKA">TERBUKA</option>
                                                                    <option value="KUMPULAN">KUMPULAN</option>
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

                                    <script>
                                        $('#exampleModal').on('show.bs.modal', event => {
                                            var button = $(event.relatedTarget);
                                            var modal = $(this);
                                            // Use above variables to manipulate the DOM

                                        });
                                    </script>
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
                                        <th>Jawatan & Gred</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Jawatan & Gred</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($jawatan as $index => $jwtn)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $jwtn->jawatan }} ({{ $jwtn->kod_skim }}{{ $jwtn->gred }})</td>
                                            <td class="text-center">
                                                <a name="" id="" class="btn btn-primary btn-fill btn-wd"
                                                    href="{{ url('butiran-jawatan', [$jwtn->id]) }}"
                                                    role="button">Butiran</a>
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
@endsection
