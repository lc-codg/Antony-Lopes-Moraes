<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
@include('Header')

<body>
    @php
        use App\Http\Controllers\ContasaPagarController;
        $ContaAPagar = new ContasaPagarController();
        $ContasVencidas = $ContaAPagar->ListarAtrasadas();
        $ContasAVencer = $ContaAPagar->ListarAVencer();
    @endphp
    @if (count($ContasVencidas) > 0)
        <div class="card text-center">
            <div class="card-header">
                Atenção Estas Contas estão vencidas
            </div>
            <div class="card-body">
                @foreach ($ContasVencidas as $row)
                    <td>{{ $row->Vencimento }} - {{ $row->Razaof }} - R${{ $row->Total }}</td>
                    <br>
                @endforeach
            </div>
            <div class="card-header">
                <br><a name="" id="" class="btn btn-danger" href="/ContasaPagar/Todos"
                    role="button">Pagar</a>
            </div>
    @endif

    @if (count($ContasAVencer) > 0)
    <div class="card text-center">
        <div class="card-header">
            Atenção Estas Contas Vencem Hoje
        </div>
        <div class="card-body">
            @foreach ($ContasAVencer as $row)
                <td>{{ $row->Vencimento }} - {{ $row->Razaof }} - R${{ $row->Total }}</td>
                <br>
            @endforeach
        </div>
        <div class="card-header">
            <br><a name="" id="" class="btn btn-danger" href="/ContasaPagar/Todos"
                role="button">Pagar</a>
        </div>
@endif


</body>
@include('footer')

</html>
