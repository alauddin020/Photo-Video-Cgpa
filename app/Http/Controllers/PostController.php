<?php

namespace App\Http\Controllers;
use getID3;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        //
        return view('new');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('videoBlob',['posts'=>Post::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {

        //
        $videoDetails = new getID3;
//        echo $file['message'];
        $post = new Post();
        //return response()->json(['success'=>$post->storeData($request)]);
        $email = $request->email;
//        $emailCheck = Post::where('email',$email)->get()->count();
//        if ($emailCheck)
//        {
//            return response()->json(['data'=>'email Exist']);
//        }
//        else
//        {
            $photo_path = public_path().'/image/';
            $video_path = public_path().'/video/';
            $date       = date('His');
            $photo = $request->photo;
            $video = $request->video;
            $photoOne = 'Photo'.'-'.$date.'-'.date('Y').'.' . $photo->GetClientOriginalExtension();
            $videoOne = 'Video'.'-'.$date.'-'.date('Y').'.' . $video->GetClientOriginalExtension();
            $successPhoto = request()->photo->move($photo_path,$photoOne);
            $successVideo = request()->video->move($video_path,$videoOne);
            $file = $videoDetails->analyze($video_path.'/'.$videoOne);

                try{
                    $post->name  =$request->name;
                    $post->email =$email;
                    $post->photo =$photoOne;
                    $post->video =$videoOne;
                    if ($file['playtime_string']!=null)
                    {
                        $file = $file['playtime_string'];
                        $post->duration= $file;
                        $post->save();
                        return response()->json(['data'=>$post]);
                    }
                }
                catch (\Exception $a)
                {
                    $delImage = $photo_path.'/'.$photoOne;
                    \File::delete($delImage);

                    $delVideo = $video_path.'/'.$videoOne;
                    \File::delete($delVideo);
                    return response()->json(['data'=>'Video Encoded Problem']);
                }



//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $video_path = public_path().'/video/1.mp4';
        $getID3 = new getID3;
        $file = $getID3->analyze($video_path);
        $a = $file['playtime_string'];
        echo number_format(floor($a+$a),2);
        die();
        echo("Duration: ".$file['playtime_string'].
            " / Dimensions: ".$file['video']['resolution_x']." wide by ".$file['video']['resolution_y']." tall".
            " / Filesize: ".$file['filesize']." bytes<br />");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        //

        $a = Post::findOrFail($post);
        return $a->video;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
