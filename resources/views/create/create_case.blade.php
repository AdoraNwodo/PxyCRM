@extends('admin_template')

@section('title', 'Create Case')
@section('subtitle', 'All fields are required')
@section('links')
<li class="header" style="color: white;">Calls</li>
<li style="background: #111111;"><a href="/case/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Create Case</span></a></li>
<li style="background: #111111;"><a href="/case"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Cases</span></a></li>
<li style="background: #111111;"><a href="/case/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Cases</span></a><hr /></li>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <form method="post" action="/case" role="form">
                {{csrf_field()}}
            <div class="box box-primary" style="margin-bottom: 2px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                      <div class="box-body">
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                   <select class="form-control" name="priority" required>
                                    <option selected="selected" disabled value="">Select Priority *</option>
                                    <option value="High Priority">High Priority</option>
                                    <option value="Medium Priority">Medium Priority</option>
                                    <option value="Low Priority">Low Priority</option>
                                  </select>
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                   <label for="state">State</label>
                                   <select class="form-control" name="state" required>
                                    <option selected="selected" disabled value="">Select State *</option>
                                    <option value="Opened">Opened</option>
                                    <option value="Closed">Closed</option>
                                    <option value="On Hold">On Hold</option>
                                  </select>
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" required>
                                    <option selected="selected" disabled value="">Select Status *</option>
                                    <option value="New">New</option>
                                    <option value="Assigned">Assigned</option>
                                    <option value="Treated">Treated</option>
                                  </select>
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                   <label for="type">Type</label>
                                   <select class="form-control" name="type" required>
                                    <option selected="selected" disabled value="">Select Type *</option>
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                  </select>
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetmobile">Account</label>
                                   <select class="form-control select2" style="width: 100%;" required name="account">
                                        <option selected="selected" disabled value="">Choose Account</option>
                                        @foreach($accounts as $account)
                                        <option value="{{$account->id}}">{{$account->account_name}}</option>
                                        @endforeach
                                    </select>
                                 </div>
                            </div>
                        </div><br /><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetaddress">Suggestions</label>
                                   <textarea rows="5" cols="50" style="width: 100%;" placeholder="Suggestions" name="suggestions"></textarea>
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetcity">Description</label>
                                    <textarea rows="5" cols="50" style="width: 100%;" placeholder="Description" name="description"></textarea>
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetcity">Resolution</label>
                                    <textarea rows="5" cols="50" style="width: 100%;" placeholder="Resolution" name="resolution"></textarea>
                                 </div>
                            </div>
                        </div>  
                        
                    </div>
                
            </div><!-- /.box -->
            <div class="box box-primary">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OTHER</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                          <div class="form-group">
                            <label>Contact</label>
                            <select class="form-control select2" style="width: 100%;" required name="assigned_to">
                                <option selected="selected" disabled value="">Choose Employee</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
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
                        </div>
                </form>
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection