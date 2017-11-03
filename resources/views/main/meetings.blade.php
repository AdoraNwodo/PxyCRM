@extends('admin_template')

@section('title')
{{$title}}
@endsection

@section('links')
<li class="header" style="color: white;">Meetings</li>
<li style="background: #111111;"><a href="/meeting/create"><span><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;&nbsp;Schedule Meeting</span></a></li>
<li style="background: #111111;"><a href="/meeting"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View Meetings</span></a></li>
<li style="background: #111111;"><a href="/meeting/user"><span><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;My Meetings</span></a><hr /></li>
@endsection

@section('content')
<section class="content">
<div class="row">
   <div class="col-sm-12" style="background: #CFE3EA; padding: 40px; margin-bottom: 30px;">
       <form>
           <div class="form-group">
                <h4>SEARCH: </h4>
                <input type="search" class="form-control light-table-filter" data-table="order-table" style="width: 60%;" placeholder="Search Meetings"><br />
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
                <th style="width: 22%;">Subject</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 20%;">Date</th>
                <th style="width: 15%;">Time</th>
                <th style="width: 15%;">Location</th>
                <th style="width: 10%;">Date Created</th>
                <th style="width: 8%;"></th>
            </tr>
              </thead></table>
        </div>
        <div class="box-header" style="padding: 0; margin: 0; margin-left: 10px;">
              {{$meetings->links()}}
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table order-table table-stripped table-hover">
            <tbody>
                @foreach($meetings as $meeting)
                <tr>
                  <td style="width: 22%;">{{$meeting->meeting_subject}}</td>
                  <td style="width: 10%;">{{$meeting->meeting_status}}</td>
                  <td style="width: 20%;">{{$meeting->meeting_date}}</td>
                  <td style="width: 15%;">{{$meeting->meeting_time}}</td>
                  <td style="width: 15%;">{{$meeting->meeting_location}}</td>
                  <td style="width: 10%;">{{$meeting->created_at}}</td>
                  <td style="width: 8%;">
                      <a href="/meeting/edit/{{$meeting->id}}" data-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil-square-o" style="font-size: 17px;"></i>
                      </a>&nbsp;&nbsp;&nbsp;
                      <a href="/meeting/view/{{$meeting->id}}" data-toggle="tooltip" title="View">
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
</section>


@endsection