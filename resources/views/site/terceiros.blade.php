@component('layouts.header')
    
@endcomponent

    
    <div class="container container-fluid mx-auto">

        <h4>Perfil do: {{ucfirst($usuario->nome)}}</h4>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 mx-auto p-4 d-flex justify-content-center">

            @foreach($images as $image)

                <div class="col bg-primary carde m-2">
                    <img data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="document.getElementById('imag').setAttribute('src', '{{asset('assets/media/'.$image->nome)}}' )" src="{{asset('assets/media/'. $image->nome)}}" class="img-card rounded mx-auto d-block" class="img-card rounded mx-auto d-block" alt="...">
                    
                    <!-- Modal -->    
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <img class="img-fluid" id="imag" src="" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal --> 


                    <a class="card-icon-download btn btn-sm bg-info" href="{{route('download', ['id' => $image->id])}}">
                        <img style="width: 20px; height:20px;" src="{{asset('assets/icon/download.svg')}}" alt="">
                    </a>

                    <p class="card-autor">Por: 

                        {{ucfirst($usuario->nome)}}

                    </p>
                </div>

            @endforeach
            

        </div>
    </div>
    
