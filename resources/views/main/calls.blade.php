@extends('admin_template')

@section('title')
{{$title}}
@endsection

@section('links')
<li class="header" style="color: white;">Calls</li>
<li style="background: #111111;"><a href="/call/create"><span><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;Log Call</span></a></li>
<li style="background: #111111;"><a href="/call"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Calls</span></a></li>
<li style="background: #111111;"><a href="/call/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Calls</span></a><hr /></li>
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
                    <th style="width: 31%;">Subject</th>
                    <th style="width: 31%;">Contact</th>
                    <th style="width: 15%;">Date</th>
                    <th style="width: 15%;">Created At</th>
                    <th style="width: 8%;"></th>
                </tr>
                  </thead></table>
            </div>
            <div class="box-header" style="padding: 0; margin: 0; margin-left: 10px;">
              {{$calls->links()}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table order-table table-stripped table-hover">
                <tbody>
                    @foreach($calls as $call)
                    <tr>
                      <td style="width: 31%;">{{$call->call_subject}}</td>
                      <td style="width: 31%;">{{$call->contact_first_name}}&nbsp;{{$call->contact_last_name}}</td>
                      <td style="width: 15%;">{{$call->call_date}}</td>
                      <td style="width: 15%;">{{$call->created_at}}</td>
                      <td style="width: 8%;">
                          <a href="/call/edit/{{$call->id}}" data-toggle="tooltip" title="Edit">
                            <i class="fa fa-pencil-square-o" style="font-size: 17px;"></i>
                          </a>&nbsp;&nbsp;&nbsp;
                          <a href="/call/view/{{$call->id}}" data-toggle="tooltip" title="View">
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