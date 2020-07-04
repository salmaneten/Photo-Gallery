@extends('layouts.app')

@section('content')

@if (count($albums) > 0)
    <?php
    $colcount = count($albums);
    $i = 1;
    ?>
    <div id="albums">
        <div class="container">
            <div class="row text-center">
                @foreach ($albums as $album)
                    @if ($i == $colcount)
                        <div class="col-md-4">
                            <a href="/photoshow/public/albums/{{$album->id}}">
                                <img class="img-thumbnail" src="/photoshow/storage/app/public/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
                            </a>    
                            <br>
                        <h4>{{$album->name}}</h4>
                    @else
                        <div class=" col-md-4">
                            <a href="/photoshow/public/albums/{{$album->id}}">
                                <img class="img-thumbnail" src="/photoshow/storage/app/public/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
                            </a>    
                            <br>
                    <h4>{{$album->name}}</h4>   
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
    <p>No Albums To Display</p>   
    @endif
    @endsection
    
        </div>
<script>
    var varRec = <?php echo json_encode($colcount); ?>;
    var alb = <?php echo json_encode($albums); ?>;
    console.log(alb);
</script>