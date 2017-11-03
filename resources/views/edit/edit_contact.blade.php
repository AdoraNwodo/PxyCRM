@extends('admin_template')

@section('title', 'EDIT CONTACT')
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
            <div class="box box-primary">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times" style="color: white;"></i></button>
                    </div>
                </div>
                <form method="POST" action="/contact/edit/{{$contact->id}}" role="form">
                    {{ csrf_field() }}
                    {{method_field("PUT")}}
                    <div class="box-body">
                        <br />
                        <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <div class="form-group">
                                  <label>&nbsp;</label>
                                  <select class="form-control" name="contact_title" required>
                                    <option value="{{$contact->contact_title}}" selected>{{$contact->contact_title}}</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Prof.">Prof.</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" name="contact_first_name" value="{{$contact->contact_first_name}}" id="firstname" required>
                                 </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="contact_last_name" value="{{$contact->contact_last_name}}" id="lastname" required>
                                 </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="tel" class="form-control" placeholder="Mobile" name="contact_mobile" value="{{$contact->contact_mobile}}" id="mobile" required>
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" placeholder="Email Address" name="contact_email" value="{{$contact->contact_email}}" id="email" required>
                                 </div>
                            </div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="company">Company</label>
                                  <select name="contact_company" class="form-control select2" id="company" required>
                                    <option value="{{$contact->contact_company}}" selected>{{$acc_name->account_name}}</option>
                                    @foreach($accounts as $account)
                                    <option value="{{$account->id}}">{{$account->account_name}}</option>
                                    @endforeach  
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <input type="text" class="form-control" placeholder="Department" name="contact_department" id="department" required value="{{$contact->contact_department}}">
                                 </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="role">Role</label>
                                  <input type="text" class="form-control" placeholder="Role" name="contact_role" id="role" required value="{{$contact->contact_role}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="role">Assigned To</label>
                                    <select class="form-control select2" style="width: 100%;" required name="contact_assigned_to">
                                        <option selected="selected" value="{{$contact->contact_assigned_to}}">{{$usr_name->name}}</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="wstatus">Work Status</label>
                              <select class="form-control" name="contact_status" id="wstatus" required>
                                <option value="{{$contact->contact_status}}">{{$contact->contact_status}}</option>
                                <option value="Working">Working</option>
                                <option value="Not Working - Retired">Not Working - Retired</option>
                                <option value="Not Working - Other">Not Working - Other</option>
                              </select>
                        </div>
                        <input type="number" class="form-control" name="contact_last_modified_by" value="{{ Auth::user()->id }}" style="display:none">
                        <br />
                        
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
                        

                    </div>
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->

@endsection