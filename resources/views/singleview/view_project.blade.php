@extends('admin_template')

@section('title')
PROJECT: {{$project->project_name}}
@endsection

@section('links')
<li class="header" style="color: white;">Projects</li>
<li style="background: #111111;"><a href="/project/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Create Project</span></a></li>
<li style="background: #111111;"><a href="/project"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Projects</span></a></li>
<li style="background: #111111;"><a href="/project/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Projects</span></a><hr /></li>
@endsection

@section('content')
<form method="post" action="/task/create" role="form">
    {{ csrf_field() }}
    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="col-md-12">
            <a class="btn bg-navy btn-flat" href="/project/edit/{{$project->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;EDIT PROJECT</a>
            <a class="btn bg-navy btn-flat" href="/project/create" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;NEW PROJECT</a>
            <a class="btn bg-navy btn-flat" href="/project" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;ALL PROJECTS</a>
            <button type="submit" class="btn bg-navy btn-flat" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp; ADD TASK TO PROJECT</button>
            @if(Auth::user()->account_type == "Admin")
            <a class="btn bg-navy btn-flat" href="/project/audit/{{$project->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;" target="blank_"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;VIEW CHANGE LOG</a>
            @endif
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary" style="margin-bottom: 2px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                <input type="text" class="form-control" style="display: none;" name="project_id" value="{{$project->id}}">
                <input type="text" class="form-control" style="display: none;" name="project_date" value="{{$project->project_date_range}}">
                    <div class="box-body">
                       <div class="row">
                            <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                    <label for="projectname">Name</label>
                                    <input type="text" class="form-control" id="projectname" name="project_name" placeholder="Name" disabled value="{{$project->project_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="projectdaterange">Start and End Date </label>
                                    <input type="text" class="form-control" name="project_date_range" disabled value="{{$project->project_date_range}}">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" name="project_status" placeholder="Status" disabled value="{{$project->project_status}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Project Manager</label>
                                    <input type="text" class="form-control" name="project_manager" placeholder="Project Manager" disabled value="{{$project->manager_name}}">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box -->
                
                <div class="box box-primary" style="margin-bottom: 3px;">
                    <div class="box-header with-border" style="background-color: #428bca;">
                        <h3 class="box-title" style="color: white;">PROJECT DESCRIPTION</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div style="color: gray; padding: 20px;">{{$project->project_description}}</div>
                    </div>
                </div><!-- /.box -->
                
                <div class="box box-primary">
                    <div class="box-header with-border" style="background-color: #428bca;">
                        <h3 class="box-title" style="color: white;">TASKS</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        </div>
                    </div>
                    <div class="box-body" style="padding: 0; margin: 0;">
                        <!--Add table with edit and view links to each task here -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th style="width: 30%;">Subject</th>
                                  <th style="width: 30%;">Start and Due Date</th>
                                  <th style="width: 30%;">Assigned To</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                <tr>
                                  <td>{{$task->task_subject}}</td>
                                  <td>{{$task->task_start_and_end_date}}</td>
                                  <td>{{$task->name}}</td>
                                  <td><a href="/task/edit/{{$task->id}}"><i class="fa fa-pencil-square-o" style="font-size: 17px;"></i></a>&nbsp;&nbsp;&nbsp;<a href="/task/view/{{$task->id}}"><i class="fa fa-eye" style="font-size: 17px;"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            {{$tasks->links()}}
                            </tfoot>
                      </table>
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
                            <input type="text" class="form-control" placeholder="Created At" name="created_at" disabled value="{{$project->created_at}}">
                        </div>
                        <div class="form-group">
                            <label>Updated At</label>
                            <input type="text" class="form-control" placeholder="Updated At" name="updated_at" disabled value="{{$project->updated_at}}">
                        </div>
                        <div class="form-group">
                            <label>Last Modified By</label>
                            <input type="text" class="form-control" placeholder="Last Updated By" name="updated_by" disabled value="{{$project->modifier_name}}">
                        </div>
                        <br />
                      </div>
                </div><!-- /.box -->
            
        </div><!-- /.col -->

    </div><!-- /.row -->
</form>

@endsection