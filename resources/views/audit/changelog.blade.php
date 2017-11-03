<html>
    <head>
        <title>PxyCRM | Change Log</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <br />
            <h2>CHANGE LOG: {{$title}}</h2><br />
            <table id="example2" class="table order-table table-stripped table-hover">
                  <thead>
                <tr>
                
                    <th style="width: 20%;" >Field</th>
                  <th style="width: 20%;">Old Value</th>
                  <th style="width: 20%;">New Value</th>
                  <th style="width: 20%;">Changed By</th>
                  <th style="width: 20%;">Change Date</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($logs as $log)
                    <tr>
                      <td style="width: 20%;" >{{$log->fieldName()}}</td>
                      <td style="width: 20%;">{{$log->old_value}}</td>
                      <td style="width: 20%;">{{$log->new_value}}</td>
                      <td style="width: 20%;">{{$log->userResponsible()->name}}</td>
                      <td style="width: 20%;">{{$log->created_at}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                
              </table>
        </div>            
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example2').DataTable();
            } );
        </script>
    </body>

</html>