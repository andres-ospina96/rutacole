@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center flex-column align-items-center">
    <div class="col-md-10 mb-5">
      <div class="row">
        <div class="col-md-12 border rounded p-3">
          <h1 class="">Hola {{ $nameUser }}</h1>
          @if (Auth::user()->type == 'parent')
            <p>Mira aquí la información de tus hijos</p>
            <div class="row justify-content-center">
              <div class="col-md-11">
                <ul class="list-group">
                  @forelse($myChilds as $child)
                    <li class="list-group-item">
                      {{$child->name}}
                      <a href="{{ route('child.edit', [$child->id]) }}">
                        <i style="color:darkblue;" class="ml-3 fas fa-edit"></i>
                      </a>
                      <a href="{{ route('child.destroy', [$child->id]) }}">
                        <i style="color:darkblue;" class="ml-1 fas fa-trash-alt"></i>
                      </a>
                    </li>  
                  @empty
                    <li>Aún no has añadido a tus hijos</li>
                  @endforelse
                </ul>
              </div>
              <a href="{{ route('child.new') }}" class="btn btn-primary m-3">Añade hijo</a> 
            </div>              
          @else            
            <div class="row justify-content-center">
              <div class="col-md-11">
                <p>Haz clic en el botón para iniciar ruta</p>
                <a href="" class="btn btn-primary">Iniciar ruta</a>
              </div>
            </div>
          @endif
        </div>

      </div>
    </div>

    {{-- <div class="col-md-6 mb-5">
      <div class="card">
        <div class="card-header text-center font-weight-bold">Tus hijos</div>

        <div class="card-body d-flex align-items-center flex-column">        
          <p class="text-center">Haz clic en el siguiente botón para ver y añadir a tus hijos</p>
          <a href="{{ route('child.index') }}" class="btn btn-primary text-center mb-2">Registro de hijos</a>
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-5">
      <div class="card">
        <div class="card-header text-center font-weight-bold">Sigue a tus hijos</div>

        <div class="card-body d-flex align-items-center flex-column">        
          <p class="text-center">Haz clic en el siguiente botón para ver la ruta de tu hijo</p>
          <a href="" class="btn btn-primary text-center mb-2">Ver ruta</a>
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-5">
      <div class="card">
        <div class="card-header text-center font-weight-bold">Comunidad</div>

        <div class="card-body d-flex align-items-center flex-column">        
          <p class="text-center">Ingresando en el siguiente enlace podrás ver las opiniones de la comunidad</p>
          <a href="" class="btn btn-primary text-center mb-2">Ingreso</a>
        </div>
      </div>
    </div> --}}

  </div>
</div>
@endsection