@extends('admin_template')

@section('title', 'Target Lists')

@section('links')
<li class="header" style="color: white;">Target Lists</li>
<li style="background: #111111;"><a href="/targetlists/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Add Target List</span></a></li>
<li style="background: #111111;"><a href="/targetlists"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Target Lists</span></a><hr /></li>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-2'></div>
        <div class='col-md-8'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">CREATE</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times" style="color: white;"></i></button>
                    </div>
                </div>
                <form method="post" action="#" role="form">
                    <div class="box-body">
                        <br />
                        <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
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
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="First Name">
                                 </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Last Name">
                                 </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="tel" class="form-control" placeholder="Mobile">
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email Address">
                                 </div>
                            </div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                  <select class="form-control">
                                    <option>Company</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                    <input type="text" class="form-control" placeholder="Department">
                                 </div>
                            </div>
                        </div>
                        <br />
                        
                        <br />
                        
                        <br />
                        <div class="input-group">
                            <input type="submit" class="form-control btn bg-navy btn-flat" value="SAVE">
                         </div><br />
                        

                    </div>
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
    <div class='col-md-2'></div>

@endsection