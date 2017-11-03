@extends('admin_template')

@section('title', 'Create Lead')
@section('links')
<li class="header" style="color: white;">Leads</li>
<li style="background: #111111;"><a href="/lead/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Create Lead</span></a></li>
<li style="background: #111111;"><a href="/lead"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Leads</span></a></li>
<li style="background: #111111;"><a href="/lead/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Leads</span></a><hr /></li>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <form method="POST" action="/lead" role="form">
                {{ csrf_field() }}
            <div class="box box-primary"  style="margin-bottom: 3px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                        <br />
                        <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <select class="form-control" name="lead_title" required>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Dr">Dr.</option>
                                    <option value="Prof">Prof.</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="First Name *" name="lead_first_name" required>
                                 </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Last Name *" name="lead_last_name" required>
                                 </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="tel" class="form-control" placeholder="Mobile *" name="lead_mobile" required>
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email Address *" name="lead_email" required>
                                 </div>
                            </div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                  <select class="form-control select2" name="lead_company" required>
                                    <option selected disabled value="">Choose Account (Company) *</option>
                                    @foreach($accounts as $account)
                                    <option value="{{$account->id}}">{{$account->account_name}}</option>
                                    @endforeach  
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                    <input type="text" class="form-control" placeholder="Department *" name="lead_department" required>
                                 </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                  <input type="text" class="form-control" placeholder="Role (e.g. Operations Manager)*" name="lead_role" required>
                                </div>
                            </div>
                        </div>
                        
                        <br />
                        
                        <br />
                    </div>
                
                </div><!-- /.box -->
                <div class="box box-primary">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">MORE INFORMATION</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <select class="form-control" name="lead_status" required>
                                    <option selected="selected" disabled value="">Select Status *</option>
                                    <option value="New">New</option>
                                    <option value="Assigned">Assigned</option>
                                    <option value="In Process">In Process</option>
                                    <option value="Converted">Converted</option>
                                    <option value="Recycled">Recycled</option>
                                    <option value="Dead">Dead</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                  <select class="form-control" name="lead_source" required>
                                    <option selected="selected" disabled value="">Choose Lead Source *</option>
                                    <option value="Cold Call">Cold Call</option>
                                    <option value="Existing Customer">Existing Customer</option>
                                    <option value="Self Generated">Self Generated</option>
                                    <option value="Employee">Employee</option>
                                    <option value="Partner">Partner</option>
                                    <option value="Public Relations">Public Relations</option>
                                    <option value="Direct Mail">Direct Mail</option>
                                    <option value="Conference">Conference</option>
                                    <option value="Trade Show">Trade Show</option>
                                    <option value="Website">Website</option>
                                    <option value="Word of mouth">Word of mouth</option>
                                    <option value="Email">Email</option>
                                    <option value="Campaign">Campaign</option>
                                    <option value="Other">Other</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <textarea rows="5" cols="50" style="width: 100%;" placeholder="Status Description (optional)" name="lead_status_description"></textarea>
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <textarea rows="5" cols="50" style="width: 100%;" placeholder="Lead Source Description (optional)" name="lead_source_description"></textarea>
                                 </div>
                            </div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                  <select class="form-control select2" name="lead_assigned_to" required>
                                        <option selected="selected" disabled value="">Assigned to</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                  </select>
                                </div>
                            </div>
                        </div>
                        <input type="number" class="form-control" name="lead_last_modified_by" value="{{ Auth::user()->id }}" style="display:none">
                        <br />
                </div>
                
            </div><!-- /.box -->
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