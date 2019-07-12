<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'photo',
        'video',
    ];
    function storeData($request)
    {
//        return '<div class="alert alert-success border-success">
//                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                        <i class="icofont icofont-close-line-circled"></i>
//                    </button>
//                    <strong>Success!</strong>Admin Created Successful
//    </div>'.$request->name;
        $email = $request->email;
        $emailCheck = Post::where('email',$email)->get()->count();
        if ($emailCheck)
        {
            return 'email Exist';
        }
        else
        {
            $photo_path = public_path().'/image/';
            $video_path = public_path().'/video/';
            $date       = date('His');
            $photo = $request->photo;
            $video = $request->video;
            $photoOne = 'Photo'.'-'.$date.'-'.date('Y').'.' . $photo->GetClientOriginalExtension();
            $videoOne = 'Video'.'-'.$date.'-'.date('Y').'.' . $video->GetClientOriginalExtension();
            $successPhoto = request()->photo->move($photo_path,$photoOne);
            $successVideo = request()->video->move($video_path,$videoOne);
            Post::create([
                'name'  => $request->name,
                'email' => $email,
                'photo' => $photoOne,
                'video' => $videoOne,
            ]);
            return 'done';
        }
    }
}
