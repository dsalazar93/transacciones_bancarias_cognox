@extends('layouts.app')

@section('stylesheets')
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom/viewTransfers.css') }}">
@endsection

@section('content')
    <div class="container" id="transfersPage">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row">
                    <div class="col-12">
                        <table id="tableTransfers">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Cuenta de origen</th>
                                    <th>Cuenta de destino</th>
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transfers as $transfer)
                                <tr>
                                    <td>{{ $transfer->codigo }}</td>
                                    <td>{{ $transfer->cuenta_origen }}</td>
                                    <td>{{ $transfer->cuenta_destino }}</td>
                                    <td>{{ $transfer->monto }}</td>
                                    <td>{{ $transfer->fecha }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jscripts')
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/custom/tableTransfers.js') }}"></script>
@endsection
