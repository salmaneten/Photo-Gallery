<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    public function create($album_id){  // we get this id from the URL
        return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'image|max:1999' 
        ]);
        
        // Get filename with extension
        $filenameWithExt = $request->file('photo')->getClientOriginalName();
    
        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
        //Get just the extension
        $extension = $request->file('photo')->getClientOriginalExtension();
        
        //Create new filename
        $filenameToStore = $filename. '_'.time().'.'.$extension;
        
        // Uplaod image
        $path = $request->file('photo')->storeAs('public/photos/'. $request->input('album_id'), $filenameToStore);

        // Upload photo
        $photo = new Photo;
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getSize();
        $photo->album_id = $request->input('album_id');
        $photo ->photo = $filenameToStore;

        $photo->save();
    
        return redirect('/albums/'. $request->input('album_id'))->with('success', 'Photo Uploaded');    
    }

    public function show($id){
        $photo = Photo::find($id);
        return view('photos.show')->with('photo', $photo);
    }
    
    public function destroy($id){
        $photo = Photo::find($id);
        if(Storage::delete('public/photos/'.$photo->album_id. '/'. $photo->photo));
        $photo->delete();

        return redirect('/')->with('succcess', 'Photo Deleted');
    }
}
