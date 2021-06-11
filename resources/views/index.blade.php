@include('layouts.app')

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="display-3 header-adresboek">Adresboek</h1>
                    <a class="btn btn-success btn-lg btn-block" href="/create">Adres Aanmaken <i class="fa fa-plus"></i></a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td></td>
                                <td>Naam</td>
                                <td>Adres</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($adressen as $adres)
                            <tr id="adres-{{$adres->id}}">
                                <td>
                                    
                                    @csrf
                                        
                                        <button class="btn btn-danger delete-adres" onclick="DeleteAdres({!! $adres->id !!})">Delete&nbsp;<i class="fa fa-trash" aria-hidden="true"></i></button>
                                    
                                </td>
                                <td>{{$adres->naam}}</td>
                                <td>{{$adres->adres}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                <div>
            </div>

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


        <script>
            
        
        function DeleteAdres(id) {
        console.log(id);
        axios.delete(`delete/`+ id)
        .then( response => {
            let adresDiv = document.getElementById("adres-" + id);
            adresDiv.parentNode.removeChild(adresDiv);
            console.log(response.data);
            
        });

        }
        </script>

