@extends('admin_template')

@section('title', 'Create Account')
@section('subtitle', 'All fields are required')

@section('links')
<li class="header" style="color: white;">Accounts</li>
@if (Auth::user()->account_type == 'Admin')
<li style="background: #111111;"><a href="/account/create"><span><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;&nbsp;Create Account</span></a></li>
@endif
<li style="background: #111111;"><a href="/account"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Accounts</span></a><hr /></li>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">CREATE</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times" style="color: white;"></i></button>
                    </div>
                </div>
                <form method="POST" action="/account" role="form">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Name" name="account_name" required>
                         </div><br />
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                            <input type="text" class="form-control" placeholder="Industry" name="account_industry" required>
                         </div><br />
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="tel" class="form-control" placeholder="Office Phone" name="account_phone" required>
                         </div>
                        <br />
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Email Address" name="account_email" required> 
                         </div>
                        <br /><br />
                        <span>Address</span>
                        <hr />
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-road"></i></span>
                            <input type="text" class="form-control" placeholder="Street" name="account_address_street" required>
                         </div><br />
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                            <input type="text" class="form-control" placeholder="City" name="account_address_city" required>
                         </div><br />
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <input type="text" class="form-control" placeholder="State" name="account_address_state" required>
                         </div><br />
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-flag-o"></i></span>
                            <input type="text" class="form-control" placeholder="Country" name="account_address_country" required>
                         </div><br />
                        <input type="number" class="form-control" name="account_last_modified_by" value="{{ Auth::user()->id }}" style="display:none">
                        <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <div class="input-group">
                                    <input type="submit" class="form-control btn bg-navy btn-flat" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SAVE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="input-group">
                                    <input type="reset" class="form-control btn bg-navy btn-flat" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RESET&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                                  </div>
                            </div>
                        </div>
                        
                        <br />
                        

                    </div>
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->

@endsection