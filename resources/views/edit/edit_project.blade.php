@extends('admin_template')

@section('title', 'EDIT PROJECT')
@section('links')
<li class="header" style="color: white;">Projects</li>
<li style="background: #111111;"><a href="/project/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Create Project</span></a></li>
<li style="background: #111111;"><a href="/project"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Projects</span></a></li>
<li style="background: #111111;"><a href="/project/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Projects</span></a><hr /></li>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <form method="POST" action="/project/edit/{{$project->id}}" role="form">
                {{ csrf_field() }}
                {{method_field("PUT")}}
            <!-- Box -->
            <div class="box box-primary" style="margin-bottom: 2px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                 <div class="form-group">
                                  <label for="projectname">Name</label>
                                  <input type="text" class="form-control" id="projectname" name="project_name" placeholder="Name" value="{{$project->project_name}}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="projectdaterange">Start and End Date </label>
                                    <input type="text" class="form-control" name="project_date_range" id="projectdaterange" value="{{$project->project_date_range}}" required>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="projectstatus">Status</label>
                                    <select class="form-control" id="projectstatus" required name="project_status">
                                        <option selected="selected" value="{{$project->project_status}}">{{$project->project_status}}</option>
                                        <option value="Draft">Draft</option>
                                        <option value="In Review">In Review</option>
                                        <option value="Underway">Underway</option>
                                        <option value="On hold">On hold</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="projectmanager">Project Manager</label>
                                    <select class="form-control select2" id="projectmanager" required name="project_manager">
                                        <option selected="selected" value="{{$project->project_manager}}">{{$manager->name}}</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="projectdescription">Description</label>
                                    <textarea rows="6" cols="40" style="width: 100%;" placeholder="Description" id="projectdescription" required name="project_description">{{$project->project_description}}</textarea>
                                 </div>
                            </div>
                        </div>
                        <input type="number" class="form-control" name="project_last_modified_by" value="{{ Auth::user()->id }}" style="display:none">
                        
                        <br />
                        

                    </div>
                
            </div><!-- /.box -->
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
            </form>
        </div><!-- /.col -->

    </div><!-- /.row -->

@endsection