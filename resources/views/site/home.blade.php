@component('layouts.header')
    
@endcomponent

    
    <div class="container container-fluid mx-auto">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 mx-auto p-4 d-flex justify-content-center">

            @foreach($images as $image)

                <div class="col bg-primary carde m-2" >
                    <img data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="document.getElementById('imag').setAttribute('src', '{{asset('assets/media/'.$image->nome)}}' )" src="{{asset('assets/media/'. $image->nome)}}" class="img-card rounded mx-auto d-block" alt="...">
                    
                    <!-- Modal -->    
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body d-flex justify-content-center">
                                    <img class="img-fluid " id="imag" src="" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->    
                
                    <a class="card-icon-download btn btn-sm bg-info" href="{{route('download', ['id' => $image->id])}}">
                        <img style="width: 20px; height:20px;" src="{{asset('assets/icon/download.svg')}}" alt="">
                    </a>

                    <p class="card-autor">
                        @foreach($usuarios as $usuario)
                            @if($usuario->id == $image->id_autor)
                                <div class="card-autor">
                                    Por: <a href="{{route('perfilTerceiros', ['id' => $usuario->id])}}" class="text-white">{{ucfirst($usuario->nome)}}</a>
                                </div>
                            @endif
                        @endforeach
                    </p>
                </div>
            @endforeach
        </div>
        {{$images->links()}}
    </div>
    