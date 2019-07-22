<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>
        <link rel="shorcut icon" href="{{ URL::asset('assets/images/web/'.$zooq[0]['favicon']) }}" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous"/>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/zooq.admin.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css') }}"/>

        <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/zooq.admin.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
        <meta name="robots" content="noindex"/>
        <meta name="googlebot" content="noindex"/>
        <style>
        </style>
    </head>
    <body>

    @include('admin.header.header')
    @include('admin.navigation.sidebar')
    <div class="mainContent">
        <div class="content">
            @yield('main-app')
        </div>
        <div class="loading"></div>
    </div>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ModalLabel">Confirm Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <a class="btn btn-ok" id="btnOk" href="" data-dismiss="modal">OK</a>
                    <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form id="delete-form" method="post" action="">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title ModalLabel">Confirm Logout</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button class="btn btn-ok" type="submit" data-dismiss="modal">Delete</button>
                            <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </form> 
        </div>
        <div id="backdrop"></div>
        <audio id="notificationAudio" preload="auto" src="{{ URL::asset('assets/sound/intuition.mp3') }}" ></audio>
        <audio id="failedAudio" preload="auto" src="{{ URL::asset('assets/sound/fail.mp3') }}" ></audio>
    </body>
    <script>
    function playAudio(type){
        if(type === 'notif')
            document.getElementById('notificationAudio').play();

        if(type === 'fail')
            document.getElementById('failedAudio').play();    
    }
    // let readURL = ( input ) => {

    //     if (input.files) {
    //         let reader = new FileReader();

    //         reader.onload = (e) => {
    //             $('#choosen-image').attr('src', e.target.result);
    //         };

    //         reader.readAsDataURL( input.files[0] );

    //         $('#publish-button').attr('disabled', false);
    //         $('.file-detail').slideDown();
    //     }

    // }
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight){
                panel.style.maxHeight = null;
                
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            } 
        });
    }



    </script>

</html>
