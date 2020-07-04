
@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Create Album</h3>
     
            {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
       
            {{Form::text('name','',['placeholder' => 'Album Name', 'class' => "form-control"])}}
        
            {{Form::textarea('description','',['placeholder' => 'Album Description', 'class' => 'form-control'])}}
       
            {{Form::file('cover_image', ['class' => 'form-control'])}}
        
            {{Form::submit('submit', [ 'class' => 'btn btn-primary'])}}
        
            {!! Form::close() !!}
       
    </div>        
    
@endsection