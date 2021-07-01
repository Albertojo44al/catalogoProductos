<div class="panel panel-default">
    <div class="panel-heading">
        Preguntas a vendedor 
    </div>
    <div class="panel-body">
        <form class="col-md-12" method="POST" action="{{url('/comment')}}">
            {!! csrf_field()!!}

            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif

            <input type="hidden" name="producto_id" value="{{$prod->id}}" required>

        

            @if (Auth::guest())
                <div class="form-group">
                    <label for="nombre"> Nombre </label>
                    <input type="text" class="form-control" id="nombre" name="nombre"  value="{{old('nombre')}}">
                </div>
                
                <div class="form-group">
                    <label for="nombre"> Correo de contacto </label>
                    <input type="email" class="form-control" id="correo" name="correo"  value="{{old('correo')}}">
                </div>
            @else 
                <input type="hidden" class="form-control" id="nombre" name="nombre"  value="{{Auth::user()->name}}">       
                <input type="hidden" class="form-control" id="correo" name="correo"  value="{{Auth::user()->email}}">
            @endif  

                <div class="form-group">
                    <label for="nombre"> ¿Tienes alguna pregunta? </label>
                    <textarea class="form-control" name="comentario" id="comentario"></textarea>
                </div>
                
                <button class="btn btn-success">Comentar</button>
                
            
        </form>
    </div>
</div>