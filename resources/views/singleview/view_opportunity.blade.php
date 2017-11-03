@extends('admin_template')

@section('title')
OPPORTUNITY: {{$opportunity->opportunity_name}}
@endsection

@section('links')
<li class="header" style="color: white;">Opportunities</li>
<li style="background: #111111;"><a href="/opportunity/create"><span><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;&nbsp;Create Opportunity</span></a></li>
<li style="background: #111111;"><a href="/opportunity"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Opportunities</span></a></li>
<li style="background: #111111;"><a href="/opportunity/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Opportunities</span></a><hr /></li>
@endsection

@section('content')
    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="col-md-12">
            <a class="btn bg-navy btn-flat" href="/opportunity/edit/{{$opportunity->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;EDIT OPPORTUNITY</a>
            <a class="btn bg-navy btn-flat" href="/opportunity/create" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;NEW OPPORTUNITY</a>
            <a class="btn bg-navy btn-flat" href="/opportunity" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;ALL OPPORTUNITIES</a>
            @if(Auth::user()->account_type == "Admin")
            <a class="btn bg-navy btn-flat" href="/opportunity/audit/{{$opportunity->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;" target="blank_"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;VIEW CHANGE LOG</a>
            @endif
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary" style="margin-bottom: 3px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">OVERVIEW</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times" style="color: white;"></i></button>
                    </div>
                </div>
                <form>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Opportunity Name</label>
                                    <input type="text" class="form-control" placeholder="Opportunity Name" name="opportunity_name" disabled value="{{$opportunity->opportunity_name}}">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" class="form-control" placeholder="Opportunity Company" name="opportunity_company" disabled value="{{$opportunity->account_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Expected Closing Date</label>
                                    <input type="text" class="form-control" placeholder="Expected Closing Date" name="opportunity_closing_date" disabled value="{{$opportunity->opportunity_closing_date}}">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                  <label>Currency</label>
                                  <input type="text" class="form-control" placeholder="Currency" disabled value="{{$opportunity->opportunity_currency}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="text" class="form-control" placeholder="Opportunity Amount" name="opportunity_amount" disabled value="{{$opportunity->opportunity_amount}}">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" placeholder="Opportunity Status" value="New Business" disabled value="{{$opportunity->opportunity_status}}">
                                 </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label>Sales Stage</label>
                                  <input type="text" class="form-control" placeholder="Sales Stage" value="Prospecting" disabled value="{{$opportunity->opportunity_sales_stage}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                  <label>Lead Source</label>
                                  <input type="text" class="form-control" placeholder="Lead Source" disabled value="{{$opportunity->opportunity_lead_source}}">
                                </div>
                            </div>
                        </div><br />
                        <div class="form-group">
                            <label>Assigned to</label>
                            <input type="text" class="form-control" placeholder="Assigned to" disabled value="{{$opportunity->assigned_name}}">
                         </div><br />
                    </div>
                </form>
            </div><!-- /.box -->
            <div class="box box-primary">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">DESCRIPTION</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times" style="color: white;"></i></button>
                    </div>
                </div>
                <form>
                    <div class="box-body">
                        <div style="color: gray;" >{{$opportunity->opportunity_description}}</div>
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
                            <input type="text" class="form-control" placeholder="Created At" name="created_at" disabled value="{{$opportunity->created_at}}">
                        </div>
                        <div class="form-group">
                            <label>Updated At</label>
                            <input type="text" class="form-control" placeholder="Updated At" name="updated_at" disabled value="{{$opportunity->updated_at}}">
                        </div>
                        <div class="form-group">
                            <label>Last Modified By</label>
                            <input type="text" class="form-control" placeholder="Last Updated By" name="updated_by" disabled value="{{$opportunity->modifier_name}}">
                        </div>
                        <br />
                      </div>
                </form>
                </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->

@endsection