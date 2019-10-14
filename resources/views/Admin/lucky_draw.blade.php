@extends('Admin.index')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Lucky Draw</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Lucky Draw</li>
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
                <h3 class="card-title">Lucky Draw</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="luckyForm" role="form" action="{{url('/admin/luckydraw')}}" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <!-- select -->
                      <div class="form-group">
                        <label for="priceType">Prize Type *</label>
                        <select name="price_id" id="priceType" class="form-control">
                            <option selected disabled>Please Select</option>
                            @foreach ($prizes as $prize)
                              <option value="{{$prize->id}}">{{$prize->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="generateRandom">Generate Randomly</label>
                        <select name="generateRandom" id="generateRandom" class="form-control">
                            <option selected disabled>Please Select</option>
                            <option value="0">Yes</option>
                            <option value="1">No</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Winning Number</label>
                        {{-- @foreach($winningNumber as $win) --}}
                          <input type="text" class="form-control"  name="winningNo" id="winningNo">
                        {{-- @endforeach --}}
                      </div>
                      
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" id="btn_draw" class="btn btn-primary">DRAW</button>
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
@push('scripts')
    <script>
      $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
    
    $("#generateRandom").on('change', function(e){
          var generateRandom = $("#generateRandom").val();
              // alert(generateRandom);
      if(generateRandom=== "1"){
        $("#luckyForm").submit();
      }else{
          var prizeType = $("#priceType").val();
          $.ajax({
           'type':'GET',
           'url':'/generate_number',
           'data': {prizeType: prizeType},
           success:function(data){
             console.log(data);
              $('#winningNo').val(data[0].winning_number);
           },
           error: function(data){
             alert('Error'+data);
           }

        });

      }

    });
     
  //   $("#priceType").on('change', function(e){
  //       e.preventDefault();

  //       var optionSelected = $(this).find("option:selected");
  //       var prize_id = optionSelected.val();
  //        alert(prize_id);

  //       $.ajax({

  //          type:'POST',

  //          url:'/admin/luckydraw/create',

  //          data:{prize_id:prize_id},

  //          success:function(data){
  //           console.log(data);
  //             alert(data.success);

  //          }

  //       });

        

	// });


    </script>
@endpush
