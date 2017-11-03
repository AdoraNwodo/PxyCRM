@extends('admin_template')

@section('title')
CAMPAIGN: {{$campaign->campaign_name}}
@endsection
@section('links')
<li class="header" style="color: white;">Campaigns</li>
<li style="background: #111111;"><a href="/campaign/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Create Campaign</span></a></li>
<li style="background: #111111;"><a href="/campaign"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Campaigns</span></a></li>
<li style="background: #111111;"><a href="/campaign/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Campaigns</span></a><hr /></li>
@endsection

@section('content')
    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="col-md-12">
            <a class="btn bg-navy btn-flat" href="/campaign/edit/{{$campaign->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;EDIT CAMPAIGN</a>
            <a class="btn bg-navy btn-flat" href="/campaign/create" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;NEW CAMPAIGN</a>
            <a class="btn bg-navy btn-flat" href="/campaign" style="margin-right: 10px; padding: 10px; font-size: 17px;"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;ALL CAMPAIGNS</a>
            @if(Auth::user()->account_type == "Admin")
            <a class="btn bg-navy btn-flat" href="/campaign/audit/{{$campaign->id}}" style="margin-right: 10px; padding: 10px; font-size: 17px;" target="blank_"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;VIEW CHANGE LOG</a>
            @endif
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <form>
            <!-- Box -->
            <div class="box box-primary" style="margin-bottom: 2px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">CAMPAIGN HEADER</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                  <label for="campaignname">Name</label>
                                  <input type="text" class="form-control" id="campaignname" placeholder="Name" name="campaign_name" disabled value="{{$campaign->campaign_name}}">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="campaignassignedto">Assigned to</label>
                                    <input type="text" class="form-control" id="campaignassignedto" placeholder="Employee" name="campaign_assigned_to" disabled value="{{$campaign->assigned_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaignstatus">Status</label>
                                    <input type="text" class="form-control" id="campaignstatus" placeholder="Status" name="campaign_status" disabled value="{{$campaign->campaign_status}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaigntype">Type</label>
                                    <input type="text" class="form-control" id="campaigntype" placeholder="Campaign Type" name="campaign_type" disabled value="{{$campaign->campaign_type}}">
                                </div>
                            </div>
                        </div><br />
                    </div>
                </div><!-- /.box -->
                <div class="box box-primary" style="margin-bottom: 2px;">
                    <div class="box-header with-border" style="background-color: #428bca;">
                        <h3 class="box-title" style="color: white;">DESCRIPTION</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        </div>
                    </div>                
                    <div class="box-body">
                       <div id="campaigndescription" name="campaign_description" style="color: gray;" >{{$campaign->campaign_description}}</div>
                    </div>
                
                </div><!-- /.box -->    
                <div class="box box-primary" style="margin-bottom: 2px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">CAMPAIGN BUDGET</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                 <div class="form-group">
                                  <label for="campaignbudget">Budget</label>
                                  <input type="number" class="form-control" id="campaignbudget" placeholder="Budget" name="campaign_budget" min="0" disabled value="{{$campaign->campaign_budget}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaignactualcost">Actual Cost</label>
                                    <input type="number" class="form-control" id="campaignactualcost" placeholder="Actual Cost" disabled name="campaign_actual_cost" min="0" value="{{$campaign->campaign_actual_cost}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                 <div class="form-group">
                                  <label for="campaignexpectedrevenue">Expected Revenue</label>
                                  <input type="number" class="form-control" id="campaignexpectedrevenue" placeholder="Expected Revenue" disabled name="campaign_expected_revenue" min="0" value="{{$campaign->campaign_expected_revenue}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaignexpectedcost">Expected Cost</label>
                                    <input type="number" class="form-control" id="campaignexpectedcost" placeholder="Expected Cost" disabled name="campaign_expected_cost" min="0" value="{{$campaign->campaign_expected_cost}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaigncurrency">Currency</label>
                                    <input type="text" class="form-control" id="campaigncurrency" placeholder="Campaign Currency" name="campaign_currency" disabled value="{{$campaign->campaign_currency}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaignimpressions">Impressions</label>
                                    <input type="number" min="0" class="form-control" id="campaignimpressions" disabled name="campaign_impressions" min="0" value="{{$campaign->campaign_impressions}}">
                                </div>
                            </div>
                        </div><br />
                    </div>
                
                </div><!-- /.box -->    
                <div class="box box-primary" style="margin-bottom: 2px;">
                    <div class="box-header with-border" style="background-color: #428bca;">
                        <h3 class="box-title" style="color: white;">OBJECTIVE</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        </div>
                    </div>                
                    <div class="box-body">
                       <div id="campaignobjective" name="campaign_objective" style="color: gray;" >{{$campaign->campaign_objective}}</div>
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
                            <input type="text" class="form-control" placeholder="Created At" name="created_at" disabled value="{{$campaign->created_at}}">
                        </div>
                        <div class="form-group">
                            <label>Updated At</label>
                            <input type="text" class="form-control" placeholder="Updated At" name="updated_at" disabled value="{{$campaign->updated_at}}">
                        </div>
                        <div class="form-group">
                            <label>Last Modified By</label>
                            <input type="text" class="form-control" placeholder="Last Updated By" name="updated_by" disabled value="{{$campaign->modifier_name}}">
                        </div>
                        <br />
                      </div>
                </div><!-- /.box -->
            </form>
        </div><!-- /.col -->

    </div><!-- /.row -->


@endsection