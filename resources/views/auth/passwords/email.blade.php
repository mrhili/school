@extends('back.layouts.login')

@section('content')




  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif


    <div class="login-box-body">
      <p class="login-box-msg">S'enregistrer'</p>

      <form class="" method="POST" action="{{ route('password.email') }}">
      {{ csrf_field() }}

        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email" required autofocus>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif

        </div>


        <div class="row">
          <div class="col-xs-8">

          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Envoyer</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->
      <a href="{{ route('login') }}" class="text-center">Login</a>

    </div>



































  {{--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

--}}
@endsection
