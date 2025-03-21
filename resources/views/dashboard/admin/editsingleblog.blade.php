@include('dashboard.admin.header')


@include('dashboard.admin.sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Single Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add blog</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('updateblog/'.$editblog->slug)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
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
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="title" value="{{$editblog->title}}" name="title" @error('title') is-invalid @enderror class="form-control" id="exampleInputEmail1" placeholder="Enter title">

                  </div>
                  @error('title')
                  <span class="text-danger">{{$message}}</span>
                  @enderror

                 
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Author Name</label>
                    <input type="text" value="{{$editblog->author}}" name="author" @error('author') is-invalid @enderror class="form-control" id="exampleInputEmail1" placeholder="Enter author">
                  </div>
                  @error('Author')
                  <span class="text-danger">{{$message}}</span>
                  @enderror

                  <div class="form-group">
                <textarea class="textarea" name="body" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$editblog->body}}</textarea>
              </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">category</label>
                    <select name="category" class="form-control">
                        <option value="{{$editblog->category}}">{{$editblog->category}}</option>
                      <option value="Technology">Technology</option>
                      <option value="education">Education</option>
                      <option value="health">Health</option>
                      <option value="lifestlye">lifestlye</option>
                    </select>
                    <!-- <input type="text" name="category" @error('category') is-invalid @enderror class="form-control" id="exampleInputEmail1" placeholder="Enter category"> -->
                  </div>
                  @error('category')
                  <span class="text-danger">{{$message}}</span>
                  @enderror

                  <td><img style="width: auto; height: 80px;" src="{{ URL::asset("/public/../$editblog->images")}}" alt=""></td>
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="images" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
          </div>

             
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('dashboard.admin.footer')
  