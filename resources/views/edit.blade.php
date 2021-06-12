<!-- Include the file which contains the bootstrap <link> css file and the header with the nav -->
@include('layouts.app')
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <h5 class="display-4">Wijzig hier je adres</h5>
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
                <!-- The store method is inside AdresController. If this form is submitted, a new instance of Adres will be inserted into the adres table in the database with these values -->
                <form method="get" action="{{ route('adres.update',[$adres->id]) }}">
                @csrf
                    <div class="form-group">
                        <label for="naam">Naam</label>
                        <input type="text" class="form-control" name="naam" />
                    </div>
                    <div class="form-group">
                        <label for="adres">Adres</label>
                        <input type="text" class="form-control" name="adres" />
                    </div>
                    <button type="submit" class="btn btn-secondary">Wijzig je adres</button>
                </form>
            </div>
        </div>




















