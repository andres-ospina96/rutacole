@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form method="post" action="{{ route('child.store') }}">
        @csrf
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre...">
        </div>
        <div class="form-group">
          <label for="name">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="email...">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>
  </div>
</div>
@endsection