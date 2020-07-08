@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{$photo->title}}</h3>
        <p>{{$photo->description}}</p> 
        <a href="/albums/{{$photo->album_id}}">Back To Galery</a>
        <hr>
        <img src="/photoshow/storage/app/public/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
        <br> <br>
        {!!Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete Photo', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        <hr>
        <small>Size: {{$photo->size}}</small>
    </div>
@endsection