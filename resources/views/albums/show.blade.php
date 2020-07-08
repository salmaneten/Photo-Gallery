@extends('layouts.app')

@section('content')
    <h1>{{$album->name}}</h1>
    <a href="/" class="btn btn-secondary">Go Back</a>
    <a href="/photoshow/public/photos/create/{{$album->id}}" class="btn btn-primary">Upload Photo to Album </a>
    <hr>
    @if (count($album->photos) > 0)   
    <?php
    $colcount = count($album->photos); // we can do that cs we have a relationship between albums and photos
    $i = 1;
    ?>
    <div id="photos">
        <div class="container">
            <div class="row text-center">
                @foreach ($album->photos as $photo)
                    @if ($i == $colcount)
                        <div class="col-md-4">
                            <a href="/photoshow/public/photos/{{$photo->id}}">
                            <img class="img-thumbnail" src="/photoshow/storage/app/public/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                            </a>    
                            <br>
                        <h4>{{$photo->title}}</h4>
                    @else
                        <div class=" col-md-4">
                            <a href="/photoshow/public/photos/{{$photo->id}}">
                                <img class="img-thumbnail" src="/photoshow/storage/app/public/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$album->name}}">
                            </a>    
                            <br>
                    <h4>{{$photo->title}}</h4>   
                    @endif
                    @if ($i % 3 == 0)
                        </div>
            </div>            
                     <div class="row text-center">
                    @else
                     </div>   
                    @endif
                    <?php $i++; ?>
                @endforeach
            
        </div>
      </div>
    @else
    <p>No Photos To Display</p>   
    @endif
@endsection
