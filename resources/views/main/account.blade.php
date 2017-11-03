@extends('admin_template')

@section('title', ' SEARCH ACCOUNTS')
@section('links')
<li class="header" style="color: white;">Accounts</li>
@if (Auth::user()->account_type == 'Admin')
<li style="background: #111111;"><a href="/account/create"><span><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;&nbsp;Create Account</span></a></li>
@endif
<li style="background: #111111;"><a href="/account"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Accounts</span></a><hr /></li>
@endsection

@section('content')
      <section class="content">
       <div class="row" >
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
                
                    <th style="width: 30%;" >Name</th>
                  <th style="width: 12%;">City</th>
                  <th style="width: 12%;">Billing Country</th>
                  <th style="width: 12%;">Phone</th>
                  <th style="width: 15%;">Email Address</th>
                  <th style="width: 11%;">Date Created</th>
                    <th style="width: 8%;"></th>
                </tr>
                </thead>
                </table>
            </div>
            <div class="box-header" style="padding: 0; margin: 0; margin-left: 10px;">
              {{$accounts->links()}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table order-table table-stripped table-hover">
                <thead>
                <tr>
                  
                </tr>
                </thead>
                <tbody>
                    @foreach($accounts as $account)
                    <tr>
                      <td style="width: 30%;" >{{$account->account_name}}</td>
                      <td style="width: 12%;">{{$account->account_address_city}}</td>
                      <td style="width: 12%;">{{$account->account_address_country}}</td>
                      <td style="width: 12%;">{{$account->account_phone}}</td>
                      <td style="width: 15%;">{{$account->account_email}}</td>
                      <td style="width: 11%;">{{$account->created_at}}</td>
                      <td style="width: 8%;">
                          <a href="/account/edit/{{$account->id}}" data-toggle="tooltip" title="Edit">
                            <i class="fa fa-pencil-square-o" style="font-size: 17px;"></i>
                          </a>&nbsp;&nbsp;&nbsp;
                          <a href="/account/view/{{$account->id}}" data-toggle="tooltip" title="View">
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