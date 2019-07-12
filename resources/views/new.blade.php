
@extends('layouts.app')

@section('content')
    <style>
        .fa
        {
            background-color: #545b62;
        }
    </style>
<div class="container">
    <div class="row ">
        <div class="col-md-4">
            <div class="list-group">
                <a href="{{route('newData')}}" class="list-group-item list-group-item-action">Add New Data</a>
                <a href="{{route('result')}}" class="list-group-item list-group-item-action">Result</a>
                <a href="{{route('home')}}" class="list-group-item list-group-item-action disabled">Dashboard</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success">
                    <h4>Add New</h4>
                    <h5 id="status"></h5>
                </div>
                <div class="card-body">
                    <form id="addNewData">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text"
                                       class="form-control" name="name" id="name" placeholder="Name">
                                <small id="nameError" class="form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                <small id="emailError" class="form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input onchange="imagePreview(this);" name="photo" type="file" class="custom-file-input" id="photo">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose Picture</label>
                                    </div>
                                </div>
                                <small id="photoError" class="form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="video" class="col-sm-3 col-form-label">Video</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="video" type="file" class="custom-file-input" id="video">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose Video File</label>
                                    </div>
                                </div>
                                <small id="videoError" class="form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <img id="imagePreviewShow" src="" alt="Alauddin" height="100" width="100">
                            </div>
                            <div class="col-sm-9">
                                <button type="button" class="btn btn-block btn-outline-primary" id="storeData">Add Data</button>
                                <br>
                                <div class="progress" style="display: none;">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                         aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    var siteUrl = '{{URL::to('/')}}';
    var xhr = new XMLHttpRequest();
    xhr.open( "GET", siteUrl+"/public/Alauddin.jpg", true );
    xhr.responseType = "arraybuffer";

    xhr.onload = function( e ) {
        console.log(this.responseURL );
        var arrayBufferView = new Uint8Array( this.response );
        var blob = new Blob( [ arrayBufferView ], { type: "image/jpeg" } );
        var urlCreator = window.URL || window.webkitURL;
        var imageUrl = urlCreator.createObjectURL( blob );
        var img = document.getElementById( "imagePreviewShow" );
        img.src = imageUrl;
    };

    xhr.send();
    </script>
<script>
    function imagePreview(input)
    {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();

            reader.onload = function (e)
            {
                $('#imagePreviewShow').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function ()
    {
       //alert(5);
        $('body').addClass('fa');
        $('#storeData').click(function (e)
        {
            e.preventDefault();
            var name    = $('#name').val();
            var email   = $('#email').val();
            var photo   = $('#photo').val();
            var video   = $('#video').val();
            var expr = /^([a-z0-9_\.\-\+]{5,40})+\@(([a-z0-9\-]{4,40})+\.)+([a-z0-9]{2,5})+$/;
            var emailFormat = expr.test(email);
            if (name.length<3)
            {
                $('#nameError').show().html('Name Minimum 3 Character').fadeOut(4000);
                return false;
            }
            else if (!emailFormat)
            {
                $('#emailError').show().html('Email Address Not Valid').fadeOut(4000);
                return false;
            }
            else if (!photo.match(/(?:gif|jpeg|jpg|png|JPG|PNG|bmp)$/))
            {
                $('#photoError').show().html("Input file is not an image!").fadeOut(4000);
                return false;
            }
            else if (!video.match(/(?:mp4|avi|mkv|dat|3gp)$/))
            {
                $('#videoError').show().html("Input file is not an Video!").fadeOut(4000);
                return false;
            }
            else
            {
                var form = $('#addNewData')[0];
                var data = new FormData(form);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    xhr:function()
                    {
                      var xhr = new window.XMLHttpRequest();
                      xhr.upload.addEventListener("progress",function (e)
                      {
                          if (e.lengthComputable)
                          {
                              // console.log('Byte Loader '+e.loaded);
                              // console.log('Total Size '+e.total);
                              // console.log('Percentage '+(e.loaded/e.total));
                              var percent = Math.round((e.loaded/e.total)*100);
                              $('.progress').show();
                              $('.progress-bar').attr('aria-valuemin',percent).css('width',percent+'%').text(percent+'%');
                          }

                      });
                      return xhr;
                    },
                    type: "POST",
                    url: siteUrl + "/Add-New-Data",
                    mimeType: "multipart/form-data",
                    data: data,
                    processData: false,
                    contentType: false,
                    // cache: false,
                    // async: false,
                    dataType: "json",
                    success: function (data)
                    {
                        $('.progress').fadeOut(2000);
                        $('#status').show().html(data.success).fadeOut(4000);
                    }
                })
            }
        });
    });
</script>
</body>
</html>
