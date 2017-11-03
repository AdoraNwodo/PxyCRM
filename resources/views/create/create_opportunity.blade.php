@extends('admin_template')

@section('title', 'Create Opportunity')
@section('subtitle', 'All fields are required')
@section('links')
<li class="header" style="color: white;">Opportunities</li>
<li style="background: #111111;"><a href="/opportunity/create"><span><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;&nbsp;Create Opportunity</span></a></li>
<li style="background: #111111;"><a href="/opportunity"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Opportunities</span></a></li>
<li style="background: #111111;"><a href="/opportunity/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Opportunities</span></a><hr /></li>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border" style="background-color: #428bca;">
                    <h3 class="box-title" style="color: white;">CREATE</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" style="color: white;"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times" style="color: white;"></i></button>
                    </div>
                </div>
                <form method="POST" action="/opportunity" role="form">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lightbulb-o"></i></span>
                                    <input type="text" class="form-control" placeholder="Opportunity Name" name="opportunity_name" required>
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                  <select class="form-control select2" name="opportunity_company" required>
                                    <option disabled selected value="">Select Account</option>
                                    @foreach($accounts as $account)
                                    <option value="{{$account->id}}">{{$account->account_name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                        </div><br />
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input placeholder="Expected Closing Date" class="textbox-n form-control" name="opportunity_closing_date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                        </div><br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                  <select class="form-control" name="opportunity_currency" required>
                                    <option selected="selected" disabled value="">Choose Currency</option>
                                    <option value="US Dollars">US Dollars: $</option>
                                    <option value="Pounds">Pounds: &pound;</option>
                                    <option value="Naira">Naira: &#x20a6;</option>
                                    <option value="Other">Other (Please Specify in notes)</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    <input type="number" class="form-control" placeholder="Opportunity Amount" name="opportunity_amount" required>
                                 </div>
                            </div>
                        </div><br />
                        <div class="form-group">
                          <div class="radio">
                            <label>
                              <input type="radio" name="opportunity_status" value="Existing Business" checked>
                              Existing Business
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="opportunity_status" value="New Business">
                              New Business
                            </label>
                          </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                  <select class="form-control" name="opportunity_sales_stage" required>
                                    <option selected="selected" disabled value="">Choose Sales Stage</option>
                                    <option value="Prospecting">Prospecting</option>
                                    <option value="Qualification">Qualification</option>
                                    <option value="Needs Analysis">Needs Analysis</option>
                                    <option value="Value Proposition">Value Proposition</option>
                                    <option value="Perception Analysis">Perception Analysis</option>
                                    <option value="Proposal/ Price Quote">Proposal/ Price Quote</option>
                                    <option value="Negotiation/Review">Negotiation/Review</option>
                                    <option value="Closed Won">Closed Won</option>
                                    <option value="Closed Lost">Closed Lost</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                  <select class="form-control" name="opportunity_lead_source" required>
                                    <option selected="selected" disabled value="">Choose Lead Source</option>
                                    <option value="Cold Call">Cold Call</option>
                                    <option value="Existing Customer">Existing Customer</option>
                                    <option value="Self Generated">Self Generated</option>
                                    <option value="Employee">Employee</option>
                                    <option value="Partner">Partner</option>
                                    <option value="Public Relations">Public Relations</option>
                                    <option value="Direct Mail">Direct Mail</option>
                                    <option value="Conference">Conference</option>
                                    <option value="Trade Show">Trade Show</option>
                                    <option value="Website">Website</option>
                                    <option value="Word of mouth">Word of mouth</option>
                                    <option value="Email">Email</option>
                                    <option value="Campaign">Campaign</option>
                                    <option value="Other">Other</option>
                                  </select>
                                </div>
                            </div>
                        </div><br />
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                            <select class="form-control select2" name="opportunity_assigned_to" required>
                                <option selected="selected" disabled value="">Assigned to</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                             </select>
                         </div><br />
                        
                        <div class="form-group">
                            <textarea rows="10" cols="50" style="width: 100%;" placeholder="Description" name="opportunity_description" required></textarea>
                         </div>
                        <input type="number" class="form-control" name="opportunity_last_modified_by" value="{{ Auth::user()->id }}" style="display:none">
                        <br />
                        <br/><br />
                        
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
                        

                    </div>
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->

@endsection