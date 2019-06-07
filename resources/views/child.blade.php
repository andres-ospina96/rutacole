@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
          <div class="card">
            <div class="card-header text-center font-weight-bold">Tus hijos</div>
    
            <div class="card-body d-flex align-items-start flex-column">        
              <ul>
                @forelse($childs as $child)
                  <li>
                    {{$child->name}}
                    <a href="{{ route('child.edit', [$child->id]) }}">
                      <i style="color:darkblue;" class="fas fa-edit"></i>
                    </a>
                  </li>  
                @empty
                  <li>Aún no has añadido a tus hijos</li>
                @endforelse
              <ul>
              <a href="{{ route('child.new') }}" class="btn btn-primary">Añadir hijo</a>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>
@endsection