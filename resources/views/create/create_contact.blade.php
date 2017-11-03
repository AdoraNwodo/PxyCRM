@extends('admin_template')

@section('title', 'Create Contact')
@section('subtitle', 'All fields are required')
@section('links')
<li class="header" style="color: white;">Contacts</li>
<li style="background: #111111;"><a href="/contact/create"><span><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;&nbsp;Create Contact</span></a></li>
<li style="background: #111111;"><a href="/contact"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Contacts</span></a></li>
<li style="background: #111111;"><a href="/contact/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Contacts</span></a><hr /></li>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <form method="POST" action="/contact" role="form">
            <div class="box box-primary" style="margin-bottom: 3px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">CREATE</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times" style="color: white;"></i></button>
                    </div>
                </div>
                
                    {{ csrf_field() }}
                    <div class="box-body">
                        <br />
                        <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <select class="form-control" name="contact_title" required>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Prof.">Prof.</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="First Name" name="contact_first_name" required>
                                 </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Last Name" name="contact_last_name" required>
                                 </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="tel" class="form-control" placeholder="Mobile" name="contact_mobile" required>
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email Address" name="contact_email" required>
                                 </div>
                            </div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                  <select name="contact_company" class="form-control select2" required>
                                    <option value="Company">Company</option>
                                    @foreach($accounts as $account)
                                    <option value="{{$account->id}}">{{$account->account_name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                    <input type="text" class="form-control" placeholder="Department" name="contact_department" required>
                                 </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                  <input type="text" class="form-control" placeholder="Role" name="contact_role" required>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="form-group" style="display: none;">
                          <div class="radio">
                            <label>
                              <input type="radio" name="contact_status" value="Working" checked>
                              Working
                            </label>
                          </div>
                        </div>
                        <input type="number" class="form-control" name="contact_last_modified_by" value="{{ Auth::user()->id }}" style="display:none">
                        <br />
                        
                        
                        

                    </div>
            </div><!-- /.box -->
            <div class="box box-primary">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">ASSIGNED TO</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                          <div class="form-group">
                            <select class="form-control select2" style="width: 100%;" required name="contact_assigned_to">
                                <option selected="selected" disabled value="">Choose User</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                          </div>        
                    </div>
                 </div>
                <br />
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
                
            </form>
        </div><!-- /.col -->

    </div><!-- /.row -->

@endsection