@extends('admin_template')

@section('title', 'EDIT ACCOUNT')

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
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times" style="color: white;"></i></button>
                    </div>
                </div>
                <form method="POST" action="/account/edit/{{$account->id}}" role="form">
                    {{ csrf_field() }}
                    {{method_field("PUT")}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="account_name">Account Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="account_name" id="account_name" value="{{$account->account_name}}" required>
                         </div>
                        <div class="form-group">
                            <label for="account_industry">Industry</label>
                            <input type="text" class="form-control" placeholder="Industry" name="account_industry" id="account_industry" value="{{$account->account_industry}}" required>
                        </div>
                        <div class="form-group">
                            <label for="account_phone">Office Phone</label>
                            <input type="tel" class="form-control" placeholder="Office Phone" name="account_phone" id="account_phone" required value="{{$account->account_phone}}">
                        </div>
                        <div class="form-group">
                            <label for="account_email">Email</label>
                            <input type="email" class="form-control" placeholder="Email Address" name="account_email" id="account_email" required value="{{$account->account_email}}"> 
                        </div>
                        <div class="form-group">
                            <label for="account_address_street">Address</label>
                            <input type="text" class="form-control" placeholder="Street" name="account_address_street" id="account_address_street" required value="{{$account->account_address_street}}">
                        </div>
                        <div class="form-group">
                            <label for="account_address_city">City</label>
                            <input type="text" class="form-control" placeholder="City" name="account_address_city" id="account_address_city" required value="{{$account->account_address_city}}">
                         </div>
                        <div class="form-group">
                            <label for="account_address_state">State</label>
                            <input type="text" class="form-control" placeholder="State" name="account_address_state" id="account_address_state" required value="{{$account->account_address_state}}">
                         </div>
                        <div class="form-group">
                            <label for="account_address_country">Country</label>
                            <input type="text" class="form-control" placeholder="Country" name="account_address_country" id="account_address_country" required value="{{$account->account_address_country}}">
                        </div>
                        
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
                    </div>
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->

@endsection