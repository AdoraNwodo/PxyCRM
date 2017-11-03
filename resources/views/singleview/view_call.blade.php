@extends('admin_template')

@section('title')
CALL: {{$call->call_subject}}
@endsection

@section('links')
<li class="header" style="color: white;">Calls</li>
<li style="background: #111111;"><a href="/call/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Log Call</span></a></li>
<li style="background: #111111;"><a href="/call"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Calls</span></a></li>
<li style="background: #111111;"><a href="/call/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Calls</span></a><hr /></li>
@endsection

@section('content')
    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="col-md-12">
            <a class="btn bg-navy btn-flat" href="/call/edit/{{$call->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;EDIT CALL</a>
            <a class="btn bg-navy btn-flat" href="/call/create" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;NEW CALL</a>
            <a class="btn bg-navy btn-flat" href="/call" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;ALL CALLS</a>
            @if(Auth::user()->account_type == "Admin")
            <a class="btn bg-navy btn-flat" href="/call/audit/{{$call->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;" target="blank_"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;VIEW CHANGE LOG</a>
            @endif
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <form>
            <div class="box box-primary" style="margin-bottom: 2px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                        <div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" disabled placeholder="Subject" name="call_subject" value="{{$call->call_subject}}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" disabled placeholder="Status" name="call_status" value="{{$call->call_status}}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" class="form-control" disabled placeholder="Contact"  name="call_to" value="{{$call->contact_first_name}}&nbsp;{{$call->contact_last_name}}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Account</label>
                                    <input type="text" class="form-control" disabled placeholder="Account"  name="call_to_account" value="{{$call->account_name}}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" class="form-control" disabled placeholder="Date" name="call_date" value="{{$call->call_date}}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Time</label>
                                    <input type="text" class="form-control" disabled placeholder="Time" name="call_time" value="{{$call->call_time}}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Assigned To</label>
                                    <input type="text" class="form-control" disabled placeholder="Status"  name="call_assigned_to" value="{{$call->assigned_name}}">
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div><!-- /.box -->
                <div class="box box-primary" >
                    <div class="box-header with-border" style="background-color: #428bca;">
                        <h3 class="box-title" style="color: white;">CALL DESCRIPTION</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div style="color: gray; padding: 20px;" name="call_description">{{$call->call_description}}</div>
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
                            <input type="text" class="form-control" placeholder="Created At" name="created_at" disabled value="{{$call->created_at}}">
                        </div>
                        <div class="form-group">
                            <label>Updated At</label>
                            <input type="text" class="form-control" placeholder="Updated At" name="updated_at" disabled value="{{$call->updated_at}}">
                        </div>
                        <div class="form-group">
                            <label>Last Modified By</label>
                            <input type="text" class="form-control" placeholder="Last Updated By" name="updated_by" disabled value="{{$call->modifier_name}}">
                        </div>
                        <br />
                      </div>
                </div><!-- /.box -->
            </form>
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection