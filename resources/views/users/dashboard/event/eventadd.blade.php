@extends('users.layouts.masterlayoutdashboard')


@section('title2')
   Add-Event
@endsection

@section('title3')
    Home
@endsection

@section('title4')
   Add-Event
@endsection


@section('content')

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Event</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('user.addeventdata')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Event Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="event_name">
                    @error('event_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Event Type</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter type" name="event_type">
                    @error('event_type')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Start Date</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="YY/MM/DD" name="start_date">
                    @error('start_date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">End Date</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="YY/MM/DD" name="end_date">
                    @error('end_date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select name="status" class="form-control" style="width:50%;">
                        <option value="inactive">Inactive</option>
                        <option value="active">Active</option>
                    </select>
                  </div>
                 
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{route('user.event')}}" class="btn btn-danger">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

      

          </div>
       

       
      </div>

</div>


@endsection