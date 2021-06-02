@extends('users.layouts.masterlayoutdashboard')

@section('title2')
   Event
@endsection

@section('title3')
    Home
@endsection

@section('title4')
   Event
@endsection

@section('content')

<div class="container-fluid">
  @if ($message = Session::get('msg'))

      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{{ $message }}</strong>
      </div>

   @endif
    <div class="row">
        
        <a href="{{route('user.addevent')}}">
            <button type="button" class="btn btn-primary btn-sm">Add Event</button>
        </a>
       
     <div class="col-12 pt-2">
            <div class="card">
              
              <div class="card-body table-responsive p-0">
                <div class="table-responsive">

                    <!--Table-->
                    <table class="table">
                  
                      <!--Table head-->
                      <thead>
                        <tr>
                          <th>S.no</th>
                          <th class="th-lg">Name</th>
                          <th class="th-lg">Event Type</th>
                          <th class="th-lg">Start Date</th>
                          <th class="th-lg">End Date</th>
                          <th class="th-lg">Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <!--Table head-->
                  
                      <!--Table body-->
                      @foreach ($event as $events)

                      <tbody>
                        <tr>
                          <td>{{ $events->id }}</td>
                          <td>{{ $events->eventname }}</td>
                          <td>{{ $events->event_type }}</td>
                          <td> {{ date('Y-m-d',strtotime($events->startdate)) }} </td>
                          <td> {{ date('Y-m-d',strtotime($events->enddate)) }} </td>
                          <td>{{ $events->status }}</td>
                          <td>
                            
                            <a class="btn btn-primary" href="{{route('user.editevent',['id'=>$events->id])}}" role="button">Edit</a>
                            <a class="btn btn-danger" href="{{route('user.eventdelete',['id'=>$events->id])}}" role="button" onclick="return confirm('Are you sure?')" >Delete</a>
                          
                          </td>
                        </tr>
                      </tbody>
                      <!--Table body-->
                          
                      @endforeach
                    
                  
                    </table>
                    <!--Table-->
                  
                  </div>    
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
</div>



@endsection