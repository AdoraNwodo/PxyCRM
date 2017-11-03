@extends('admin_template')

@section('title', 'Create Call')
@section('subtitle', 'All fields are required')
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
            <form method="post" action="/call" role="form">
                {{csrf_field()}}
            <div class="box box-primary" style="margin-bottom: 2px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" required placeholder="Subject *" name="call_subject">
                         </div><br />
                        <div class="row">
                            <!--<div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                  <select class="form-control">
                                    <option selected="selected">Inbound Call</option>
                                    <option>Outbound Call</option>
                                  </select>
                                </div>
                            </div>-->
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                  <select class="form-control" required name="call_status">
                                    <option selected="selected" disabled value="">Select Status</option>
                                    <option value="Planned">Planned</option>
                                    <option value="Held">Held</option>
                                    <option value="Not Held">Not Held</option>
                                  </select>
                                </div>
                            </div>
                        </div><br />
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="date" class="form-control pull-right" placeholder="Call Date" name="call_date" required>
                        </div><br />
                        <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="time" class="form-control" placeholder="Call Start Time" name="call_time" required>
                        </div><br />
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                            <select class="form-control select2" name="call_assigned_to" required>
                                <option selected="selected" disabled value="">Assigned to</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                             </select>
                         </div><br />
                        
                        <div class="form-group">
                            <textarea rows="10" cols="50" style="width: 100%;" placeholder="Description" name="call_description" required></textarea>
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
                                <option selected="selected" disabled value="">Choose Contact</option>
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