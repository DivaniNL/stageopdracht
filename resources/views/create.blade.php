@include('layouts.app')
<html>

<head>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h1 class="display-3">Toevoegen</h1>
                <div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <form method="post" action="{{ route('store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="naam">Naam</label>
                            <input type="text" class="form-control" name="naam" />
                        </div>

                        <div class="form-group">
                            <label for="adres">Adres</label>
                            <input type="text" class="form-control" name="adres" />
                        </div>

                        <button type="submit" class="btn btn-secondary">Voeg je adres toe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>