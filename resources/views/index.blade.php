<!-- Include the file which contains the bootstrap <link> css file and the header with the nav -->
@include('layouts.app')
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="display-3 header-adresboek">Het Adresboek</h1>
                    <!-- Button sending the visitor to the create.blade.php page where a new instance of Adres can be made -->
                    <a class="btn btn-success btn-lg btn-block" href="/create">Klik hier om een adres aan te maken <i class="fa fa-plus"></i></a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <!-- empty <td> to match the amount of columns in the other <td> tag -->
                                <td colspan = 2>Actions</td>
                                <td>Naam</td>
                                <td>Adres</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Places a <tr> inside of the table for each record in the adres table in the database -->
                            @foreach($adressen as $adres)
                            <!-- Gives each <tr> tag a ID to match the id of the record in the database. This is done to specify which item should be deleted when it's delete button is klicked -->
                            <tr id="adres-{{$adres->id}}">
                                <td><a href="{{ route('adres.edit', ['id' => $adres->id])}}" class="btn btn-warning">Edit&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i></a></td> 
                                <td>
                                    <!-- protect this site from CSRF attacks -->
                                    @csrf
                                    <button class="btn btn-danger delete-adres" onclick="DeleteAdres({!! $adres->id !!})">Delete&nbsp;
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <!-- The name and adress of a record in the database -->
                                <td>{{$adres->naam}}</td>
                                <td>{{$adres->adres}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                <div>
            </div>
        </div>
        <!-- Required scripts: jquery, ajax, axios -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
        // script to delete an adress in the Adrescontroller with AdresController@destroy while also removing its child.
        //The id parameter is the ID from the record in the database
        function DeleteAdres(id) {
            // this axios delete will trigger this route: Route::delete('delete/{id}','AdresController@destroy');
            axios.delete(`delete/`+ id)
            .then( response => {
                //if the record is deleted by the AdresController, the response will be true.
                //specify which <tr> needs to be removed
                let adresDiv = document.getElementById("adres-" + id);
                //remove that child
                adresDiv.parentNode.removeChild(adresDiv);
            });
        }
        </script>

