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
                    <div class="col-12 mb-3">
                        <h2 class="text-center">Transacciones realizadas</h2>
                        @if (count($transfers) > 0)
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
                        @else
                            <div class="alert alert-info">No hay transferencias para mostrar</div>
                        @endif
                        
                    </div>
                    <div class="col-12 mb-3">
                        <h2 class="text-center">Realizar transacciones</h2>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <a href="{{ route('individual_accounts') }}" class="btn mx-2 btn-primary">Cuentas propias</a>
                        <a href="{{ route('third_accounts') }}" class="btn mx-2 btn-primary">Cuentas de terceros</a>
                    </div>
                    @if($errors->any())
                    <div class="col-12 mt-3">
                        <div class="alert alert-danger"> {{ $errors->first() }}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jscripts')
    @if (count($transfers) > 0)
        <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
        <script src="{{ asset('js/custom/tableTransfers.js') }}"></script>
    @endif
@endsection
