@extends('layouts.app', ['activePage' => 'butiran-skim', 'title' => 'Sistem Data Perkhidmatan', 'navName' => 'Butiran
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
                                @foreach ($skim as $index => $skm)
                                    <div class="col-8">
                                        <h3 class="mb-0">Senarai Gred Skim
                                            {{ $skm->nama_skim }}({{ $skm->kod_skim }})</h3>
                                    </div>
                                @endforeach
                                <div class="col-4 text-right">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-default btn-fill btn-wd" data-toggle="modal"
                                        data-target="#tambahgred">
                                        Tambah Gred
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="tambahgred" tabindex="-1" role="dialog"
                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Gred</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ url('tambah-gred') }}" method="post" autocomplete="off">
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            @csrf
                                                            <div class="form-group">
                                                                @foreach ($skim as $index => $skm)
                                                                    <input type="hidden" name="id_skim"
                                                                        value="{{ $skm->id }}">
                                                                @endforeach
                                                                <label for="gred">Gred Skim Perkhidmatan</label>
                                                                <input type="text"
                                                                    onkeyup="this.value = this.value.toUpperCase();"
                                                                    class="form-control" name="gred" id="gred"
                                                                    aria-describedby="helpId"
                                                                    placeholder="Gred Skim Perkhidmatan">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gaji_min">Gaji Minimum</label>
                                                                <input type="text"
                                                                    onkeyup="this.value = this.value.toUpperCase();"
                                                                    class="form-control" name="gaji_min" id="gaji_min"
                                                                    aria-describedby="helpId" placeholder="Gaji Minimum">
                                                                {{-- <small id="helpId" class="form-text text-muted">Contoh:
                                                                    N,S</small> --}}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gaji_max">Gaji Maximun</label>
                                                                <input type="text"
                                                                    onkeyup="this.value = this.value.toUpperCase();"
                                                                    class="form-control" name="gaji_max" id="gaji_max"
                                                                    aria-describedby="helpId" placeholder="Gaji Maximun">
                                                                {{-- <small id="helpId" class="form-text text-muted">Contoh:
                                                                    N,S</small> --}}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="kadar_kenaikan">Kadar Kenaikan</label>
                                                                <input type="text"
                                                                    onkeyup="this.value = this.value.toUpperCase();"
                                                                    class="form-control" name="kadar_kenaikan"
                                                                    id="kadar_kenaikan" aria-describedby="helpId"
                                                                    placeholder="Kadar Kenaikan">
                                                                {{-- <small id="helpId" class="form-text text-muted">Contoh:
                                                                    N,S</small> --}}
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
                                        <th>Gaji Minimum (RM)</th>
                                        <th>Gaji Maximum (RM)</th>
                                        <th>Kadar Kenaikan (RM)</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Gred</th>
                                        <th>Gaji Minimum (RM)</th>
                                        <th>Gaji Maximum (RM)</th>
                                        <th>Kadar Kenaikan (RM)</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($gred as $index => $grd)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $grd->gred }}</td>
                                            <td>{{ $grd->gaji_min }}</td>
                                            <td>{{ $grd->gaji_max }}</td>
                                            <td>{{ $grd->kadar_kenaikan }}</td>
                                            <td class="text-center">
                                                <a name="" id="" class="btn btn-primary btn-fill btn-wd" href="#" role="button">Kemaskini</a>
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
        $('#tambahgred').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM

        });
    </script>
@endsection
