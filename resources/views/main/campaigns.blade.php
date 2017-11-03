@extends('admin_template')

@section('title')
{{$title}}
@endsection

@section('links')
<li class="header" style="color: white;">Campaigns</li>
<li style="background: #111111;"><a href="/campaign/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Create Campaign</span></a></li>
<li style="background: #111111;"><a href="/campaign"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Campaign</span></a></li>
<li style="background: #111111;"><a href="/campaign/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Campaigns</span></a><hr /></li>
<!--<li style="background: #111111;"><a href="/target"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;Targets</span></a></li>
<li style="background: #111111;"><a href="/targetlists"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;Target Lists</span></a></li>
<li style="background: #111111;"><a href="#"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Email Templates</span></a></li>-->
@endsection

@section('content')
      <section class="content">
          <div class="row">
           <div class="col-sm-12" style="background: #CFE3EA; padding: 40px; margin-bottom: 30px;">
               <form>
                   <div class="form-group">
                        <h4>SEARCH: </h4>
                        <input type="search" class="form-control light-table-filter" data-table="order-table" style="width: 60%;" placeholder="Search Accounts"><br />
                        <input type="reset" class="form-control btn bg-navy btn-flat search-cancel-btn" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLEAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" style="width:100px;">
                   </div>
               </form>
           </div>     
       </div>
        <div class="row">
        <div class="col-xs-12" style="padding: 0;">
          <div class="box" style="padding: 0; margin: 0;">
            <div class="box-header" style="background: #d3d3d3;">
              <table id="example2" class="table table-stripped table-hover" style="margin-bottom: -12px; border: none;">
                <thead>
                <tr>
                    <th style="width: 22%;">Campaign Name</th>
                    <th style="width: 22%;">Account</th>
                    <th style="width: 15%;">Status</th>
                    <th style="width: 10%;">Type</th>
                    <th style="width: 13%;">Assigned To</th>
                    <th style="width: 10%;">Date Created</th>
                    <th style="width: 8%;"></th>
                </tr>
                  </thead></table>
            </div>
            <div class="box-header" style="padding: 0; margin: 0; margin-left: 10px;">
              {{$campaigns->links()}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table order-table table-stripped table-hover">
                <tbody>
                    @foreach($campaigns as $campaign)
                <tr>
                  <td style="width: 22%;">{{$campaign->campaign_name}}</td>
                  <td style="width: 22%;">{{$campaign->account_name}}</td>
                  <td style="width: 15%;">{{$campaign->campaign_status}}</td>
                  <td style="width: 10%;">{{$campaign->campaign_type}}</td>
                  <td style="width: 13%;">{{$campaign->name}}</td>
                  <td style="width: 10%;">{{$campaign->created_at}}</td>
                  <td style="width: 8%;">
                      <a href="/campaign/edit/{{$campaign->id}}" data-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil-square-o" style="font-size: 17px;"></i>
                      </a>&nbsp;&nbsp;&nbsp;
                      <a href="/campaign/view/{{$campaign->id}}" data-toggle="tooltip" title="View">
                          <i class="fa fa-eye" style="font-size: 17px;"></i>
                      </a>
                  </td>
                </tr>
                    @endforeach
                  </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection