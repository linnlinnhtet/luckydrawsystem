@extends('Admin.index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Winning Number</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Winning Number</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Winning Number</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/admin/winning_number')}}" method="POST" class="needs-validation">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <!-- select -->
                      <div class="form-group">
                        <label for="winning_number">Winning Number</label>
                        <input type="number" class="form-control {{$errors->has('winning_number')?'is-invalid':''}}" value="{{old('winning_number')}}" name="winning_number" id="winning_number">
                        @if($errors->has('winning_number'))
                          <span class="invalid-feedback" >
                            <strong>Your input is Invalid OR Please Fill in Winning Number</strong>
                          </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="customer_id">Customer Name</label>
                        <select name="customer_id" id="customer_id" class="form-control {{$errors->has('customer_id')?'is-invalid':''}}" value="{{old('customer_id')}}">
                            <option selected disabled>Please Select</option>
                            @foreach ($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>                                
                            @endforeach
                        </select>

                        @if($errors->has('customer_id'))
                          <span class="invalid-feedback" >
                            <strong>Your input is Invalid OR Please Choose At least One Customer</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                  </div>
              </form>

            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>
@endsection
