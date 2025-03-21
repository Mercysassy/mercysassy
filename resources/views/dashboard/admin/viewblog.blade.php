@include('dashboard.admin.header')


@include('dashboard.admin.sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th>category</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>

                  @if (session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
              </div> 
            @endif

              @if (session('fail'))
                <div class="alert alert-danger">
                {{ session('fail') }}
              </div>
            @endif
                    @foreach($viewblogs as $viewblog)
                  <tr>
                    <td>{{$viewblog->title}}</td>
                    <td>{!!$viewblog->body !!}</td>
                    <td>{{$viewblog->category}}</td>
                    <td>{{$viewblog->author}}</td>                    
                    <td><img style="width: auto; height: 80px;" src="{{ URL::asset("/public/../$viewblog->images")}}" alt=""></td>
                    <td>{{$viewblog->status}}</td>
                    <td><a href="{{ url('/viewsingleblog/'.$viewblog->slug) }}" target="_blank" class="btn btn-info"><i class="fas fa-eye"></i> View</a></td>
                    <td><a href="{{ url('/editsingleblog/'.$viewblog->slug) }}" target="_blank" class="btn btn-primary"><i class="fas fa-edit"></i> edit</a></td>
                    <td><a href="{{ url('/deletesingleblog/'.$viewblog->id) }}"  class="btn btn-danger"><i class="fas fa-trash"></i> delete</a></td>
                    <td>{{$viewblog->created_at->format('D/M/Y')}}</a></td>
                  </tr>
                  @endforeach
                  
                  </tbody>


                  <tfoot>
                  <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th>category</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Date</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('dashboard.admin.footer')
  