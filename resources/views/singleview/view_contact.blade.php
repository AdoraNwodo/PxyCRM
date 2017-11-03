@extends('admin_template')

@section('title')
CONTACT: {{$contact->contact_title}} &nbsp;{{$contact->contact_first_name}}&nbsp;{{$contact->contact_last_name}}
@endsection

@section('links')
<li class="header" style="color: white;">Contacts</li>
<li style="background: #111111;"><a href="/contact/create"><span><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;&nbsp;Create Contact</span></a></li>
<li style="background: #111111;"><a href="/contact"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Contacts</span></a></li>
<li style="background: #111111;"><a href="/contact/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Contacts</span></a><hr /></li>
@endsection

@section('content')
    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="col-md-12">
            <a class="btn bg-navy btn-flat" href="/contact/edit/{{$contact->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;EDIT CONTACT</a>
            <a class="btn bg-navy btn-flat" href="/contact/create" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;NEW CONTACT</a>
            <a class="btn bg-navy btn-flat" href="/contact" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;ALL CONTACTS</a>
            <a class="btn bg-navy btn-flat" href="/contact/audit/{{$contact->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;" target="blank_"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;VIEW CHANGE LOG</a>
            
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary" style="margin-bottom: 3px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times" style="color: white;"></i></button>
                    </div>
                </div>
                <form>
                    <div class="box-body" >
                        <br />
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                   <label>&nbsp;</label>
                                   <input type="text" class="form-control" placeholder="Title" name="contact_title" disabled value="{{$contact->contact_title}}">
                                  <!--<span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <select class="form-control" name="contact_title" required>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Prof.">Prof.</option>
                                  </select>-->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" name="contact_first_name" disabled value="{{$contact->contact_first_name}}">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="contact_last_name" disabled value="{{$contact->contact_last_name}}">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" placeholder="Mobile" name="contact_mobile" disabled value="{{$contact->contact_mobile}}">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Email Address" name="contact_email" disabled value="{{$contact->contact_email}}">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Assigned to</label>
                                    <input type="text" class="form-control" placeholder="Assigned to" disabled value="{{$contact->assigned_name}}">
                                 </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
                
            </div><!-- /.box -->
             <div class="box box-primary" style="margin-bottom: 3px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">WORK INFO</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times" style="color: white;"></i></button>
                    </div>
                </div>
                <form>
                    <div class="box-body" >
                        <br />
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                   <label>Company</label>
                                   <input type="text" class="form-control" placeholder="Company" name="company" disabled value="{{$contact->account_name}}">
                                  <!--<select name="contact_company" class="form-control select2" required>
                                    <option value="Company">Company</option>
                                  </select>-->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <input type="text" class="form-control" placeholder="Department" name="contact_department" disabled value="{{$contact->contact_department}}">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                  <label>Role</label>
                                  <input type="text" class="form-control" placeholder="Role" name="contact_role" disabled value="{{$contact->contact_role}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                  <label>Status</label>
                                  <input type="text" class="form-control" name="contact_status" value="Working" disabled value="{{$contact->contact_status}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div><!-- /.box -->
            
            <div class="box box-primary">
                <form>
                    <div class="box-header with-border" style="background-color: #428bca;">
                        <h3 class="box-title" style="color: white;">TIMESTAMP</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Created At</label>
                            <input type="text" class="form-control" placeholder="Created At" name="created_at" disabled value="{{$contact->created_at}}">
                        </div>
                        <div class="form-group">
                            <label>Updated At</label>
                            <input type="text" class="form-control" placeholder="Updated At" name="updated_at" disabled value="{{$contact->updated_at}}">
                        </div>
                        <div class="form-group">
                            <label>Last Modified By</label>
                            <input type="text" class="form-control" placeholder="Last Updated By" name="updated_by" disabled value="{{$contact->modifier_name}}">
                        </div>
                        <br />
                      </div>
                </form>
                </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->

@endsection