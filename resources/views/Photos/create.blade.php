@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Upload Photo</h3>
     
            {!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
       
            {{Form::text('title','',['placeholder' => 'Photo Title', 'class' => "form-control"])}}
        
            {{Form::textarea('description','',['placeholder' => 'Photo Description', 'class' => 'form-control'])}}
       
            {{Form::hidden('album_id', $album_id)}}

            {{Form::file('photo')}}
            <br>
        
            {{Form::submit('submit', [ 'class' => 'btn btn-primary'])}}
        
            {!! Form::close() !!}
       
    </div>        
    
@endsection