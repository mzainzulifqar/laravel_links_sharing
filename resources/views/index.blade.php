<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Community links</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="{{asset('theme/assets/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
	<!--bootstrap -->
	<link href="{{asset('theme/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- <link href="{{asset('theme/assets/plugins/summernote/summernote.css')}}" rel="stylesheet"> -->
	
    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="{{asset('theme/assets/plugins/material/material.min.css')}}">
	<link rel="stylesheet" href="{{asset('theme/assets/css/material_style.css')}}">

        <link href="{{asset('theme/assets/css/pages/animate_page.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('theme/assets/plugins/jquery-toast/dist/jquery.toast.min.css')}}">
	<!-- animation -->
	<!-- <link href="{{asset('theme/assets/css/pages/animate_page.css')}}" rel="stylesheet"> -->
	<!-- Template Styles -->
    <!-- <link href="{{asset('theme/assets/css/plugins.min.css')}}" rel="stylesheet" type="text/css" /> -->
    <link href="{{asset('theme/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/assets/css/theme-color.css')}}" rel="stylesheet" type="text/css" />
	<!-- favicon -->
    <link rel="shortcut icon" href="{{asset('theme/assets/img/favicon.ico')}}" /> 
 </head>

 <style>
   .votes:hover{
    background-color:#54DFC3!important;
    border:transparent;
    border-color: transparent!important; 
   }
 </style>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    
        <!-- start header -->
        <!-- end header -->
        <!-- start page container -->
        <div class="page-container" style="margin-top: 0px;">

            <!-- end sidebar menu --> 
			<!-- start page content -->
            <div class="page-content-wrapper" >
                <div class="page-content">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h2 style="margin:10px 0px;">Community Contribution</h2>
                        </div>
                        <div class="col-md-6">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>Info</header>
                                </div>
                                <div class="card-body ">
                         
                                  <!-- button-group -->
                                  <div class="btn-group">
                                    @if (!Auth::check())                    
                                      <a href="{{url('/login')}}" class="btn btn-primary">Sign Up To Contribute</a>
                                      @else
                                      <h4><strong>Welcome We'love people who share with other's!</strong></h4>
                                      @endif
                                   
                                      
                                  </div>
                                  <!-- button-group -->
                                  <div class="btn-group">

                                    
                                      {{-- <button type="button" class="btn btn-success">Most Popular</button>
                                      --}}
                                     
                                  </div>
                                  <!-- button-group -->
                                </div>
                            </div>
                        </div>
                    </div>
                   <!-- start widget -->
					
				
                    <div class="row">
							<div class="{{Auth::check() ? 'col-lg-8 col-md-8' : 'col-lg-12 col-md-12'}} col-sm-12 col-12">
                                      <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>Contributions</header>
                                    @if (count($links))
                                       
                                        <div class="btn-group">
                                      <button type="button" class="btn btn-primary">Most Recent</button>
                                   
                                      
                                  </div>
                                  <!-- button-group -->
                                  <div class="btn-group">
                                      <a href="{{ route('foobar',['sortBy'=>'popular']) }}" class="btn btn-success">Most Popular</a>
                                     
                                     
                                  </div>
                                  @if (isset($slug) && request()->url() == route('get_channel_related_links',$slug ) || request()->exists('sortBy'))
                                    
                                   <div class="btn-group">
                                      <a href="{{ route('foobar') }}" class="btn btn-warning">Clear Filters</a>
                                     
                                     
                                  </div>
                                   
                                  @endif
                                    @endif
                                    <div class="tools">
                                        <!-- <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a> -->
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                        <!-- <a class="t-close btn-color fa fa-times" href="javascript:;"></a> -->
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-wrap">
                                    @if (isset($links) && count($links))
                                        <div class="table-responsive">
                                            <table class="table display product-overview mb-30" id="support_table5">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        
                                                        <th>Channel</th>
                                                        
                                                        <th>Votes</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                       @foreach($links as $link)


                                                       
                                                    <tr>
                                                       
                                                        <td colspan="" style="font-weight: 500;font-size:18px;"><a href="{{$link->link}}" style="color:black;">{{$link->title}}</a><span style="display:block;font-size:14px;color:   grey;font-weight: 400;">Contributed by <strong>{{$link->user->name}}</strong> {{$link->created_at->diffForHumans()}}</span></td>
                                                      
                                                        <td>
                                                            <a href="{{ route('get_channel_related_links',$link->channel->slug) }}"><span class="label label-md label-{{$link->channel->color}}">{{$link->channel->title}}</span>
                                                          </a>

                                                        </td>
                                                       
                                                        <td>
                                                          <form id="form-{{$link->id}}" action="{{ route("vote",$link->id)}}" method="POST">
                                                            @csrf
                                                            
                                                            <button onclick="submit('form-{{$link->id}}')" data-toggle="button" class="za_btn btn btn-{{Auth::check() && Auth::user()->votedFor($link) ? 'danger' : 'default'}} votes"><i class="fa fa-thumbs-up "></i>{{$link->votes->count()}}</button>

                                                            </form>
                                                        </td>
                                                    </tr>

                                                    @endforeach()
                                                  
                                                    
                                                </tbody>
                                            </table>
                                            
                                            {{-- {{dd($links->appends('popular')->links())}} --}}
                                            {{$links->appends(request()->input())->links()}}
                                        </div>
                                          @else
                                                    <h2 class="text-center">No Contributions yet.! </h2>
                                                    @endif
                                    </div>  
                                </div>
                            </div>
                        </div>
                   
                            </div>
							</div>
                            @if (Auth::check())
                              
                            
							<div class="col-lg-4 col-md-4 col-sm-12 col-12">
                             <div class="card card-box">
                                <div class="card-head">
                                    <header>Link</header>
                                    
                                     <button id = "panel-button" 
                                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
                                           data-upgraded = ",MaterialButton">
                                           <i class = "material-icons">more_vert</i>
                                        </button>
                                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                           data-mdl-for = "panel-button">
                                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
                                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
                                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
                                        </ul>
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <form method="POST" action="{{url('community')}}">
                                            @csrf
                                           <div class="form-group">
                                            <label for="simpleFormEmail">Channel</label>
                                           <select name="channel_id" id="inputChannel_id" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" required="required">
                                            <option selected disabled>Please Select a Channel</option>
                                            @if (isset($channels))
                                                @foreach ($channels as $channel)
                                                    
                                                
                                               <option {{old('channel_id') == $channel->id ? 'selected' : ''}} value="{{$channel->id}}">{{$channel->title}}</option>
                                           
                                               @endforeach
                                            @endif
                                           </select>
                                            @if ($errors->has('channel_id'))
                                                <span style="color:red" role="alert">
                                                    <strong>{{ $errors->first('channel_id') }}</strong>
                                                </span>
                                             @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Title</label>
                                            <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" name="title" id="simpleFormEmail" placeholder="What is the title of your article" value="{{old('title')}}">
                                            @if ($errors->has('title'))
                                    <span  style="color:red" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleFormPassword">Link</label>
                                            <input type="text" class="form-control {{$errors->has('link') ? 'is-invalid' : ''}}" name="link" id="simpleFormPassword" placeholder="What is the URL?" value="{{old('link')}}">
                                           @if ($errors->has('link'))
                                    <span  style="color:red" role="alert">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <!-- <button type="submit" class="btn btn-primary btn-block">Submit</button> -->
                                        <button type="submit" class="btn deepPink btn-block btn-outline m-b-10">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                         </div>
						</div>
                            @endif
                </div>
            </div>
        </div>
     
                  
            <!-- end page content -->
            <!-- start chat sidebar -->
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2019 &copy; Template By
            <a href="mailto:zainzulifqar21@gmail.com" target="_top" class="makerCss">Zain Zulifqar</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->
    <!-- </div> -->
    <!-- start js include path -->
    <script src="{{asset('theme/assets/plugins/jquery/jquery.min.js')}}" ></script>
   
	<script src="{{asset('theme/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('theme/assets/plugins/bootstrap/js/bootstrap.min.js')}}" ></script>
   
    <!-- Common js-->
	<script src="{{asset('theme/assets/js/app.js')}}" ></script>

    {{-- notification js --}}
    <script src="{{asset('theme/assets/plugins/jquery-toast/dist/jquery.toast.min.js')}}" ></script>
    <script src="{{asset('theme/assets/plugins/jquery-toast/dist/toast.js')}}" ></script>
    {{-- end here --}}
    <!-- material -->
    <script src="{{asset('theme/assets/plugins/material/material.min.js')}}"></script>
    <!-- animation -->

    <script>
        $(document).ready(function()
        {
          
          $('.za_btn').click(function(){

              $('.za_btn').each(function(){
                $('.za_btn').attr("disabled",true);
              });
            
          });

         @if (Session::has('success')) 
         
          $.toast().reset('all');
          $.toast({
                heading: 'Success',
                text: '{{Session::get('success')}}',
                position: 'bottom-center',
                stack: false
            })

          @endif
      });
       
    </script>
   
    <!-- end js include path -->
  </body>

</html>