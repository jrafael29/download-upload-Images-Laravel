@component('layouts.header')
   
@endcomponent


<div class="container my-1 m-auto">
    <div class="grid">

        <div class="border-bottom border-dark mb-3">
            <button type="button" class="btn btn-dark my-3 align-middle" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Adicionar nova imagem
            </button>
        </div>
        
          
        <!-- Modal Upload -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Carregar imagem</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex justify-content-center">
                            <form action="{{route('upload')}}" enctype="multipart/form-data" method="post" class="col" >
                                @csrf
                                <label class="btn btn-dark" for="imageInput">Clique para carregar uma imagem</label>
                                <input type="file" name="image" accept="image/*" id="imageInput">
                                {{-- <input class="btn btn-success my-1" type="submit" value="Enviar" > --}}
                                <hr>
                                <img id="imageArea" class="img-fluid">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Modal Upload -->


        <div class="g-col-6 g-col-md-4">
            <h3>Suas imagens</h3>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 mx-auto p-4 d-flex justify-content-center">
                    @foreach($images as $image)
                        <div class="col bg-primary carde m-2">

                            <img src="{{asset('assets/media/'. $image->nome)}}" class="img-card rounded mx-auto d-block" alt="...">

                            <form action="{{route('destroyImage', ['id' => $image->id])}}" method="post" onsubmit="return confirm('deseja mesmo excluir esta foto?')">
                                @csrf 
                                @method('delete')
                                <button type="submit" class="card-icon-excluir btn btn-sm bg-danger">
                                    <img style="width: 20px; height:20px;" src="{{ asset('assets/icon/lixeira.svg') }}" alt="" srcset="">
                                </button>  
                                
                            </form> 

                        </div>  
                    @endforeach

                </div>
            
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#imageInput').change(function(){
        const file = $(this)[0].files[0];
        const fileReader = new FileReader();
        fileReader.onloadend = function(){
            $('#imageArea').attr('src', fileReader.result)
        }
        fileReader.readAsDataURL(file)
    })
</script>