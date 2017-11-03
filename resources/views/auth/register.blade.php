@extends('admin_template')

@section('title', 'CREATE NEW USER')
@section('content')
<div >
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                                <input id="department" type="text" class="form-control" name="department" value="{{ old('department') }}" required>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('account_type') ? ' has-error' : '' }}">
                            <label for="account_type" class="col-md-4 control-label">Account Type</label>

                            <div class="col-md-6">
                                <select id="account_type" class="form-control" name="account_type" value="{{ old('account_type') }}" required>
                                    <option value="" disabled selected>Choose Account type</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>

                                @if ($errors->has('account_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn bg-navy btn-flat" style="padding: 5px; padding-left: 25px; padding-right: 25px; font-size: 17px;">
                                    SUBMIT
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
