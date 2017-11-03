@extends('admin_template')

@section('title', 'Create Target')
@section('subtitle', 'All fields are required')

@section('links')
<li class="header" style="color: white;">Targets</li>
<li style="background: #111111;"><a href="/target/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Add Target</span></a></li>
<li style="background: #111111;"><a href="/target"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Targets</span></a><hr /></li>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <form method="post" action="#" role="form">
            <div class="box box-primary" style="margin-bottom: 1px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                        <br />
                        <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <select class="form-control">
                                        <option>Mr.</option>
                                        <option>Ms.</option>
                                        <option>Mrs.</option>
                                        <option>Dr.</option>
                                        <option>Prof.</option>
                                     </select>
                                 </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="form-group">
                                    <label for="targetfirstname">First Name</label>
                                   <input type="text" id="targetfirstname" class="form-control" placeholder=" First Name">
                                 </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="form-group">
                                    <label for="targetlastname">Last Name</label>
                                   <input type="text" id="targetlastname" class="form-control" placeholder=" Last Name">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targettitle">Title</label>
                                   <input type="text" id="targettitle" class="form-control" placeholder=" Title">
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetdepartment">Department</label>
                                   <input type="text" id="targetdepartment" class="form-control" placeholder="Department">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetmobile">Mobile</label>
                                   <input type="tel" id="targetmobile" class="form-control" placeholder="Mobile">
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetemail">Email</label>
                                   <input type="email" id="targetemail" class="form-control" placeholder="Email">
                                 </div>
                            </div>
                        </div><br /><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetaddress">Address</label>
                                   <input type="text" id="targetaddress" class="form-control" placeholder="Address">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetcity">City</label>
                                   <input type="text" id="targetcity" class="form-control" placeholder="City">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetstate">State</label>
                                   <input type="text" id="targetstate" class="form-control" placeholder="State">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetcountry">Country</label>
                                   <input type="text" id="targetcountry" class="form-control" placeholder="Country">
                                 </div>
                            </div>
                        </div>
                        
                    </div>
                </div><!-- /.box -->
                
                
                <div class="box box-primary" style="margin-bottom: 1px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OTHER</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetassignedto">Assigned To</label>
                                    <select class="form-control" id="targetassignedto">
                                        <option>Employee</option>
                                     </select>
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targettargetlist">Target List</label>
                                    <select class="form-control" id="targettargetlist">
                                        <option>List</option>
                                     </select>
                                 </div>
                            </div>
                        </div>
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