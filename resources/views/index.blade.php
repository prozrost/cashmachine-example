<!DOCTYPE html>
<html>
<head>
    <title>CashMachine Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    @if($errors->isNotEmpty())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    Cash form
                </div>
                <div class="card-body">
                    <form name="cash-source" id="cash-source-form" method="post" action="{{route('store-transaction')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Denomination 1: </label>
                            <input type="text" id="denomination1" name="denomination[1]" class="form-control" required="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Denomination 5: </label>
                            <input type="text" id="denomination5" name="denomination[5]" class="form-control" required="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Denomination 10: </label>
                            <input type="text" id="denomination10" name="denomination[10]" class="form-control" required="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Denomination 50: </label>
                            <input type="text" id="denomination50" name="denomination[50]" class="form-control" required="true">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Denomination 100: </label>
                            <input type="text" id="denomination100" name="denomination[100]" class="form-control" required="true">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    Card form
                </div>
                <div class="card-body">
                    <form name="card-source" id="card-source-form" method="post" action="{{route('store-transaction')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Card number</label>
                            <input type="text" id="title" name="card_number" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Expiration Date</label>
                            <input type="text" name="expiration_date" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CVV</label>
                            <input type="text" name="cvv" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cardholder</label>
                            <input type="text" name="cardholder" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Amount</label>
                            <input type="text" name="amount" class="form-control" required="">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    Bank form
                </div>
                <div class="card-body">
                    <form name="bank-source" id="bank-source-form" method="post" action="{{route('store-transaction')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Transfer Date</label>
                            <input type="date" id="title" name="transfer_date" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Customer name</label>
                            <input type="text" id="customerName" name="customer_name" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Account number</label>
                            <input name="account_number" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Amount</label>
                            <input type="text" id="title" name="amount" class="form-control" required="">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
