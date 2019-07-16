<?php
    function timeCount($value)
    {
        $a = explode('.',$value);
        if (count($a)==2)
        {
            //return $a[0].':'.$a[1];
            if ($a[0]<120)
            {
                $b = $a[0]-60;
                if ($a[1]>60)
                {
                    $c = $a[1]-60;
                    return '01'.':'.($b+1).':'.$c;
                }
                elseif ($a[1]>120)
                {
                    $c = $a[1]-120;
                    return '01'.':'.($b+2).':'.$c;
                }
                elseif ($a[1]>180)
                {
                    $c = $a[1]-180;
                    return '01'.':'.($b+3).':'.$c;
                }
                else
                {
                    return '01'.':'.($b).':'.$a[1];
                }
            }
            elseif($a[0]<180)
            {
                $b = $a[0]-120;
                if ($a[1]>60)
                {
                    $c = $a[1]-60;
                    return '02'.':'.($b+1).':'.$c;
                }
                elseif ($a[1]>120)
                {
                    $c = $a[1]-120;
                    return '02'.':'.($b+2).':'.$c;
                }
                elseif ($a[1]>180)
                {
                    $c = $a[1]-180;
                    return '02'.':'.($b+3).':'.$c;
                }
                else
                {
                    return '02'.':'.($b).':'.$a[1];
                }
            }
            elseif($a[0]<240)
            {
                $b = $a[0]-180;
                if ($a[1]>60)
                    {
                        $c = $a[1]-60;
                        return '03'.':'.($b+1).':'.$c;
                    }
                elseif ($a[1]>120)
                    {
                        $c = $a[1]-120;
                        return '03'.':'.($b+2).':'.$c;
                    }
                elseif ($a[1]>180)
                    {
                        $c = $a[1]-180;
                        return '03'.':'.($b+3).':'.$c;
                    }
                else
                    {
                        return '03'.':'.($b).':'.$a[1];
                    }
            }
            elseif($a[0]<300)
            {
                $b = $a[0]-240;
                if ($a[1]>60)
                {
                    $c = $a[1]-60;
                    return '04'.':'.($b+1).':'.$c;
                }
                elseif ($a[1]>120)
                {
                    $c = $a[1]-120;
                    return '04'.':'.($b+2).':'.$c;
                }
                elseif ($a[1]>180)
                {
                    $c = $a[1]-180;
                    return '04'.':'.($b+3).':'.$c;
                }
                else
                {
                    return '04'.':'.($b).':'.$a[1];
                }
            }
            elseif($a[0]<360)
            {
                $b = $a[0]-300;
                if ($a[1]>60)
                {
                    $c = $a[1]-60;
                    return '05'.':'.($b+1).':'.$c;
                }
                elseif ($a[1]>120)
                {
                    $c = $a[1]-120;
                    return '05'.':'.($b+2).':'.$c;
                }
                elseif ($a[1]>180)
                {
                    $c = $a[1]-180;
                    return '05'.':'.($b+3).':'.$c;
                }
                else
                {
                    return '05'.':'.($b).':'.$a[1];
                }
            }
            elseif($a[0]<420)
            {
                $b = $a[0]-360;
                if ($a[1]>60)
                {
                    $c = $a[1]-60;
                    return '06'.':'.($b+1).':'.$c;
                }
                elseif ($a[1]>120)
                {
                    $c = $a[1]-120;
                    return '06'.':'.($b+2).':'.$c;
                }
                elseif ($a[1]>180)
                {
                    $c = $a[1]-180;
                    return '06'.':'.($b+3).':'.$c;
                }
                else
                {
                    return '06'.':'.($b).':'.$a[1];
                }
            }
            elseif($a[0]<480)
            {
                //return $a[0].'/'.$a[1];
                $b = $a[0]-420;
                if ($a[1]>60)
                {
                    $c = $a[1]-60;
                    return '07'.':'.($b+1).':'.$c;
                }
                elseif ($a[1]>120)
                {
                    $c = $a[1]-120;
                    return '07'.':'.($b+2).':'.$c;
                }
                elseif ($a[1]>180)
                {
                    $c = $a[1]-180;
                    return '07'.':'.($b+3).':'.$c;
                }
                else
                {
                    return '07'.':'.($b).':'.$a[1];
                }
            }
            elseif($a[0]<540)
            {
                $b = $a[0]-480;
                if ($a[1]>60)
                {
                    $c = $a[1]-60;
                    return '08'.':'.($b+1).':'.$c;
                }
                elseif ($a[1]>120)
                {
                    $c = $a[1]-120;
                    return '08'.':'.($b+2).':'.$c;
                }
                elseif ($a[1]>180)
                {
                    $c = $a[1]-180;
                    return '08'.':'.($b+3).':'.$c;
                }
                else
                {
                    return '08'.':'.($b).':'.$a[1];
                }
            }
            elseif($a[0]<600)
            {
                $b = $a[0]-540;
                if ($a[1]>60)
                {
                    $c = $a[1]-60;
                    return '09'.':'.($b+1).':'.$c;
                }
                elseif ($a[1]>120)
                {
                    $c = $a[1]-120;
                    return '09'.':'.($b+2).':'.$c;
                }
                elseif ($a[1]>180)
                {
                    $c = $a[1]-180;
                    return '09'.':'.($b+3).':'.$c;
                }
                else
                {
                    return '09'.':'.($b).':'.$a[1];
                }
            }
            elseif($a[0]<660)
            {
                $b = $a[0]-600;
                if ($a[1]>60)
                {
                    $c = $a[1]-60;
                    return '10'.':'.($b+1).':'.$c;
                }
                elseif ($a[1]>120)
                {
                    $c = $a[1]-120;
                    return '10'.':'.($b+2).':'.$c;
                }
                elseif ($a[1]>180)
                {
                    $c = $a[1]-180;
                    return '10'.':'.($b+3).':'.$c;
                }
                else
                {
                    return '10'.':'.($b).':'.$a[1];
                }
            }
        }
    }
?>
@extends('layouts.app')

@section('css')
     <link rel="stylesheet" type="text/css" href="{{asset('public/blob/style.css')}}">
     <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 @endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><div class="card-title">All Info</div> </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Time</th>
                        <th>Video View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $time = 0.0; @endphp
                    @foreach($posts as $post)
                    @php
                        $a = explode(':',$post->duration);
                        if (count($a)==2)
                        {
                            $a    = $a[0].'.'.$a[1];
                            $time = $time+ $a;
                            $time = number_format(round((float)$time,2),2);
                        }
                        elseif (count($a)==3)
                        {
                            $a    = $a[0]*60+$a[1].'.'.$a['2'];
                                $time = $time+ $a;
                                $time = number_format(round((float)$time,2),2);
                        }
                    @endphp
                        <tr>
                            <td>{{$post->name}}</td>
                            <td>{{$post->email}}</td>
                            <td>{{$post->duration}}</td>
                            <td onload="videoId('{{$post->id}}')"><a role="button" class="btn-success btn" onclick="videoId('{{$post->video}}')" data-toggle="modal" data-target=".bd-example-modal-lg">View</a> </td>
                        </tr>
                    @endforeach
                    <tr>{{timeCount($time)}}</tr>
                    </tbody>
                </table>
            </div>
        </div>
{{--        <video style="height: 460px;width: 560px;" id="faVideo" src="" controls height="100%" width="100%" autoplay></video>--}}
    <!-- Large modal -->
{{--data-keyboard="false" data-backdrop="static"--}}
    </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close closeVideo" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
                <div class="modal-content">
                    <div class="video-con">
                        <div class="loader-con">
                            <div class="la-ball-scale-ripple-multiple la-3x">
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <video id="faVideo" src="" controls height="100%" width="100%"></video>
                        <input type="hidden" value="100" class="currentVol">
                        <div class="controls-con-con">
                            <div class="controls-con">
                                <div class="seekbar-con">
                                    <div class="loadbar"></div>
                                    <div class="seekbar"></div>
                                </div>
                                <div class="slide">
                                    <div class="play-pause" style="background-image: url('public/blob/img/play.png')"></div>
                                    <div class="time-con">
                                        <span class="curtime" style="color:white">00:00</span>/<span class="durtime" style="color:#777">00:00</span>
                                    </div>
                                    <div class="right-align">
                                        <div class="volume-con">
                                            <div class="volume-icon"><i class="fa fa-volume-up" id="mute"></i></div>
                                            <div class="volume-slider-con">
                                                <div class="volume-slider"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <img src="{{asset('public/image/Alauddin.jpg')}}" style="height: 50px;width: 50px;float: right;margin-top: -7%">
                                    <div class="seprate-align">
                                        <div class="fullscreen">
                                            <i class="fa fa-expand" id="fullscreen"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <p style="margin-bottom: 0rem;">Alauddin F-a</p>--}}
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <span class="mr-4">Spread the word!</span>
                        <a role="button" class="btn-floating btn-sm btn-fb"><i class="fa fa-facebook"></i></a>
                        <!--Twitter-->
                        <a role="button" class="btn-floating btn-sm btn-tw"><i class="fa fa-twitter"></i></a>
                        <!--Google +-->
                        <a role="button" class="btn-floating btn-sm btn-gplus"><i class="fa fa-google-plus"></i></a>
                        <!--Linkedin-->
                        <a role="button" class="btn-floating btn-sm btn-ins"><i class="fa fa-linkedin"></i></a>

                        <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('public/blob/script.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        // var id = '';
        var siteUrl = '{{URL::to('/')}}';
        function videoId(id) {
            var xhr = new XMLHttpRequest();
            xhr.open( "GET", siteUrl+"/public/video/"+id, true );
            xhr.responseType = "arraybuffer";

            xhr.onload = function( e ) {
                $('.bd-example-modal-lg').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                //console.log(e);
                var arrayBufferView = new Uint8Array( this.response );
                var blob = new Blob( [ arrayBufferView ], { type: "video/mp4" } );
                var urlCreator = window.URL || window.webkitURL;
                var imageUrl = urlCreator.createObjectURL( blob );
                var img = document.getElementById( "faVideo" );
                img.src = imageUrl;
            };

            xhr.send();
        }
    </script>
    <script>
        $(function() {
            $(this).bind("contextmenu", function(e) {
                e.preventDefault();
            });
            document.onkeydown = function(e) {
                if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117)) {//Alt+c, Alt+v will also be disabled sadly.
                }
                return false;
            };
            // var popup = window.open(siteUrl+"fa", "myPopup", 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=120,height=120')
        });
        $(document).ready(function () {

            // $('.bd-example-modal-lg').modal();
            // videoId(id);
        })
    </script>
    @endsection
