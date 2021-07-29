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
                        <h2 class="text-center">Cuentas de terceros inscritas</h2>
                        <table id="tableTransfers">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Número de cuenta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($thirdPartyAccounts as $account)
                                <tr>
                                    <td>{{ $account->firstname . $account->lastname }}</td>
                                    <td>{{ $account->number }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 mb-3">
                        <h2 class="text-center">Realiza transacciones</h2>
                    </div>
                    <div class="col-8 offset-2 d-flex align-items-center justify-content-center flex-column border rounded">
                        @if($errors->any())
                            <div class="alert alert-danger"> {{ $errors->first() }}</div>
                        @endif
                        <form class="w-100 bg-light p-3" action="{{ route('send_transfer_another_account') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="origin_account">Cuenta origen</label>
                                <select class="form-control" id="origin_account" name="origin_account" required>
                                    @foreach ($myActiveAccounts as $account)
                                    <option value="{{$account->id}}">{{ $account->number }}</option>
                                    @endforeach
                                    <option disabled selected data-placeholder="true">Escoje una cuenta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="target_account">Cuenta destino</label>
                                <select class="form-control" id="target_account" name="target_account" required>
                                    @foreach ($thirdPartyAccounts as $account)
                                    <option value="{{$account->account_id}}">{{ $account->number }}</option>
                                    @endforeach
                                    <option disabled selected data-placeholder="true">Escoje una cuenta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="amount">Monto</label>
                                <input type="number" class="form-control" id="amount" name="amount" min="1" required>
                            </div>
                            <button type="submit" class="btn btn-primary d-table mx-auto">Transferir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jscripts')
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/custom/tableTransfers.js') }}"></script>
    <script>
        const select_origin_account = document.querySelector('#origin_account')
        const select_target_account = document.querySelector('#target_account')

        const option_length_select_origin_account = select_origin_account.querySelectorAll('option').length

        const option_length_select_target_account = select_target_account.querySelectorAll('option').length
        select_target_account.disabled = true

        select_origin_account.querySelectorAll('option')[option_length_select_origin_account -1].selected = true
        select_target_account.querySelectorAll('option')[option_length_select_target_account -1].selected = true

        select_origin_account.addEventListener('change', function(ev){
            select_target_account.disabled = false;
            let valueSelected = this.value

            select_target_account.querySelectorAll('option').forEach(el => el.disabled = false)
            select_target_account.querySelectorAll('option').forEach((el) => {

                if (el.dataset.placeholder){
                    el.disabled = true
                }
            })
        })
    </script>
    @isset($successfulMessage)
        <script>
            const contentMsg = "{!! $successfulMessage['content'] !!}"
            alert(contentMsg)
        </script>
    @endisset
@endsection
