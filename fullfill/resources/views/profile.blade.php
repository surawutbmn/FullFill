@extends('layouts.fe')
@section('title','Profile')
@section('content')
 <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User Profile</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    {{-- <img class="profile-user-img img-fluid img-circle admin_picture" src="{{ Auth::user()->picture }}" alt="User profile picture"> --}}
                  </div>
  
                  {{-- <h3 class="profile-username text-center admin_name">{{Auth::user()->name}}</h3> --}}
  
                  <p class="text-muted text-center">Admin</p>

                  <input type="file" name="admin_image" id="admin_image" style="opacity: 0;height:1px;display:none">
                  <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn"><b>Change picture</b></a>
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
          
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#personal_info" data-toggle="tab">Personal Information</a></li>
                    <li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab">Change Password</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="personal_info">
                      <form class="form-horizontal" method="POST" action="\" id="AdminInfoForm">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ Auth::user()->name }}" name="name">

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{ Auth::user()->email }}" name="email">
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Save Changes</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="change_password">
                        <form class="form-horizontal" action="/" method="POST" id="changePasswordAdminForm">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Old Passord</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputName" placeholder="Enter current password" name="oldpassword">
                              <span class="text-danger error-text oldpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
                              <span class="text-danger error-text newpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="cnewpassword">
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Update Password</button>
                            </div>
                          </div>
                        </form>
                      </div>
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">User Profile</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="/" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone_number }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="profile_image" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="profile_image" name="profile_image">
                                <small class="text-muted">Upload a new profile image.</small>
                            </div>
                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Cover Image</label>
                                <input type="file" class="form-control" id="cover_image" name="cover_image">
                                <small class="text-muted">Upload a new cover image.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
