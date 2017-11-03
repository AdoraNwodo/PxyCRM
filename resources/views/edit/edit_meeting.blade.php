@extends('admin_template')

@section('title', 'EDIT MEETING')
@section('links')
<li class="header" style="color: white;">Meetings</li>
<li style="background: #111111;"><a href="/meeting/create"><span><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;&nbsp;Schedule Meeting</span></a></li>
<li style="background: #111111;"><a href="/meeting"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Meetings</span></a></li>
<li style="background: #111111;"><a href="/meeting/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Meetings</span></a><hr /></li>
@endsection

@section('content')
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
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" required placeholder="Subject *" name="meeting_subject" id="subject">
                         </div><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="status">Choose Status</label>
                                  <select class="form-control" required name="meeting_status" id="status">
                                    <option selected="selected" disabled value="">Choose Status</option>
                                    <option value="Planned">Planned</option>
                                    <option value="Held">Held</option>
                                    <option value="Not Held">Not Held</option>
                                  </select>
                                </div>
                            </div>
                        </div><br />
                        <div class="form-group date">
                          <label for="date">Date</label>
                          <input type="date" class="form-control pull-right" placeholder="Meeting Date" required name="meeting_date" id="date">
                        </div><br />
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" placeholder="Meeting Start Time" required name="meeting_time" id="time">
                        </div><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="duration">Duration</label>
                                  <select class="form-control" required name="meeting_duration" id="duration">
                                    <option selected="selected" disabled value="">Choose Duration</option>
                                    <option value="15 minutes">15 minutes</option>
                                    <option value="30 minutes">30 minutes</option>
                                    <option value="45 minutes">45 minutes</option>
                                    <option value="1 hour">1 hour</option>
                                    <option value="1.5 hours">1.5 hours</option>
                                    <option value="2 hours">2 hours</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="duration">Duration</label>
                                  <input type="text" class="form-control pull-right" placeholder="Location" required name="meeting_location" id="duration">
                                </div>
                            </div>
                        </div><br />
                        <div class="form-group">
                            <label for="assigned">Assigned To</label>
                            <select class="form-control" required name="meeting_assigned_to" id="assigned">
                                <option selected="selected" disabled value="">Assigned to</option>
                                <option value="Employee">Employee</option>
                             </select>
                         </div><br />
                        
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea rows="10" cols="50" style="width: 100%;" placeholder="Description" required name="meeting_description" id="desc"></textarea>
                         </div>
                        <br />                                   
                    </div>
                 </div><!-- /.box -->
                
                <input type="number" class="form-control" name="meeting_last_modified_by" value="1" style="display:none">
                
                     <div class="box box-primary">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">INVITEES</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                          <div class="form-group">
                            <label>Invitees</label>
                            <select class="form-control select2" name="meeting_invitees[]" required multiple="multiple" data-placeholder="Select Invitee" style="width: 100%;">
                              <option value="1">Alabama</option>
                              <option value="2">Alaska</option>
                            </select>
                          </div>        
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
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group">
                            <a class="btn bg-navy btn-flat" href="https://calendar.google.com/"><i class="fa fa-clock-o"></i>&nbsp; ADD REMINDER</a>
                         </div>
                            </div>
                        </div>
                        <br />
             </form>
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection