@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-success">Login</div>
                <div class="card-body">
                    <form  id="login-form">
                        @csrf
                        <div class="form-group">
                            <div class="row align-items-center no-gutters">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope bigicon"></i></span>
                                        </div>
                                        <input name="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
                                        
                                        <span id="email-feedback" class="invalid-feedback" role="alert" style="display:none">
                                            <strong></strong>
                                        </span>
                                        
                                    </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row align-items-center no-gutters">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock bigicon"></i></span>
                                        </div>
                                        <input name="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                                        
                                        <span id="password-feedback" class="invalid-feedback" role="alert" style="display:none">
                                            <strong></strong>
                                        </span>                                        
                                    </div>
                            </div>
                        </div>

                        <div class="form-group">                                
                            <div class="row no-gutters">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                            </div>
                        </div>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                        </a>
                        <div class="form-group">                                
                            <div class="row align-items-center no-gutters float-right">
                                    <button class="btn btn-success" type="submit">Login</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#login-form').submit(function(event){
                event.preventDefault()
                var postData = {
                    'email': $('input[name=email]').val(),
                    'password': $('input[name=password]').val(),
                    'remember': $('input[name=remember]').is(':checked')
                }

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    type: 'POST',
                    url: '/login',
                    data: postData,
                    success: function(response){
                        console.log(response)
                        window.location.href=response.intended
                    },
                    error: function(response){
                        console.log(response)
                        $('#email-feedback').text(response.responseJSON.errors.email)
                        $('#email-feedback').show()
                    }
                })
            })
        })
    </script>
@endsection
