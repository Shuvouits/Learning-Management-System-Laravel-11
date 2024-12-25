@extends('backend.user.master')

@section('content')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">Settings</h3>
    </div>
    <ul class="nav nav-tabs generic-tab pb-30px" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="edit-profile-tab" data-toggle="tab" href="#edit-profile" role="tab"
                aria-controls="edit-profile" aria-selected="false">
                Profile
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password"
                aria-selected="true">
                Password
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="change-email-tab" data-toggle="tab" href="#change-email" role="tab"
                aria-controls="change-email" aria-selected="false">
                Change Email
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="withdraw-tab" data-toggle="tab" href="#withdraw" role="tab" aria-controls="withdraw"
                aria-selected="false">
                Withdraw
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account"
                aria-selected="false">
                Account
            </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">

            <form  class="col-md-12"  method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="setting-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                    <h3 class="fs-17 font-weight-semi-bold pb-4">Edit Profile</h3>
                    <div class="media media-card align-items-center">
                        <div class="media-img media-img-lg mr-4 bg-gray">
                            <img class="mr-3" id="photoPreview"  src="{{  auth()->user()->photo ? asset(auth()->user()->photo) :  asset('frontend/images/team11.jpg')}}"   alt="avatar image">
                        </div>
                        <div class="media-body">
                            <div class="file-upload-wrap file-upload-wrap-2">
                                <input type="file" name="photo" id="Photo" class="multi file-upload-input with-preview" multiple>
                                <span class="file-upload-text"><i class="la la-photo mr-2"></i>Upload a
                                    Photo</span>
                            </div><!-- file-upload-wrap -->
                            <p class="fs-14">Max file size is 5MB, Minimum dimension: 200x200 And Suitable
                                files are .jpg & .png</p>
                        </div>
                    </div><!-- end media -->

                    <div class="row mt-3">

                        <div class="input-box col-lg-6">
                            <label class="label-text">First Name</label>
                            <div class="form-group">
                                <input class="form-control form--control" name="first_name" placeholder="Enter your first name" type="text"  value="{{ old('first_name', auth()->user()->first_name) }}">
                                <span class="la la-user input-icon"></span>
                            </div>
                        </div><!-- end input-box -->
                        <div class="input-box col-lg-6">
                            <label class="label-text">Last Name</label>
                            <div class="form-group">
                                <input class="form-control form--control" placeholder="Enter your second name"  type="text" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}" >
                                <span class="la la-user input-icon"></span>
                            </div>
                        </div><!-- end input-box -->

                        <div class="input-box col-lg-6">
                            <label class="label-text">User Name</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="text" placeholder="Enter your full name" name="name"  value="{{ old('name', auth()->user()->name) }}" >
                                <span class="la la-user input-icon"></span>
                            </div>
                        </div><!-- end input-box -->
                        <div class="input-box col-lg-6">
                            <label class="label-text">Email Address</label>
                            <div class="form-group">
                                <input class="form-control form--control" placeholder="Enter your email" type="email" name="email" value="{{ old('first_name', auth()->user()->email) }}" >
                                <span class="la la-envelope input-icon"></span>
                            </div>
                        </div><!-- end input-box -->

                        <div class="input-box col-lg-12">
                            <label class="label-text">Phone Number</label>
                            <div class="form-group">
                                <input class="form-control form--control" placeholder="Enter your phone number" type="text" name="phone" value="{{ old('first_name', auth()->user()->phone) }}" >
                                <span class="la la-phone input-icon"></span>
                            </div>
                        </div><!-- end input-box -->

                        <div class="input-box col-lg-12">
                            <label class="label-text">Bio</label>
                            <div class="form-group">
                                <textarea class="form-control form--control user-text-editor pl-3" name="bio">

                                    {{ old('bio', auth()->user()->bio) }}

                                </textarea>
                            </div>
                        </div><!-- end input-box -->

                        <div class="input-box col-lg-12 py-2">
                            <button class="btn theme-btn">Save Changes</button>
                        </div><!-- end input-box -->



                    </div>












                </div><!-- end setting-body -->
            </form>



        </div><!-- end tab-pane -->


        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
            <div class="setting-body">
                <h3 class="fs-17 font-weight-semi-bold pb-4">Change Password</h3>
                <form method="post" class="row">
                    <div class="input-box col-lg-4">
                        <label class="label-text">Old Password</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="text"
                                placeholder="Old Password">
                            <span class="la la-lock input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-4">
                        <label class="label-text">New Password</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="text"
                                placeholder="New Password">
                            <span class="la la-lock input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-4">
                        <label class="label-text">Confirm New Password</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="text"
                                placeholder="Confirm New Password">
                            <span class="la la-lock input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-12 py-2">
                        <button class="btn theme-btn">Change Password</button>
                    </div><!-- end input-box -->
                </form>
                <form method="post" class="pt-5 mt-5 border-top border-top-gray">
                    <h3 class="fs-17 font-weight-semi-bold pb-1">Forgot Password then Recover Password</h3>
                    <p class="pb-4">Enter the email of your account to reset password. Then you will
                        receive a link to email
                        to reset the password. If you have any issue about reset password
                        <a href="contact.html" class="text-color">contact us</a>
                    </p>
                    <div class="input-box">
                        <label class="label-text">Email Address</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="email" name="email"
                                placeholder="Enter email address">
                            <span class="la la-envelope input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box py-2">
                        <button class="btn theme-btn">Recover Password</button>
                    </div><!-- end input-box -->
                </form>
            </div><!-- end setting-body -->
        </div><!-- end tab-pane -->

        <div class="tab-pane fade" id="change-email" role="tabpanel" aria-labelledby="change-email-tab">
            <div class="setting-body">
                <h3 class="fs-17 font-weight-semi-bold pb-4">Change Email</h3>
                <form method="post" class="row">
                    <div class="input-box col-lg-4">
                        <label class="label-text">Old Email</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="text"
                                placeholder="Old Email">
                            <span class="la la-envelope input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-4">
                        <label class="label-text">New Email</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="text"
                                placeholder="New Email">
                            <span class="la la-envelope input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-4">
                        <label class="label-text">Confirm New Email</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="text"
                                placeholder="Confirm New Email">
                            <span class="la la-envelope input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-12 py-2">
                        <button class="btn theme-btn">Change Email</button>
                    </div><!-- end input-box -->
                </form>
            </div><!-- end setting-body -->
        </div><!-- end tab-pane -->
        <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-labelledby="withdraw-tab">
            <div class="setting-body">
                <h3 class="fs-17 font-weight-semi-bold pb-4">Select a Withdraw Method</h3>
                <form method="post" class="row mb-40px">
                    <div class="col-lg-2 responsive-column-half">
                        <div class="custom-control custom-radio mb-3 pl-0">
                            <input type="radio" class="custom-control-input" id="bankTransfer" name="radio-stacked"
                                required>
                            <label class="custom-control-label custom--control-label custom--control-label-boxed"
                                for="bankTransfer">
                                <span class="font-weight-semi-bold text-black d-block">Bank Transfer</span>
                                <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                            </label>
                        </div>
                    </div><!-- end col-lg-2 -->
                    <div class="col-lg-2 responsive-column-half">
                        <div class="custom-control custom-radio mb-3 pl-0">
                            <input type="radio" class="custom-control-input" id="eCheck" name="radio-stacked"
                                required>
                            <label class="custom-control-label custom--control-label custom--control-label-boxed"
                                for="eCheck">
                                <span class="font-weight-semi-bold text-black d-block">E-Check</span>
                                <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                            </label>
                        </div>
                    </div><!-- end col-lg-2 -->
                    <div class="col-lg-2 responsive-column-half">
                        <div class="custom-control custom-radio mb-3 pl-0">
                            <input type="radio" class="custom-control-input" id="payoneer" name="radio-stacked"
                                required>
                            <label class="custom-control-label custom--control-label custom--control-label-boxed"
                                for="payoneer">
                                <span class="font-weight-semi-bold text-black d-block">Payoneer</span>
                                <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                            </label>
                        </div>
                    </div><!-- end col-lg-2 -->
                    <div class="col-lg-2 responsive-column-half">
                        <div class="custom-control custom-radio mb-3 pl-0">
                            <input type="radio" class="custom-control-input" id="PayPal" name="radio-stacked"
                                required>
                            <label class="custom-control-label custom--control-label custom--control-label-boxed"
                                for="PayPal">
                                <span class="font-weight-semi-bold text-black d-block">PayPal</span>
                                <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                            </label>
                        </div>
                    </div><!-- end col-lg-2 -->
                    <div class="col-lg-2 responsive-column-half">
                        <div class="custom-control custom-radio mb-3 pl-0">
                            <input type="radio" class="custom-control-input" id="skrill" name="radio-stacked"
                                required>
                            <label class="custom-control-label custom--control-label custom--control-label-boxed"
                                for="skrill">
                                <span class="font-weight-semi-bold text-black d-block">Skrill</span>
                                <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                            </label>
                        </div>
                    </div><!-- end col-lg-2 -->
                    <div class="col-lg-2 responsive-column-half">
                        <div class="custom-control custom-radio mb-3 pl-0">
                            <input type="radio" class="custom-control-input" id="stripe" name="radio-stacked"
                                required>
                            <label class="custom-control-label custom--control-label custom--control-label-boxed"
                                for="stripe">
                                <span class="font-weight-semi-bold text-black d-block">Stripe</span>
                                <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                            </label>
                        </div>
                    </div><!-- end col-lg-2 -->
                </form>
                <form method="post" class="row">
                    <h3 class="fs-17 font-weight-semi-bold pb-4 col-lg-12">Account info</h3>
                    <div class="input-box col-lg-4">
                        <label class="label-text">Account Name</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="text" value="Alex Smith">
                            <span class="la la-user input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-4">
                        <label class="label-text">Account Number</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="text"
                                value="3275476222500">
                            <span class="la la-pencil input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-4">
                        <label class="label-text">Bank Name</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="text"
                                value="South State Bank">
                            <span class="la la-bank input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-6">
                        <label class="label-text">IBAN</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="text" value="3030">
                            <span class="la la-pencil input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-6">
                        <label class="label-text">BIC/SWIFT</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="text" value="CDDHDBBL">
                            <span class="la la-pencil input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-12 py-2">
                        <button class="btn theme-btn">Save withdraw account</button>
                    </div><!-- end input-box -->
                </form>
            </div><!-- end setting-body -->
        </div><!-- end tab-pane -->
        <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
            <div class="setting-body">
                <h3 class="fs-17 font-weight-semi-bold pb-4">My Account</h3>
                <form method="post" class="mb-40px">
                    <div class="custom-control-wrap d-flex flex-wrap align-items-center">
                        <div class="custom-control custom-radio pl-0 flex-shrink-0 mr-3 mb-2">
                            <input type="radio" class="custom-control-input" id="deactivateAccount"
                                name="radio-stacked" required>
                            <label class="custom-control-label custom--control-label custom--control-label-boxed"
                                for="deactivateAccount">
                                <span class="font-weight-semi-bold text-black">Deactivate Account</span>
                            </label>
                        </div>
                        <button class="btn theme-btn mb-2">Deactivate</button>
                    </div><!-- end custom-control-wrap -->
                </form>
                <div class="section-block"></div>
                <div class="danger-zone pt-40px">
                    <h4 class="fs-17 font-weight-semi-bold text-danger">Delete Account Permanently</h4>
                    <p class="pt-1 pb-4"><span class="text-warning">Warning: </span>Once you delete your
                        account, there is no going back. Please be certain.</p>
                    <button class="btn theme-btn" data-toggle="modal" data-target="#deleteModal">Delete
                        my account</button>
                </div>
            </div><!-- end setting-body -->
        </div><!-- end tab-pane -->


    </div><!-- end tab-content -->


   
@endsection