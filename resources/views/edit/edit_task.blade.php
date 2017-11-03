@extends('admin_template')

@section('title', 'EDIT TASK')
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
                <form method="post" action="/task/edit/{{$task->id}}" role="form">
                    {{ csrf_field() }}
                    {{method_field("PUT")}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" required placeholder="Subject *" name="task_subject" id="subject" value="{{$task->task_subject}}">
                         </div><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="status">Choose Status</label>
                                  <select class="form-control" required name="task_status" id="status">
                                    <option selected="selected" value="{{$task->task_status}}" >{{$task->task_status}}</option>
                                    <option value="Not Started">Not Started</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Pending Input">Pending Input</option>
                                    <option value="Deferred">Deferred</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label for="priority">Choose Priority</label>
                                  <select class="form-control" name="task_priority" required id="priority">
                                    <option selected="selected" value="{{$task->task_priority}}">{{$task->task_priority}}</option>
                                    <option value="High Priority">High Priority</option>
                                    <option value="Medium Priority">Medium Priority</option>
                                    <option value="Low Priority">Low Priority</option>
                                  </select>
                                </div>
                            </div>
                        </div><br />
                        <div class="form-group">
                          <label for="reservation">Start and End Date</label>
                          <input type="text" placeholder="Start and Due Date" class="form-control pull-right" id="reservation" name="task_start_and_end_date" required value="{{$task->task_start_and_end_date}}">
                        </div><br />
                        <div class="form-group">
                            <label for="project">Choose Project</label>
                            <select class="form-control" name="task_project" required id="project">
                                <option selected="selected" value="{{$task->task_project}}" >{{$project->project_name}}</option>
                                @foreach($projects as $tproject)
                                <option value="{{$tproject->id}}">{{$tproject->project_name}}</option>
                                @endforeach
                             </select>
                         </div><br />
                        <div class="form-group">
                            <label for="assignedto">Assigned To</label>
                            <select class="form-control" name="task_assigned_to" id="assignedto" required>
                                <option selected="selected" value="{{$task->task_assigned_to}}">{{$usr_name->name}}</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                             </select>
                         </div><br />
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="10" cols="50" style="width: 100%;" placeholder="Description" name="task_description" required id="description">{{$task->task_description}}</textarea>
                         </div>
                        <input type="number" class="form-control" name="task_last_modified_by" value="{{ Auth::user()->id }}" style="display:none">
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