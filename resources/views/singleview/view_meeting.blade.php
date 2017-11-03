@extends('admin_template')

@section('title')
MEETING: {{$meeting->meeting_subject}}
@endsection

@section('links')
<li class="header" style="color: white;">Meetings</li>
<li style="background: #111111;"><a href="/meeting/create"><span><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;&nbsp;Schedule Meeting</span></a></li>
<li style="background: #111111;"><a href="/meeting"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Meetings</span></a></li>
<li style="background: #111111;"><a href="/meeting/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Meetings</span></a><hr /></li>
@endsection

@section('content')
    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="col-md-12">
            <a class="btn bg-navy btn-flat" href="/meeting/edit/{{$meeting->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;EDIT MEETING</a>
            <a class="btn bg-navy btn-flat" href="/meeting/create" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;NEW MEETING</a>
            <a class="btn bg-navy btn-flat" href="/meeting" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;ALL MEETINGS</a>
            @if(Auth::user()->account_type == "Admin")
            <a class="btn bg-navy btn-flat" href="/meeting/audit/{{$meeting->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;" target="blank_"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;VIEW CHANGE LOG</a>
            @endif
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <form method="post" action="/meeting" role="form">
                {{csrf_field()}}
            <div class="box box-primary" style="margin-bottom: 2px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" disabled placeholder="Subject" name="meeting_subject" value="{{$meeting->meeting_subject}}">
                         </div>
                        <div class="form-group">
                           <label>Status</label>
                            <input type="text" class="form-control" disabled placeholder="Status" name="meeting_status" value="{{$meeting->meeting_status}}">
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" class="form-control" disabled placeholder="Date" name="meeting_date" value="{{$meeting->meeting_date}}">
                         </div>
                        <div class="form-group">
                           <label>Start Time</label>
                            <input type="text" class="form-control" disabled placeholder="Start Time" name="meeting_time" value="{{$meeting->meeting_subject}}">
                        </div>
                        <div class="form-group">
                            <label>Duration</label>
                            <input type="text" class="form-control" disabled placeholder="Duration" name="meeting_duration" value="{{$meeting->meeting_duration}}">
                         </div>
                        <div class="form-group">
                           <label>Location</label>
                            <input type="text" class="form-control" disabled placeholder="Location" name="meeting_location" value="{{$meeting->meeting_location}}">
                        </div>
                        <div class="form-group">
                            <label>Assigned To</label>
                            <input type="text" class="form-control" disabled placeholder="Assigned To" name="meeting_assigned_to" value="{{$meeting->assigned_name}}">
                         </div>
                    </div>
                 </div><!-- /.box -->
                 <div class="box box-primary">
                    <div class="box-header with-border" style="background-color: #428bca;">
                        <h3 class="box-title" style="color: white;">INVITEES</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        </div>
                    </div>
                
                    <div class="box-body">
                          <!--PHP FOR LOOP HERE, OR NG-REPEAT ISH -->
                        @foreach($invitees as $invitee)
                          <div style="color: gray; margin-bottom: 5px;">{{$invitee->name}}</div>
                        @endforeach
                    </div>
                 </div><!-- /.box -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="background-color: #428bca;">
                        <h3 class="box-title" style="color: white;">MEETING DESCRIPTION</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times" style="color: white;"></i></button>
                        </div>
                    </div>
                    <form>
                        <div class="box-body">
                            <div style="color: gray;" name="meeting_description">{{$meeting->meeting_description}}</div>
                        </div>
                    </form>
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
                            <input type="text" class="form-control" placeholder="Created At" name="created_at" disabled value="{{$meeting->created_at}}">
                        </div>
                        <div class="form-group">
                            <label>Updated At</label>
                            <input type="text" class="form-control" placeholder="Updated At" name="updated_at" disabled value="{{$meeting->updated_at}}">
                        </div>
                        <div class="form-group">
                            <label>Last Modified By</label>
                            <input type="text" class="form-control" placeholder="Last Updated By" name="updated_by" disabled value="{{$meeting->modifier_name}}">
                        </div>
                        <br />
                      </div>
                </div><!-- /.box -->

             </form>
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection