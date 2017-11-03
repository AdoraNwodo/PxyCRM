@extends('admin_template')

@section('title')
ACCOUNT: {{$accounts->account_name}}
@endsection

@section('links')
<li class="header" style="color: white;">Accounts</li>
@if (Auth::user()->account_type == 'Admin')
<li style="background: #111111;"><a href="/account/create"><span><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;&nbsp;Create Account</span></a></li>
@endif
<li style="background: #111111;"><a href="/account"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Accounts</span></a><hr /></li>
@endsection

@section('content')
    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="col-md-12">
            <a class="btn bg-navy btn-flat" href="/account/edit/{{$accounts->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;EDIT ACCOUNT</a>
            <a class="btn bg-navy btn-flat" href="/account/create" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;NEW ACCOUNT</a>
            <a class="btn bg-navy btn-flat" href="/account" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;ALL ACCOUNTS</a>
            @if(Auth::user()->account_type == "Admin")
            <a class="btn bg-navy btn-flat" href="/account/audit/{{$accounts->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;" target="blank_"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;VIEW CHANGE LOG</a>
            @endif
        </div>
    </div>
    <div class='row'>
        <br />
        <div class='col-md-12'>
            <!-- Box -->
            <form>
                <div class="box box-primary" style="margin-bottom: 3px;">
                    <div class="box-header with-border" style="background-color: #428bca;">
                        <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Account Name</label>
                            <input type="text" class="form-control" placeholder="Account Name" name="account_name" disabled value="{{$accounts->account_name}}">
                         </div>
                        <div class="form-group">
                            <label>Industry</label>
                            <input type="text" class="form-control" placeholder="Industry" name="account_industry" disabled value="{{$accounts->account_industry}}">
                         </div>
                        <div class="form-group">
                            <label>Office Phone</label>
                            <input type="text" class="form-control" placeholder="Office Phone" name="account_phone" disabled value="{{$accounts->account_phone}}">
                         </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control" placeholder="Email Address" name="account_email" disabled value="{{$accounts->account_email}}"> 
                         </div>
                        <br /><br />
                      </div>
                   </div><!-- /.box -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="background-color: #428bca;">
                        <h3 class="box-title" style="color: white;">ADDRESS</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Address" name="account_address_street" disabled value="{{$accounts->account_address_street}}">
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" placeholder="City" name="account_address_city" disabled value="{{$accounts->account_address_city}}">
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" placeholder="State" name="account_address_state" disabled value="{{$accounts->account_address_state}}">
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control" placeholder="Country" name="account_address_country" disabled value="{{$accounts->account_address_country}}">
                         </div>                        
                        <br />
                      </div>
                </div><!-- /.box -->
                
                <div class="box box-primary">
                    <div class="box-header with-border" style="background-color: #428bca;">
                        <h3 class="box-title" style="color: white;">TIMESTAMP</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Created At</label>
                            <input type="text" class="form-control" placeholder="Created At" name="created_at" disabled value="{{$accounts->created_at}}">
                        </div>
                        <div class="form-group">
                            <label>Updated At</label>
                            <input type="text" class="form-control" placeholder="Updated At" name="updated_at" disabled value="{{$accounts->updated_at}}">
                        </div>
                        <div class="form-group">
                            <label>Last Modified By</label>
                            <input type="text" class="form-control" placeholder="Last Updated By" name="updated_by" disabled value="{{$accounts->name}}">
                        </div>
                        <br />
                      </div>
                </div><!-- /.box -->
                </form>
           
        </div><!-- /.col -->

    </div><!-- /.row -->

@endsection