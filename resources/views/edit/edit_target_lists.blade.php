@extends('admin_template')

@section('title', 'Create Target Lists')
@section('subtitle', 'All fields are required')

@section('links')
<li class="header" style="color: white;">Target Lists</li>
<li style="background: #111111;"><a href="/targetlists/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Add Target List</span></a></li>
<li style="background: #111111;"><a href="/targetlists"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Target Lists</span></a><hr /></li>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <form method="post" action="#" role="form">
            <div class="box box-primary" style="margin-bottom: 1px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">BASIC</h3>
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
                                    <label for="targetlistname">Name</label>
                                    <input type="text" class="form-control" placeholder="Name" id="targetlistname">
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetlisttype">Type</label>
                                    <select class="form-control" id="targetlisttype">
                                        <option>Default</option>
                                        <option>Seed</option>
                                        <option>Suppression List - By Domain</option>
                                        <option>Suppression List - By Id</option>
                                        <option>Suppression List - By Email Address</option>
                                        <option>Test</option>
                                     </select>
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="targetlistdescription">
                                    Description</label>
                                    <textarea rows="5" cols="50" style="width: 100%;" placeholder="Description" id="targetlistdescription"></textarea>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box -->
               <!-- <div class="box box-primary" style="margin-bottom: 1px;">
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
                                    <label for="targetlistassignedto">Assigned To</label>
                                    <select class="form-control" id="targetlistassignedto">
                                        <option>Employee</option>
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