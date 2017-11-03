@extends('admin_template')

@section('title', 'Create Task')
@section('subtitle', 'All fields are required')
@section('links')
<li class="header" style="color: white;">Tasks</li>
<li style="background: #111111;"><a href="/task"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Tasks</span></a></li>
<li style="background: #111111;"><a href="/task/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Tasks</span></a><hr /></li>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">TASK OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                <form method="post" action="/task" role="form">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" required placeholder="Subject *" name="task_subject">
                         </div><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                  <select class="form-control" required name="task_status">
                                    <option selected="selected" disabled value="">Choose Status</option>
                                    <option value="Not Started">Not Started</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Pending Input">Pending Input</option>
                                    <option value="Deferred">Deferred</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                  <select class="form-control" name="task_priority" required>
                                    <option selected="selected" disabled value="">Choose Priority</option>
                                    <option value="High Priority">High Priority</option>
                                    <option value="Medium Priority">Medium Priority</option>
                                    <option value="Low Priority">Low Priority</option>
                                  </select>
                                </div>
                            </div>
                        </div><br />
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" placeholder="Start and Due Date" class="form-control pull-right" id="taskdate" name="task_start_and_end_date" required>
                        </div><br />
                        <!--<div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                            <select class="form-control" name="task_project" required>
                                <option selected="selected" disabled value="">Choose Project</option>
                                <option value="Project 1">Project1</option>
                             </select>
                         </div><br />-->
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                            <select class="form-control select2" name="task_assigned_to" required>
                                <option selected="selected" disabled value="">Choose Assigned to</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                             </select>
                         </div><br />
                        <div class="form-group">
                            <textarea rows="10" cols="50" style="width: 100%;" placeholder="Description" name="task_description" required></textarea>
                         </div>
                        <input type="number" class="form-control" name="task_last_modified_by" value="{{ Auth::user()->id }}" style="display:none">
                        <input type="number" class="form-control" name="task_project" value="{{ $id }}" style="display:none">
                        
                        <input type="text" id="minday" value="{{ $minday }}" style="display:none">
                        <input type="text" id="minmonth" value="{{ $minmonth}}" style="display:none">
                        <input type="text" id="minyear" value="{{ $minyear }}" style="display:none">
                        <input type="text" id="maxday" value="{{ $maxday }}" style="display:none">
                        <input type="text" id="maxmonth" value="{{ $maxmonth }}" style="display:none">
                        <input type="text" id="maxday" value="{{ $maxday }}" style="display:none">
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

                        <br />
                        

                    </div>
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->

@endsection