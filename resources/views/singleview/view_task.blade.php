@extends('admin_template')

@section('title')
TASK: {{$task->task_subject}}
@endsection

@section('links')
<li class="header" style="color: white;">Tasks</li>
<li style="background: #111111;"><a href="/task"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Tasks</span></a></li>
<li style="background: #111111;"><a href="/task/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Tasks</span></a><hr /></li>
@endsection

@section('content')
    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="col-md-12">
            <a class="btn bg-navy btn-flat" href="/task/edit/{{$task->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;EDIT TASK</a>
            <a class="btn bg-navy btn-flat" href="/task" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;ALL TASKS</a>
            @if(Auth::user()->account_type == "Admin")
            <a class="btn bg-navy btn-flat" href="/task/audit/{{$task->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;" target="blank_"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;VIEW CHANGE LOG</a>
            @endif
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary" style="margin-bottom: 3px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">TASK OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                <form>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" disabled placeholder="Subject" name="task_subject" value="{{$task->task_subject}}">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" disabled placeholder="Status" name="task_status" value="{{$task->task_status}}">
                        </div>
                        <div class="form-group">
                            <label>Priority</label>
                            <input type="text" class="form-control" disabled placeholder="Priority" name="task_priority" value="{{$task->task_priority}}">
                        </div>
                        <div class="form-group">
                            <label>Start and Due Date</label>
                            <input type="text" class="form-control" disabled placeholder="Start and Due Date" name="task_start_and_end_date" value="{{$task->task_start_and_end_date}}">
                        </div>
                        <div class="form-group">
                            <label>Project</label>
                            <input type="text" class="form-control" disabled placeholder="Project" name="task_project" value="{{$task->project_name}}">
                        </div>
                        <div class="form-group">
                            <label>Assigned To</label>
                            <input type="text" class="form-control" disabled placeholder="Assigned To" name="task_assigned_to" value="{{$task->manager_name}}">
                        </div>
                    </div>
                </form>
            </div><!-- /.box -->
            
            <div class="box box-primary">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">DESCRIPTION</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                <form>
                    <div class="box-body">
                        <div style="color: gray; padding: 20px;">{{$task->task_description}}</div>
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
                            <input type="text" class="form-control" placeholder="Created At" name="created_at" value="{{$task->created_at}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Updated At</label>
                            <input type="text" class="form-control" placeholder="Updated At" name="updated_at" value="{{$task->updated_at}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Last Modified By</label>
                            <input type="text" class="form-control" placeholder="Last Updated By" name="updated_by" value="{{$task->modifier_name}}" disabled>
                        </div>
                        <br />
                      </div>
                </form>
                </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->

@endsection