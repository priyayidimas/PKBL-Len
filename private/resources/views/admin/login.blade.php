<head>
    <meta charset="utf-8">
    <title>PKBL .NET &middot; WELCOME</title>
    <link rel="shortcut icon" href="{{{ asset('/assets/img/len.ico') }}}">    
    <link rel="stylesheet" href="{{URL::asset('/assets/css/materialize.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{URL::asset('/assets/css/gooicon.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{URL::asset('/assets/css/style.css')}}">
    <script src="{{URL::asset('/assets/js/jquery.min.js')}}" charset="utf-8"></script>
  <script>
    $(document).ready(function(){
        $('.slider').slider();
      });
  </script>
  <style>
    .fex{
      position: absolute;
      height: calc(100vh);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      z-index: 997;
      top: 0;
      width: 100%;
    }
    .ax{
      position: absolute;
      height: calc(100vh);
      z-index: 996;
      top: 0;
      width: 100%;
    }
  
    .tint{
        background: rgba(0, 0, 0, 0.3);
        z-index: 998;
        position: absolute;
    }
  
      /* .slides li img {
          position: relative;
          display:inline-block;
      }
      .slides li img {
          content: '';
          display: block;
          position: absolute;
          background-image: linear-gradient(to top left, #ff6600 -3%, #ffcc66 48%);
          opacity: .6; 
      } */
      .a::before {
          content: '';
          position: absolute;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          /* background-image: linear-gradient(to bottom right,#002f4b,#ff6600); */
          background-image: linear-gradient(to bottom right, #99ccff 36%, #0066ff 108%);
          opacity: .6; 
      }
      /* label focus color */
     .input-field input[type=text]:focus + label {
       color: rgb(63, 0, 255);
     }
     /* label underline focus color */
     .input-field input[type=text]:focus {
       border-bottom: 1px solid blue;
       box-shadow: 0 1px 0 0 blue;
     }
  
  /* icon prefix focus color */
     .input-field .prefix.active {
       color: rgb(63, 0, 255);
     }
  
     .waves-effect.waves-pol .waves-ripple {
       /* The alpha value allows the text and background color
       of the button to still show through. */
        background-color: rgba(63, 0, 255, 0.9);
      }

    #card-alert .card-content {
    padding: 10px 20px;
  }
  
  #card-alert i {
    font-size: 20px;
    position: relative;
    top: 2px;
  }
  
  #card-alert .alert-circle {
    display: inline-block;
    width: 40px;
    white-space: nowrap;
    border-radius: 1000px;
    vertical-align: bottom;
    position: relative;
    top: -5px;
    left: -2px;
  }
  
  #card-alert .single-alert {
    line-height: 42px;
  }
  
  #card-alert button {
    background: none;
    border: none;
    position: absolute;
    top: 5px;
    right: 10px;
    font-size: 20px;
    color: #fff;
  }
  
  #card-alert .card .card-content {
    padding: 20px 40px 20px 20px;
  }
  
  #card-alert .card-action i {
    top: 0;
    margin: 0;
  }
  
  </style>
  
  <body>
     <div class="tint"></div>
      <div class="slider fullscreen">
        <ul class="slides">
          <li class="a">
            <img src="{{URL::asset('/assets/img/Presiden.jpg')}}"> <!-- random image -->
          </li>
          <li class="a">
            <img src="{{URL::asset('/assets/img/PKBL1.jpg')}}"> <!-- random image -->
          </li>
          <li class="a">
            <img src="{{URL::asset('/assets/img/PKBL2.jpg')}}"> <!-- random image -->
          </li>
          <li class="a">
            <img src="{{URL::asset('/assets/img/Kereta.jpg')}}"> <!-- random image -->
          </li>
        </ul>
      </div>
      <div class="ax pt-1">
              <div class="row en-container pt-2">
                  <div class="col s12">
                    
                       
      
                          <div class="row valign-wrapper">
                              <div class="col s4">
                                  <img class="responsive-img" src="{{URL::to('assets/img/Len.PNG')}}" alt="" style="max-height: 100px">
                              </div>  
                              <div class="col s5">
                                <div class="valign-wrapper">
                                  {{-- <p class="flow-text center"> SELAMAT DATANG DI APLIKASI CORCOM .NET </p> --}}
                                </div>
                              </div>
                              <div class="col s3">
                                  <img class="responsive-img" src="{{URL::to('assets/img/BUMN.PNG')}}" alt="" style="max-height: 100px">
                              </div>  
                          </div> 
      
                      </div>
                    </div>
                    
                   
                
          </div>
          <div class="fex">
            <div class="row">
                  
                <div class="card-panel blue-text text-lighten-5 z-depth-3" style="background: rgba(0,0,0,0.333)">
                  <span class="blue-text text-lighten-5"><h5><img src="{{URL::to('assets/img/Len.PNG')}}" alt="" height="30" width="20" > PKBL LEN &middot; Login &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h5></span>
                    <div class="divider blue"></div>
                    @if (Session::has('msg'))
                    <div id="card-alert" class="card {{Session::get('color')}}">
                      <div class="card-content white-text">
                          <p>{{Session::get('msg')}}</p>
                      </div>
                      <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    @endif
                    
            
              
                    <form action="{{url("/login")}}" method="POST">
                        {{-- {{ csrf_field() }} --}}
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            
                      <div class="input-field">
                        <i class="material-icons prefix">email</i>
                        <input id="icon_prefix" type="text" class="validate" name="email">
                        <label for="icon_prefix" class="blue-text text-lighten-5">Email</label>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="icon_prefix" type="password" class="validate" name="password">
                        <label for="icon_prefix" class="blue-text text-lighten-5">Password</label>
                      </div>
                      <button type="submit" class="btn waves-effect waves-pol waves-ripple blue">Submit</button>
                      {{-- <button type="button" class="btn-flat waves-effect waves-pol waves-ripple blue-text" data-toggle="modal" data-target="#addModal">Register</button> --}}
                    </form></div>
            
                    
                      
                    
            
                </div>
      
            </div>
          </div>
          
        
        </body>
  
  <script src="{{URL::asset('/assets/js/materialize.min.js')}}" charset="utf-8"></script>
  <script>
    $("#card-alert .close").click(function() {
        $(this).closest('#card-alert').fadeOut('slow');
    });
  </script>
  </html>
  