@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form method="post" action="{{ route('child.update') }}">
        @csrf
        <div class="form-group">
          <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre..." value="{{ $childChoiced[0]->name }}">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{ $childChoiced[0]->password }}">
          <input type="hidden" name="id" value="{{ $childChoiced[0]->id }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>
  </div>
</div>
@endsection