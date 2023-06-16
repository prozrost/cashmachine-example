<!DOCTYPE html>
<html>
<head>
    <title>CashMachine View</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    Transaction
                </div>
                <div class="card-body">
                    <p>ID: {{ $transaction->id }}</p>
                    <p>TOTAL: {{ $transaction->total_amount }}</p>
                    <p>INPUTS: </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaction->inputs as $key => $input)
                                <tr>
                                    <td>{{ $key }}</td>
                                    @if(is_array($input))
                                        <td>
                                        @foreach($input as $inputKey => $value)
                                            {{ $inputKey }} : {{ $value }} <br>
                                        @endforeach
                                        </td>
                                    @else
                                        <td> {{$input}} </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
