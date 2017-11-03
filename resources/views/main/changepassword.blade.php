@extends('admin_template')

@section('title', 'CHANGE PASSWORD')
@section('content')
<div >
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/new') }}">
                        {{ csrf_field() }}

                        <input style="display: none;" type="number" id="currentuserid" value="{{Auth::user()->id}}">   
                        <input style="display: none;" type="text" id="oldpassword" value="{{Auth::user()->password}}">   

                        <div class="form-group">
                            <label for="password" class="col-md-4 col-sm-4 col-xs-4 control-label">Old Password</label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <input id="oldpasswordconfirm" type="password" id="confirmoldpassword" class="form-control" name="old_password" required>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-6">
                                <span id="oldpasswordcorrect" class="glyphicon glyphicon-remove" style="color:#FF0004; padding-top: 10px;"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="col-md-4 col-sm-4 col-xs-4 control-label">New Password</label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <input id="new_password" type="password" class="form-control" name="password" required>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <span id="morethansix" class="glyphicon glyphicon-remove" style="color:#FF0004; padding-top: 10px;"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 col-sm-4 col-xs-4 control-label">Confirm Password</label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <input id="new_password_confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <span id="newpasswordcorrect" class="glyphicon glyphicon-remove" style="color:#FF0004; padding-top: 10px;"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn bg-navy btn-flat" id="changepassword" style="padding: 5px; padding-left: 25px; padding-right: 25px; font-size: 17px;" disabled>
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
