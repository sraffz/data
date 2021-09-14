@extends('layouts.app', ['activePage' => 'laporan', 'title' => 'Sistem Data Perkhidmatan', 'navName' => 'Laporan', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">Laporan Penjawatan</h3>
                                    <p class="text-sm mb-0">
                                        
                                    </p>
                                </div>
                                <div class="col-4 text-right">

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
                                        <th>Jabatan</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Jabatan</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($jabatan as $index => $jbtn)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $jbtn->jabatan }}</td>
                                            <td class="d-flex justify-content-end">
                                                <a href="#"><i class="fa fa-edit"></i></a>
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
