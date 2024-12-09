<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Song; // Make sure this line is present
use App\Http\Resources\SongResource;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
// use Validator;   
class SongController extends Controller
{
    // Fetch all songs
    public function index()
    
    {
        
        $song = Song::all();
        $data=[
            'status'=>200,
            'song'=>$song

        ];
        return response()->json($data,200);

    }

    // Store a new song
public function upload(Request $request)
{
    // Validate the request data
    //   dd($request->all());
    $validator = Validator::make($request->all(), [
        'category' => 'required|integer',
        'song_title' => 'required|string|max:255',
        'song_description' => 'required|array',
        'song_audio' => 'required|string|max:255',
        // 'api_url' => 'required|string|max:255',
    ]);

    if ($validator->fails()) {
        $data=[
            "status"=>422,
            "message"=>$validator->messages()
        ];
        return response()->json($data,200);
    }
    else{
       $song = new Song();
        $song->category = $request->category;
        $song->song_title = $request->song_title;
        $song->song_description = json_encode($request->song_description);
        // $song->song_description = $request->song_description; 
        $song->song_audio = $request->song_audio;
        // $song->api_url = $request->api_url;

        
        $song->save();
        $data=[
            "status"=>200,
            "message"=>'Song Upload Sucessfully'
        ];

        return response()->json($data,200);
    }

}


    // Show a specific song by ID
    // public function show($id)
    // {
    //     $song = Song::find($id);

    //     if (!$song) {
    //         return response()->json(['message' => 'Song not found'], 404);
    //     }

    //     return new SongResource($song);
    // }

    // Update a specific song by ID
    // public function update(Request $request, $id)
    // {
    //     $song = Song::find($id);

    //     if (!$song) {
    //         return response()->json(['message' => 'Song not found'], 404);
    //     }

    //     // Validate the request data
    //     $validated = $request->validate([
    //         'category' => 'required|integer',
    //         'song_title' => 'required|string|max:255',
    //         'song_description' => 'required|array',
    //         'song_audio' => 'required|string|max:255',
    //         'api_url' => 'required|string|max:255',
    //     ]);

    //     // Convert song_description array to JSON
    //     $validated['song_description'] = json_encode($validated['song_description']);

    //     // Update the song record in the database
    //     $song->update($validated);

    //     // Return a response with the updated song data
    //     return new SongResource($song);
    // }

    // Delete a specific song by ID
    // public function destroy($id)
    // {
    //     $song = Song::find($id);

    //     if (!$song) {
    //         return response()->json(['message' => 'Song not found'], 404);
    //     }

    //     $song->delete();

    //     return response()->json(['message' => 'Song deleted successfully'], 200);
    // }
}
