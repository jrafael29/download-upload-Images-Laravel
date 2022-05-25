@component('layouts.header')
@endcomponent

<div class="my-4">
    <div class="card col-sm-6 col-12 m-auto">
        <div class="card-header">
            <h3 class="card-title">Login</h3>
        </div>
        <form class="form-horizontal" method="post" action="{{route('fazerLogin')}}">
            @csrf

            <div class="card-body">

                <div class="form-group row py-1">
                    <div class="col-sm-12">
                        <input type="email" value="{{old('email')}}" class="form-control" name="email" id="inputEmail3" placeholder="Email">
                    </div>
                </div>

                <div class="form-group row py-1 mb-2">
                    <div class="col-sm-12">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <span class="">
                        Não é cadastrado? 
                        <a href="{{route('registro')}}">Cadastre-se</a>
                    </span>
                </div>
                
                
            </div>
            
            <div class="card-footer">
            <button type="submit" class="btn btn-info">Entrar</button>
            </div>
        
        </form>
    </div>
</div>
