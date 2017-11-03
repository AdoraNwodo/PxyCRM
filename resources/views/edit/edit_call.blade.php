@extends('admin_template')

@section('title', 'EDIT CALL')
@section('links')
<li class="header" style="color: white;">Calls</li>
<li style="background: #111111;"><a href="/call/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Log Call</span></a></li>
<li style="background: #111111;"><a href="/call"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Calls</span></a></li>
<li style="background: #111111;"><a href="/call/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Calls</span></a><hr /></li>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <form method="post" action="/call/edit/{{$call->id}}" role="form">
                {{csrf_field()}}
                {{method_field("PUT")}}
            <div class="box box-primary" style="margin-bottom: 2px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                        <div class="form-group">
                            <label for="subject">Call Subject</label>
                            <input type="text" class="form-control" required placeholder="Subject *" id="subject" name="call_subject" value="{{$call->call_subject}}">
                         </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="status">Call Status</label>
                                  <select class="form-control" required name="call_status" id="status">
                                    <option selected="selected" value="{{$call->call_status}}">{{$call->call_status}}</option>
                                    <option value="Planned">Planned</option>
                                    <option value="Held">Held</option>
                                    <option value="Not Held">Not Held</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group date">
                          <label for="calldate">Call Date</label>
                          <input type="date" class="form-control pull-right" placeholder="Call Date" name="call_date" id="calldate" required value="{{$call->call_date}}">
                        </div><br />
                        <div class="form-group">
                            <label for="calltime">Call Time</label>
                            <input type="time" class="form-control" placeholder="Call Start Time" name="call_time" id="calltime" required value="{{$call->call_time}}">
                        </div><br />
                        <div class="form-group">
                            <label for="callassignedto">Assigned To</label>
                            <select class="form-control" name="call_assigned_to" id="callassignedto" required>
                                <option selected="selected" value="{{$call->call_assigned_to}}">{{$usr_name->name}}</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                             </select>
                         </div><br />
                        
                        <div class="form-group">
                            <label for="calldesc">Description</label>
                            <textarea rows="10" cols="50" style="width: 100%;" placeholder="Description" name="call_description" id="calldesc" required>{{$call->call_description}}</textarea>
                         </div>
                        <input type="number" class="form-control" name="call_last_modified_by" value="{{ Auth::user()->id }}" style="display:none">
                        <br />
                        

                    </div>
                
            </div><!-- /.box -->
            <div class="box box-primary">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">CONTACT</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                          <div class="form-group">
                            <label>Contact</label>
                            <select class="form-control select2" style="width: 100%;" required name="call_to">
                                <option selected="selected" value="{{$call->call_to}}">{{$contact->contact_first_name}}&nbsp;{{$contact->contact_last_name}}</option>
                                @foreach($contacts as $contact)
                                <option value="{{$contact->id}}">{{$contact->contact_first_name}}&nbsp;{{$contact->contact_last_name}}</option>
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
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group">
                                    <a class="btn bg-navy btn-flat" href="https://calendar.google.com/"><i class="fa fa-clock-o"></i>&nbsp; ADD REMINDER</a>
                                </div>
                            </div>
                        </div>
                </form>
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection