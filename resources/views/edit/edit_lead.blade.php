@extends('admin_template')

@section('title', 'EDIT LEAD')
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
            <form method="POST" action="/lead/edit/{{$lead->id}}" role="form">
                {{ csrf_field() }}
                {{method_field("PUT")}}
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
                                <div class="form-group">
                                  <label>&nbsp;</label>
                                  <select class="form-control" name="lead_title" required>
                                    <option selected value="{{$lead->lead_title}}">{{$lead->lead_title}}</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Dr">Dr.</option>
                                    <option value="Prof">Prof.</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="form-group">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name*" id="fname" name="lead_first_name" required value="{{$lead->lead_first_name}}">
                                 </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="form-group">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name *" id="lname" name="lead_last_name" required value="{{$lead->lead_last_name}}">
                                 </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="tel" class="form-control" placeholder="Mobile *" id="mobile" name="lead_mobile" required value="{{$lead->lead_mobile}}">
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="mail">Email</label>
                                    <input type="email" class="form-control" placeholder="Email Address *" name="lead_email" id="mail" required value="{{$lead->lead_email}}">
                                 </div>
                            </div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="company">Company</label>
                                  <select class="form-control" name="lead_company" required>
                                    <option value="{{$lead->lead_company}}" selected>{{$company->account_name}}</option>
                                    @foreach($accounts as $account)
                                    <option value="{{$account->id}}">{{$account->account_name}}</option>
                                    @endforeach    
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="dept">Department</label>
                                    <input type="text" class="form-control" placeholder="Department *" name="lead_department" id="dept" required value="{{$lead->lead_department}}">
                                 </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="role">Role</label>
                                  <input type="text" class="form-control" placeholder="Role (e.g. Operations Manager)*" name="lead_role" id="role" required value="{{$lead->lead_role}}" >
                                </div>
                            </div>
                        </div>
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
                                <div class="form-group">
                                  <label for="status">Choose Status</label>
                                  <select class="form-control" name="lead_status" id="status" required>
                                    <option selected="selected" value="{{$lead->lead_status}}">{{$lead->lead_status}}</option>
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
                                <div class="form-group">
                                  <label for="source">Choose Lead Source</label>
                                  <select class="form-control" name="lead_source" id="source" required>
                                    <option selected="selected" value="{{$lead->lead_source}}">{{$lead->lead_source}}</option>
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
                                    <label for="statusdesc">Lead Status Description</label>
                                    <textarea rows="5" cols="50" style="width: 100%;" placeholder="Status Description (optional)" id="statusdesc" name="lead_status_description">{{$lead->lead_status_description}}
                                    </textarea>
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="sourcedesc">Lead Source Description</label>
                                    <textarea rows="5" cols="50" style="width: 100%;" placeholder="Lead Source Description (optional)" id="sourcedesc" name="lead_source_description">{{$lead->lead_source_description}}
                                    </textarea>
                                 </div>
                            </div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="assigned">Assigned To</label>
                                  <select class="form-control" name="lead_assigned_to" id="assigned" required>
                                        <option selected="selected" value="{{$lead->lead_assigned_to}}">{{$usr_name->name}}</option>
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