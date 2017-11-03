@extends('admin_template')

@section('title', 'Create Campaign')
@section('subtitle', 'All fields are required')
@section('links')
<li class="header" style="color: white;">Campaigns</li>
<li style="background: #111111;"><a href="/campaign/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Create Campaign</span></a></li>
<li style="background: #111111;"><a href="/campaign"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Campaigns</span></a></li>
<li style="background: #111111;"><a href="/campaign/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Campaigns</span></a><hr /></li>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <form method="POST" action="/campaign" role="form">
                {{csrf_field()}}
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
                            <div class="col-md-6 col-sm-6">
                                 <div class="form-group">
                                  <label for="campaignname">Name</label>
                                  <input type="text" class="form-control" id="campaignname" placeholder="Name" required name="campaign_name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaignassignedto">Assigned to</label>
                                    <select class="form-control select2" id="campaignassignedto" required name="campaign_assigned_to">
                                        <option selected="selected" value="" disabled>Choose Employee</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaignaccount">Account</label>
                                    <select class="form-control select2" id="campaignaccount" required name="campaign_account">
                                        <option selected="selected" value="" disabled>Choose Account</option>
                                        @foreach($accounts as $account)
                                        <option value="{{$account->id}}">{{$account->account_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaignstatus">Status</label>
                                    <select class="form-control" id="campaignstatus" required name="campaign_status">
                                        <option selected="selected" value="" disabled>Choose Status</option>
                                        <option value="Planning">Planning</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="Complete">Complete</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label for="campaigntype">Type</label>
                                    <select class="form-control" id="campaigntype" required name="campaign_type">
                                        <option selected="selected" value="" disabled>Choose Type</option>
                                        <option value="Telesales">Telesales</option>
                                        <option value="Mail">Mail</option>
                                        <option value="Print">Print</option>
                                        <option value="Newsletter">Newsletter</option>
                                        <option value="Web">Web</option>
                                        <option value="Radio">Radio</option>
                                        <option value="Television">Television</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaigndescription">Description</label>
                                    <textarea rows="6" cols="40" style="width: 100%;" placeholder="Description" id="campaigndescription" required name="campaign_description"></textarea>
                                 </div>
                            </div>
                        </div>
                        

                        <br />
                        

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
                                  <input type="number" class="form-control" id="campaignbudget" placeholder="Budget" required name="campaign_budget" min="0">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaignactualcost">Actual Cost</label>
                                    <input type="number" class="form-control" id="campaignactualcost" placeholder="Actual Cost" required name="campaign_actual_cost" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                 <div class="form-group">
                                  <label for="campaignexpectedrevenue">Expected Revenue</label>
                                  <input type="number" class="form-control" id="campaignexpectedrevenue" placeholder="Expected Revenue" required name="campaign_expected_revenue" min="0">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaignexpectedcost">Expected Cost</label>
                                    <input type="number" class="form-control" id="campaignexpectedcost" placeholder="Expected Cost" required name="campaign_expected_cost" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaigncurrency">Currency</label>
                                    <select class="form-control" id="campaigncurrency" required name="campaign_currency">
                                        <option selected="selected" value="" disabled>Choose Currency</option>
                                        <option value="US Dollars">US Dollars: $</option>
                                        <option value="Pounds">Pounds: &pound;</option>
                                        <option value="Naira">Naira: &#x20a6;</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaignimpressions">Impressions</label>
                                    <input type="number" min="0" class="form-control" id="campaignimpressions" required name="campaign_impressions" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="campaignobjective">Objective</label>
                                    <textarea rows="6" cols="40" style="width: 100%;" placeholder="Objective" id="campaignobjective" required name="campaign_objective"></textarea>
                                 </div>
                            </div>
                        </div>
                        <input type="number" class="form-control" name="campaign_last_modified_by" value="{{ Auth::user()->id }}" style="display:none">

                        <br />
                        

                    </div>
                
            </div><!-- /.box -->    
           <!--<div class="box box-primary" style="margin-bottom: 0px;">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">TARGET LISTS</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                    </div>
                </div>
                
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                    <label for="campaigntargetlist">Choose Target List</label>
                                    <select class="form-control" id="campaigntargetlist">
                                        <option selected="selected">List</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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