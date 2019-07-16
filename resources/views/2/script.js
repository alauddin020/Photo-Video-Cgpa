// The browser detection
// Opera 8.0+
    var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

    // Firefox 1.0+
    var isFirefox = typeof InstallTrigger !== 'undefined';

    // Safari 3.0+ "[object HTMLElementConstructor]"
    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);

    // Internet Explorer 6-11
    var isIE = /*@cc_on!@*/false || !!document.documentMode;

    // Edge 20+
    var isEdge = !isIE && !!window.StyleMedia;

    // Chrome 1+
    var isChrome = !!window.chrome && !!window.chrome.webstore;

    // Blink engine detection
    var isBlink = (isChrome || isOpera) && !!window.CSS;
var video = document.querySelector('video');
var seek = document.querySelector('.seekbar');
var seekbarCon = document.querySelector('.seekbar-con');
var playPause = document.querySelector('.play-pause');
var videoCon = document.querySelector('.video-con');
var currentVol = $('.currentVol').val();
var volume = $('.volume-slider-con');
window.onload = init;
function init () {
    video.addEventListener('timeupdate',seekTime);
    video.addEventListener('click',play);
    video.removeAttribute('controls');
    playPause.addEventListener('click',play);
}
function seekTime () {
    var width = 100 / video.duration * video.currentTime;
    seek.style.width = width + '%';
    // The time
    var durtime = document.querySelector(".durtime");
    var curtime = document.querySelector(".curtime");
    var sec_num = Math.floor(video.currentTime); // don't forget the second param
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}

    // The durtime
    var sec_dur = Math.floor(video.duration); // don't forget the second param
    var hoursdur   = Math.floor(sec_dur / 3600);
    var minutesdur = Math.floor((sec_dur - (hoursdur * 3600)) / 60);
    var secondsdur = sec_dur - (hoursdur * 3600) - (minutesdur * 60);

    if (hoursdur   < 10) {hoursdur   = "0"+hoursdur;}
    if (minutesdur < 10) {minutesdur = "0"+minutesdur;}
    if (secondsdur < 10) {secondsdur = "0"+secondsdur;}
        durtime.innerHTML = hoursdur+':'+minutesdur+':'+secondsdur;
        curtime.innerHTML = hours+':'+minutes+':'+seconds;
}
function play(){
   if(video.paused){
        video.play();
        playPause.classList = 'play-pause';
        playPause.style.backgroundImage = 'url(img/pause.png)';
   }else{
       video.pause();
       playPause.classList += ' back';
       playPause.style.backgroundImage = 'url(img/play.png)';
   }
}
// The jquery Era
// The volume effect
// The loader
video.on('wating',function(){
    $(".loader-con").css('display','block');
});
video.on('canplay',function(){
     $(".loader-con").css('display','none');
});
// The buffer bar
video.on('progress',function(){
    if(video.buffered.length > 0){
        var percent = (video.buffered.end(0) / video.duration) * 100;
        $(".loadbar").css('width',percent+'%');
    }
});
$(".volume-con").hover(function(){
    $(".volume-slider-con").css({'width':'100px','opacity':'1',});
},function(){
    $(".volume-slider-con").css({'width':'0px','opacity':'0',});
});
//The seek drag
    var timeDrag = false; /* check for drag event */
    $('.seekbar-con').on('mousedown', function(e) {
        timeDrag = true;
        video.pause();
        updatebar(e.pageX);
    });
    $(document).on('mouseup', function(e) {
        if (timeDrag) {
            timeDrag = false;
            updatebar(e.pageX);
            $('.currentVol').val(e.pageX);
            video.play();
        }
    });
    $(document).on('mousemove', function(e) {
        if (timeDrag) {
            updatebar(e.pageX);
            $('.currentVol').val(e.pageX);
        }
    });
    var updatebar = function(x) {
        var progress = $('.seekbar-con');

        //calculate drag position
        //and update video currenttime
        //as well as progress bar
        var maxduration = video.duration;
        var position = x - progress.offset().left;
        var percentage = 100 * position / progress.width();
        if (percentage > 100) {
            percentage = 100;
        }
        if (percentage < 0) {
            percentage = 0;
        }
        $('.seekbar').css('width', percentage + '%');
        video.currentTime = maxduration * percentage / 100;
    };
//VOLUME BAR
    //volume bar event
    var volumeDrag = false;
    $('.volume-slider-con').on('mousedown', function(e) {
        volumeDrag = true;
        video.muted = false;
        $("#mute").removeAttr('class');
        $("#mute").attr('class', 'fa fa-volume-up');
        $('.currentVol').val(e.pageX);
        updateVolume(e.pageX);
    });
    $(document).on('mouseup', function(e) {
        if (volumeDrag) {
            volumeDrag = false;
            updateVolume(e.pageX);
        }
    });
    $(document).on('mousemove', function(e) {
        if (volumeDrag) {
            updateVolume(e.pageX);
        }
    });
    var updateVolume = function(x, vol) {
        var volume = $('.volume-slider-con');
        var percentage;
        //if only volume have specificed
        //then direct update volume
        if (vol) {
            percentage = vol * 100;
        } else {
            var position = x - volume.offset().left;
            percentage = 100 * position / volume.width();
        }

        if (percentage > 100) {
            percentage = 100;
        }
        if (percentage < 0) {
            percentage = 0;
        }

        //update volume bar and video volume
        $('.volume-slider').css('width', percentage + '%');
        video.volume = percentage / 100;

        //change sound icon based on volume
         if (video.volume == 0) {
            $("#mute").removeAttr('class');
            $("#mute").attr('class', 'fa fa-volume-off');
        }
        if (video.volume === 1) {
        $("#mute").removeAttr('class');
        $("#mute").attr('class', 'fa fa-volume-up');
        }

    };
        //The full screen
    $('.fullscreen').on('click', function() {
        // if already full screen; exit
        // else go fullscreen
        if (
            document.fullscreenElement ||
            document.webkitFullscreenElement ||
            document.mozFullScreenElement ||
            document.msFullscreenElement
        ) {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        } else {
            element = $('.video-con').get(0);
            if (element.requestFullscreen) {
                element.requestFullscreen();
            } else if (element.mozRequestFullScreen) {
                element.mozRequestFullScreen();
            } else if (element.webkitRequestFullscreen) {
                element.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            } else if (element.msRequestFullscreen) {
                element.msRequestFullscreen();
            }
        }
    });
    $(".fullscreen").click(function() {
        $("video").toggleClass("fit");
    });
    //Full screen detection
  //Now this thing is croos browsered
$(document).on('mozfullscreenchange webkitfullscreenchange fullscreenchange msfullscreenchange', function() {
    "use strict";
    this.fullScreenMode = !this.fullScreenMode;

    //-Check for full screen mode and do something..
    simulateFullScreen();
});
var simulateFullScreen = function() {
    //Full screen out
    if (this.fullScreenMode) {
        $(".loader-con").removeClass('align');
        $("video").removeClass('fit');
        $("#fullscreen").removeAttr('class');
        $("#fullscreen").attr('class','fa fa-expand');
        $(".controls-con").width("100%");
        $(".volume-con").css('transform','translate(0px)');
        $(".controls-con").removeClass('things-chrome');
        $(".controls-con").removeClass('things-fire');
        $(".loader-con").removeClass('alignLoader');
         $(".seprate-align").css('margin-left','97.5%');
}
    //Full screen in
    else {
    $(".loader-con").addClass('alignLoader');
     $(".loader-con").addClass('align');
     $("#fullscreen").removeAttr('class');
     $("#fullscreen").attr('class','fa fa-compress');
     $("video").addClass('fit');
     $(".controls-con").width(window.outerWidth+16);
     if(isChrome){
       $(".controls-con").addClass('things-chrome');
       $(".seprate-align").css('margin-left','98.5%');
     }
     if(isFirefox){
        $(".controls-con").addClass('things-fire');
        $(".volume-con").css('transform','translate(-20px)');
     }
}
    this.fullScreenMode = !this.fullScreenMode;
};
// The key support
$(document).on('keydown',function(e){
    if(e.which === 39){
        video.currentTime += 5;
    }
    if(e.which === 37){
         video.currentTime -= 5;
    }
    if (e.which===38) { //keyup
         if (currentVol<100)
         {
            currentVol = parseInt(currentVol)+5;
            var percentage;
                percentage = 100 * currentVol / 100;

            $('.volume-slider').css('width', percentage + '%');
            video.volume = percentage / 100;

            //change sound icon based on volume
        }
        if (currentVol == 0) {
                $("#mute").removeAttr('class');
                $("#mute").attr('class', 'fa fa-volume-off');
            }
            if (currentVol>1) {
            $("#mute").removeAttr('class');
            $("#mute").attr('class', 'fa fa-volume-up');
            }
    }
    if (e.which===40) {
        if (currentVol!=0 )
         {
            currentVol = parseInt(currentVol)-5;

            var percentage;
                percentage = 100 * currentVol / 100;

            $('.volume-slider').css('width', percentage + '%');
            video.volume = percentage / 100;

            //change sound icon based on volume
        }
        if (currentVol == 0) {
                $("#mute").removeAttr('class');
                $("#mute").attr('class', 'fa fa-volume-off');
            }
            if (currentVol > 1) {
            $("#mute").removeAttr('class');
            $("#mute").attr('class', 'fa fa-volume-up');
            }
    }
    if (e.which===13)
    {
        $('.fullscreen').click();
    }
    if(e.which === 32){
        if(video.paused){
            video.play();
          playPause.style.backgroundImage = 'url(img/pause.png)';
    playPause.classList = 'play-pause';
        }else{

playPause.style.backgroundImage = 'url(img/play.png)';
    playPause.classList += ' back';
            video.pause();
        }
    }
});
