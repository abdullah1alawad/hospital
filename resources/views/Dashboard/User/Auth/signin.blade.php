@extends('Dashboard.layouts.master2')
@section('css')

    <style>
        .login-form {
            display: none
        }
    </style>

    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}"
          rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{URL::asset('Dashboard/img/media/login.png')}}"
                             class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"><a href="{{ url('/' . $page='index') }}"><img
                                                src="{{URL::asset('Dashboard/img/brand/favicon.png')}}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>{{trans('login_trans.welcome_back')}}</h2>
                                            <h5 class="font-weight-semibold mb-4">{{trans('login_trans.please_sign_in_to_continue')}}</h5>

                                            <div class="form-group">
                                                <label
                                                    for="exampleFormControlSelect1">{{trans('login_trans.choose_role')}}</label>
                                                <select class="form-control" id="sectionChooser">
                                                    <option value="" selected
                                                            disabled>  {{trans('login_trans.choose_role')}}</option>
                                                    <option
                                                        value="user">{{trans('login_trans.signin_as_patient')}}</option>
                                                    <option
                                                        value="admin">{{trans('login_trans.signin_as_admin')}}</option>
                                                </select>
                                            </div>

                                            {{--                                                          user login--}}

                                            <div class="login-form" id="user">
                                                <h5 class="font-weight-semibold mb-4">{{trans('login_trans.signin_as_patient')}}</h5>
                                                <form method="POST" action="{{ route('login.user') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{trans('login_trans.email')}}</label> <input
                                                            class="form-control" name="email"
                                                            placeholder="Enter your email"
                                                            type="email" :value="old('email')"
                                                            required autofocus
                                                            autocomplete="username">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{trans('login_trans.password')}}</label>
                                                        <input class="form-control"
                                                               placeholder="Enter your password"
                                                               type="password" name="password"
                                                               required
                                                               autocomplete="current-password">
                                                    </div>
                                                    <button class="btn btn-main-primary btn-block"
                                                            type="submit">{{trans('login_trans.signin')}}
                                                    </button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i
                                                                    class="fab fa-facebook-f"></i>
                                                                {{trans('login_trans.signup_with_facebook')}}
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i>{{trans('login_trans.signup_with_twitter')}}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">{{trans('login_trans.forget_password')}}</a>
                                                    </p>
                                                    <p> {{trans('login_trans.dont_have_an_account')}}<a
                                                            href="{{ url('/' . $page='signup') }}">{{trans('login_trans.create_an_account')}}
                                                        </a></p>
                                                </div>
                                            </div>

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            {{--                                            end user login --}}

                                            {{--                                            admin login--}}

                                            <div class="login-form" id="admin">
                                                <h5 class="font-weight-semibold mb-4"> {{trans('login_trans.signin_as_admin')}}
                                                </h5>
                                                <form method="POST" action="{{ route('login.admin') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{trans('login_trans.email')}}</label>
                                                        <input class="form-control" name="email"
                                                               placeholder="Enter your email"
                                                               type="email" :value="old('email')"
                                                               required autofocus
                                                               autocomplete="username">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{trans('login_trans.password')}}</label>
                                                        <input class="form-control"
                                                               placeholder="Enter your password"
                                                               type="password" name="password"
                                                               required
                                                               autocomplete="current-password">
                                                    </div>
                                                    <button class="btn btn-main-primary btn-block"
                                                            type="submit">{{trans('login_trans.signin')}}
                                                    </button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i
                                                                    class="fab fa-facebook-f"></i>
                                                                {{trans('login_trans.signup_with_facebook')}}
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> {{trans('login_trans.signup_with_twitter')}}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p>
                                                        <a href=""> {{trans('login_trans.forget_password')}}</a>
                                                    </p>
                                                    <p> {{trans('login_trans.dont_have_an_account')}} <a
                                                            href="{{ url('/' . $page='signup') }}"> {{trans('login_trans.create_an_account')}}
                                                        </a></p>
                                                </div>
                                            </div>

                                            {{--                                            end admin login--}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')

    <script>
        $('#sectionChooser').change(function () {
            var myID = $(this).val();
            $('.login-form').each(function () {
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>

@endsection
