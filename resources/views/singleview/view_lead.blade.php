@extends('admin_template')

@section('title')
LEAD: {{$lead->lead_title}} &nbsp;{{$lead->lead_first_name}}&nbsp;{{$lead->lead_last_name}}
@endsection
@section('links')
<li class="header" style="color: white;">Leads</li>
<li style="background: #111111;"><a href="/lead/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Create Lead</span></a></li>
<li style="background: #111111;"><a href="/lead"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Leads</span></a></li>
<li style="background: #111111;"><a href="/lead/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Leads</span></a><hr /></li>
@endsection

@section('content')
<form method="post" action="/lead/convert/{{$lead->id}}" role="form">
    {{ csrf_field() }}
    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="col-md-12">
            <a class="btn bg-navy btn-flat" href="/lead/edit/{{$lead->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;EDIT LEAD</a>
            <a class="btn bg-navy btn-flat" href="/lead/create" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;NEW LEAD</a>
            <a class="btn bg-navy btn-flat" href="/lead" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;ALL LEADS</a>
            <button class="btn bg-navy btn-flat" href="#" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;CONVERT LEAD TO CONTACT</button>
            @if(Auth::user()->account_type == "Admin")
            <a class="btn bg-navy btn-flat" href="/lead/audit/{{$lead->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;" target="blank_"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;VIEW CHANGE LOG</a>
            @endif
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>

            <div class="box box-primary" style="margin-bottom: 3px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                        <br />
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                   <label>&nbsp;</label>
                                   <input type="text" class="form-control" placeholder="Title" name="lead_title" disabled value="{{$lead->lead_title}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" name="lead_first_name" disabled value="{{$lead->lead_first_name}}">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="lead_last_name" disabled value="{{$lead->lead_last_name}}">
                                 </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" placeholder="Mobile" name="lead_mobile" disabled value="{{$lead->lead_mobile}}">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Email Address" name="lead_email" disabled value="{{$lead->lead_email}}">
                                 </div>
                            </div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" class="form-control" placeholder="Company" name="lead_company" disabled value="{{$lead->account_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <input type="text" class="form-control" placeholder="Department " name="lead_department" disabled value="{{$lead->lead_department}}">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                  <label>Role</label>
                                  <input type="text" class="form-control" placeholder="Role (e.g. Operations Manager)" name="lead_role" disabled value="{{$lead->lead_role}}">
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div><!-- /.box -->
                <div class="box box-primary" style="margin-bottom: 3px;">
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
                                    <label>Status</label>
                                    <input type="text" class="form-control" placeholder="Status" name="lead_status" disabled value="{{$lead->lead_status}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Lead Source</label>
                                    <input type="text" class="form-control" placeholder="Lead Source" name="lead_source" disabled value="{{$lead->lead_source}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label>Assigned To</label>
                                  <input type="text" class="form-control" placeholder="Assigned To" disabled value="{{$lead->assigned_name}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box -->
                
                <div class="box box-primary" style="margin-bottom: 3px;">
                    <div class="box-header with-border" style="background-color: #428bca;">
                        <h3 class="box-title" style="color: white;">LEAD STATUS DESCRIPTION</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div style="color: gray; padding: 20px;">{{$lead->lead_status_description}}</div>
                    </div>
                </div><!-- /.box -->
                
                <div class="box box-primary" style="margin-bottom: 3px;">
                    <div class="box-header with-border" style="background-color: #428bca;">
                        <h3 class="box-title" style="color: white;">LEAD SOURCE DESCRIPTION</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div style="color: gray; padding: 20px;">{{$lead->lead_source_description}}</div>
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
                            <input type="text" class="form-control" placeholder="Created At" name="created_at" disabled value="{{$lead->created_at}}">
                        </div>
                        <div class="form-group">
                            <label>Updated At</label>
                            <input type="text" class="form-control" placeholder="Updated At" name="updated_at" disabled value="{{$lead->updated_at}}">
                        </div>
                        <div class="form-group">
                            <label>Last Modified By</label>
                            <input type="text" class="form-control" placeholder="Last Updated By" name="updated_by" disabled value="{{$lead->modifier_name}}">
                        </div>
                        <br />
                      </div>
                </div><!-- /.box -->
           
            </div><!-- /.col -->

        </div><!-- /.row -->
    </form>

@endsection