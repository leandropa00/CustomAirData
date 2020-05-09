@extends('layouts.master')
@section('page_title')
    {{ "Airlab | Dotos" }}
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <style>
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 5px 0px 10px 0px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                             @if (isset($_REQUEST['act']) && $_REQUEST['act']=='1')
                          <div class="row">
                             <div class="col-12">
                        <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Data Inserted successfully</strong>
                            </div>
                        </div>
                    </div>
                    <script>
                        setTimeout( function()  {window.location.href="dotos"; }, 1500);
                    </script>
                    @endif
                         @if ($message = Session::get('success'))
                          <div class="row">
                             <div class="col-12">
                        <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                            </div>
                        </div>
                    </div>
                        @endif
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Upload File List</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- Table with outer spacing -->
                                    <div class="table-responsive">
                                          <?php 
                                                    $dir = public_path('datos');
                                                    $files = scandir($dir, 0);
                                                    if( count($files) <3) { ?>
                                                         <p class="card-text">No file found.</p>

                                               <?php  } else { ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>File Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                                    for($i = 2; $i < count($files); $i++){ ?>
                                                      <tr>
                                                        <td><?php echo $files[$i]; ?></td>
                                                        </tr>
                                                      <?php  } ?>
                                               
                                            </tbody>
                                        </table>
                                      <div class="col-12">
                                <a href="{{url('/')}}/manual_upload_data.php" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Insert data to database </a>
                                    </div>
                                    <?php } ?>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            <div class="card">

                                <div class="card-header">
                                     <h4 class="card-title">Dotos</h4>
                                </div>

                                   
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="{{ route('file.upload.post') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <div class="row">
                                                <div class="col-6">
                                                <div class="form-group" style="display:flex;">
                                                <div class="fileUpload btn btn-primary">
                                                <span>Upload File</span>
                                                <input required name="file" type="file" id="file-upload" class="upload">
                                                    </div>
                                    <p id="file-name" style="margin: 20px;font-weight:700;"></p>
                                                    </div>
                                                    </div>
                                                
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('js')
<script>
  
  $("#file-upload").change(function(){
  
  $("#file-name").text(this.files[0].name);

});

</script>

@endsection