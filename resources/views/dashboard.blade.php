@extends('admin_template')

@section('title', 'Dashboard')

@section('content')
      <div class='row'>
        
        <div class='col-md-6'>
            <!-- Box -->
          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;MY CALLS</h3>
                <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped">
                <thead>
                <tr>
                  <th>Subject</th>
                  <th>Contact</th>
                  <th>Call Date</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($calls as $call)
                <tr>
                  <td>{{$call->call_subject}}</td>
                  <td>{{$call->contact_first_name}}&nbsp;{{$call->contact_last_name}}</td>
                  <td>{{$call->call_date}}</td>
                  <td>{{$call->call_status}}</td>
                </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  {{$calls->links()}}
                  </tfoot>
                  
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
             <div class='col-md-6'>
            <!-- Box -->
          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>&nbsp;&nbsp;TOP OPPORTUNITIES</h3>
                <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Opportunity Name</th>
                  <th>Account Name</th>
                  <th>Amount</th>
                  <th>Expected Close Date</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($opportunities as $opportunity)
                <tr>
                  <td>{{$opportunity->opportunity_name}}</td>
                  <td>{{$opportunity->account_name}}</td>
                  <td>{{$opportunity->opportunity_amount}}</td>
                  <td>{{$opportunity->opportunity_closing_date}}</td>
                </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  {{$opportunities->links()}}
                  </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


      </div>
    <div class="row">
          <div class='col-md-6'>
            <!-- Box -->
          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;MY MEETINGS</h3>
                <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Subject</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($meetings as $meeting)
                    <tr>
                      <td>{{$meeting->meeting_subject}}</td>
                      <td>{{$meeting->meeting_date}}</td>
                      <td>{{$meeting->meeting_status}}</td>
                    </tr>
                    @endforeach
               </tbody>
               <tfoot>
                  {{$meetings->links()}}
               </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          <div class='col-md-6'>
            <!-- Box -->
          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title"><i class="fa fa-suitcase" aria-hidden="true"></i>&nbsp;&nbsp;ACTIVITY STREAM</h3>
                <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <tbody>
                    @foreach($history as $activity)
                    <tr>
                        <td>
                          <a href="/{{strtolower(substr($activity->revisionable_type, 4))}}/view/{{$activity->revisionable_id}}" style="color: black;">
                          <strong>{{$activity->name}}</strong> created a new {{substr($activity->revisionable_type, 4)}}
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
    </div>
    <div class="row">
       <div class='col-md-6'>
            <!-- Box -->
          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title"><i class="fa fa-diamond" aria-hidden="true"></i>&nbsp;&nbsp;MY LEADS</h3>
                <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Phone</th>
                  <th>Email Address</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($leads as $lead)
                    <tr>
                      <td>{{$lead->lead_first_name}}&nbsp;{{$lead->lead_last_name}}</td>
                      <td>{{$lead->lead_role}}</td>
                      <td>{{$lead->lead_mobile}}</td>
                      <td>{{$lead->lead_email}}</td>
                    </tr>
                    @endforeach
               </tbody>
               <tfoot>
                  {{$leads->links()}}
               </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>



@endsection