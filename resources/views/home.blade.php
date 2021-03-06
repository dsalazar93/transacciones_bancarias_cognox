@extends('layouts.app')

@section('stylesheets')
    {{-- <link href="{{ asset('css/custom/app_custom.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/custom/app_home.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" id="homePage">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center">Tablero de control</h2>
                        <p>A continuación señor usuario dispone de varias opciones para hacer transferencias y otros servicios con sus cuentas bancarias.</p>
                        <div class="row">
                            <div class="col-4">
                                <a href="{{ route('transactions') }}">
                                    <div class="card d-flex align-items-center justify-content-center flex-column">
                                        <div class="row">
                                            <div class="col-12 d-flex align-items-center justify-content-center flex-column">
                                                <img src="{{ asset('img/transaccion.png') }}" class="w-50 mt-4" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title text-center">Transacciones bancarias</h5>
                                                    <p class="card-text text-center">Realiza transacciones y visualizalas</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-4">
                                <div class="card d-flex align-items-center justify-content-center flex-column">
                                    <div class="row">
                                        <div class="col-12 d-flex align-items-center justify-content-center flex-column">
                                            <img src="{{ asset('img/cuenta.png') }}" class="w-50 mt-4" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title text-center">Estado de cuenta</h5>
                                                <p class="card-text text-center">Visualiza tus cuentas</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <a href="{{ route('logout') }}" onclick="logout(event)">
                                    <div class="card d-flex align-items-center justify-content-center flex-column">
                                        <div class="row">
                                            <div class="col-12 d-flex align-items-center justify-content-center flex-column">
                                                <img src="{{ asset('img/salir.png') }}" class="w-50 mt-4" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title text-center">Salir</h5>
                                                    <p class="card-text text-center">Cierra la sesión</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
