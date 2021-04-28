@extends('layouts.outline')

@section('content')

    <!-- ============== Candidate Dashboard ====================== -->
    <section class="tr-single-detail gray-bg">
        <div class="container">
            <div class="row">

                <!-- Sidebar Start -->
                <div class="col-md-4 col-sm-12">
                    <div class="dashboard-wrap">

                        <div class="dashboard-thumb">
                            <div class="dashboard-th-pic">
                                <img src="https://via.placeholder.com/90x90" class="img-fluid mx-auto img-circle" alt="" />
                            </div>
                            <h4 class="mb-1">Asana</h4>
                            <span class="text-success">Project Management</span>
                        </div>

                        <!-- Nav tabs -->
                        <ul class="nav dashboard-verticle-nav">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#c-profile"><i class="ti-user"></i>Company Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#manage-jobs"><i class="ti-file"></i>Manage jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#transactions"><i class="lni-heart-filled"></i>Transactions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#shortlisted"><i class="lni-briefcase"></i>Shortlisted</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#alert"><i class="lni-alarm"></i>Alert job</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#post-new-job"><i class="ti-plus"></i>Post New job</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#package"><i class="lni-tag"></i>Package</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="company-details.blade.php"><i class="lni-user"></i>View Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#change-password"><i class="lni-lock"></i>Change Password</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)"><i class="lni-trash"></i>Delete Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.html"><i class="lni-exit"></i>Log Out</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- /col-md-4 -->

                <div class="col-md-8 col-sm-12">
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <!-- My Profile -->
                        <div class="tab-pane active container" id="c-profile">

                            <!-- Company Information -->
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-home"></i> Company Information</h4>
                                </div>

                                <div class="tr-single-body">
                                    <div class="row">

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input class="form-control" type="text" value="Drizvato Ltd">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Company Slogan</label>
                                                <input class="form-control" type="text" value="Design & Development Company">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Allow Search listing</label>
                                                <select id="search-allow" class="js-states form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Overview</label>
                                                <div id="summernote"><p>Hello Description</p></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Employer Logo</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Cover Picture</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile2">
                                                    <label class="custom-file-label" for="customFile2">Choose file</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- /Basic Info -->

                            <!-- Contact Info -->
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-headphone"></i> Contact Info</h4>
                                </div>

                                <div class="tr-single-body">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo">Phone Number</label>
                                                <input class="form-control" type="text" value="91 254 548 7584">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo">Email</label>
                                                <input class="form-control" type="text" value="drizvato@gmail.com">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo">Website</label>
                                                <input class="form-control" type="text" value="https://drizvato.com">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo">Country</label>
                                                <input class="form-control" type="text" value="India">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo">City</label>
                                                <input class="form-control" type="text" value="Chandigarh">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo">Complete Address</label>
                                                <input class="form-control" type="text" value="2850, Near Gurudwara">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo">Latitude</label>
                                                <input class="form-control" type="text" value="-0.3306495">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo">Longitude</label>
                                                <input class="form-control" type="text" value="51.5353994">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- /Contact Info -->

                            <!-- Social Account -->
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-new-window"></i> Social Account</h4>
                                </div>

                                <div class="tr-single-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo"><i class="lni-facebook"></i>Facebook URL</label>
                                                <input class="form-control" type="text" value="https://facebook.com/">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo"><i class="lni-google-plus"></i>Google+ URL</label>
                                                <input class="form-control" type="text" value="https://plus.google.com">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo"><i class="lni-linkedin"></i>LinkedIn URL</label>
                                                <input class="form-control" type="text" value="https://linkedin.com">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo"><i class="lni-twitter"></i>Twitter URL</label>
                                                <input class="form-control" type="text" value="htps://twitter.com">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo"><i class="lni-instagram"></i>Instagram URL</label>
                                                <input class="form-control" type="text" value="https://instagram.com">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo"><i class="lni-pinterest"></i>Pinterest URL</label>
                                                <input class="form-control" type="text" value="https://pinterest.com/">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /Social Account -->

                            <!-- Advance Information -->
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-heart"></i> Advance Information</h4>
                                </div>

                                <div class="tr-single-body">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo">Est. Since</label>
                                                <input class="form-control" type="text" value="1992">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo">Team Size</label>
                                                <input class="form-control" type="text" value="80+">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo">Branches</label>
                                                <input class="form-control" type="text" value="10">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="social-nfo">Business Type</label>
                                                <select id="business-type" class="js-states form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="1" selected>Limited Company</option>
                                                    <option value="2">Private Limited</option>
                                                    <option value="3">C Corporations</option>
                                                    <option value="4">S Corporations</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- /Advance Information -->

                            <a href="#" class="btn btn-info btn-md full-width">Save & Update<i class="ml-2 ti-arrow-right"></i></a>

                        </div>

                        <!-- Manage jobs -->
                        <div class="tab-pane" id="manage-jobs">

                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="lni-file"></i> Manage jobs</h4>
                                </div>

                                <div class="tr-single-body">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <!-- Single Manage job -->
                                            <div class="manage-list">

                                                <div class="mg-list-wrap">
                                                    <div class="mg-list-thumb">
                                                        <img src="https://via.placeholder.com/90x90" class="mx-auto" alt="" />
                                                    </div>
                                                    <div class="mg-list-caption">
                                                        <h4 class="mg-title">Shaurya Preet</h4>
                                                        <span class="mg-subtitle">Web Designer</span>
                                                        <span><em>Last activity</em> 4 weeks ago. <em>Registered</em> 4 weeks ago</span>

                                                    </div>
                                                </div>

                                                <div class="mg-action">
                                                    <div class="btn-group custom-drop">
                                                        <button type="button" class="btn btn-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu pull-right animated flipInX">
                                                            <a href="#">Accending</a>
                                                            <a href="#">Decending</a>
                                                            <a href="#">By Date</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group ml-2">
                                                        <a href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Single Manage job -->
                                            <div class="manage-list">

                                                <div class="mg-list-wrap">
                                                    <div class="mg-list-thumb">
                                                        <img src="https://via.placeholder.com/90x90" class="mx-auto" alt="" />
                                                    </div>
                                                    <div class="mg-list-caption">
                                                        <h4 class="mg-title">PHP Developer</h4>
                                                        <span class="mg-subtitle">Google infotech</span>
                                                        <span><em>Last activity</em> 4 weeks ago. <em>Registered</em> 4 weeks ago</span>

                                                    </div>
                                                </div>

                                                <div class="mg-action">
                                                    <div class="btn-group custom-drop">
                                                        <button type="button" class="btn btn-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu pull-right animated flipInX">
                                                            <a href="#">Accending</a>
                                                            <a href="#">Decending</a>
                                                            <a href="#">By Date</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group ml-2">
                                                        <a href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Single Manage job -->
                                            <div class="manage-list">

                                                <div class="mg-list-wrap">
                                                    <div class="mg-list-thumb">
                                                        <img src="https://via.placeholder.com/90x90" class="mx-auto" alt="" />
                                                    </div>
                                                    <div class="mg-list-caption">
                                                        <h4 class="mg-title">Wordpress Developer</h4>
                                                        <span class="mg-subtitle">Google infotech</span>
                                                        <span><em>Last activity</em> 4 weeks ago. <em>Registered</em> 4 weeks ago</span>

                                                    </div>
                                                </div>

                                                <div class="mg-action">
                                                    <div class="btn-group custom-drop">
                                                        <button type="button" class="btn btn-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu pull-right animated flipInX">
                                                            <a href="#">Accending</a>
                                                            <a href="#">Decending</a>
                                                            <a href="#">By Date</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group ml-2">
                                                        <a href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Single Manage job -->
                                            <div class="manage-list">

                                                <div class="mg-list-wrap">
                                                    <div class="mg-list-thumb">
                                                        <img src="https://via.placeholder.com/90x90" class="mx-auto" alt="" />
                                                    </div>
                                                    <div class="mg-list-caption">
                                                        <h4 class="mg-title">App Developer</h4>
                                                        <span class="mg-subtitle">Google infotech</span>
                                                        <span><em>Last activity</em> 4 weeks ago. <em>Registered</em> 4 weeks ago</span>

                                                    </div>
                                                </div>

                                                <div class="mg-action">
                                                    <div class="btn-group custom-drop">
                                                        <button type="button" class="btn btn-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu pull-right animated flipInX">
                                                            <a href="#">Accending</a>
                                                            <a href="#">Decending</a>
                                                            <a href="#">By Date</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group ml-2">
                                                        <a href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Single Manage job -->
                                            <div class="manage-list">

                                                <div class="mg-list-wrap">
                                                    <div class="mg-list-thumb">
                                                        <img src="https://via.placeholder.com/90x90" class="mx-auto" alt="" />
                                                    </div>
                                                    <div class="mg-list-caption">
                                                        <h4 class="mg-title">Web Designer</h4>
                                                        <span class="mg-subtitle">Google infotech</span>
                                                        <span><em>Last activity</em> 4 weeks ago. <em>Registered</em> 4 weeks ago</span>

                                                    </div>
                                                </div>

                                                <div class="mg-action">
                                                    <div class="btn-group custom-drop">
                                                        <button type="button" class="btn btn-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu pull-right animated flipInX">
                                                            <a href="#">Accending</a>
                                                            <a href="#">Decending</a>
                                                            <a href="#">By Date</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group ml-2">
                                                        <a href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- /Manage jobs -->

                            <a href="#" class="btn btn-info btn-md full-width">Save & Update<i class="ml-2 ti-arrow-right"></i></a>

                        </div>

                        <!-- Transactions-->
                        <div class="tab-pane" id="transactions">

                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-stats-up"></i> Transactions</h4>
                                </div>

                                <div class="tr-single-body">
                                    <div class="alert alert-success">
                                        <strong>Hi Dear!</strong> There is no record in transaction list
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Shortlisted -->
                        <div class="tab-pane" id="shortlisted">

                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-briefcase"></i> Shortlisted</h4>
                                </div>

                                <div class="tr-single-body">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <!-- Single Resume -->
                                            <div class="manage-list">

                                                <div class="mg-list-wrap">
                                                    <div class="mg-list-thumb">
                                                        <img src="https://via.placeholder.com/400x400" class="mx-auto" alt="" />
                                                    </div>
                                                    <div class="mg-list-caption">
                                                        <h4 class="mg-title">Shaurya Preet</h4>
                                                        <span class="mg-subtitle">Web Designer</span>
                                                        <span><em>Last activity</em> 4 weeks ago. <em>Registered</em> 4 weeks ago</span>

                                                    </div>
                                                </div>

                                                <div class="mg-action">
                                                    <div class="btn-group custom-drop">
                                                        <button type="button" class="btn btn-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu pull-right animated flipInX">
                                                            <a href="#">Send Message</a>
                                                            <a href="#">View Profile</a>
                                                            <a href="#">Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group ml-2">
                                                        <a href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Single Resume -->
                                            <div class="manage-list">

                                                <div class="mg-list-wrap">
                                                    <div class="mg-list-thumb">
                                                        <img src="https://via.placeholder.com/400x400" class="mx-auto" alt="" />
                                                    </div>
                                                    <div class="mg-list-caption">
                                                        <h4 class="mg-title">Adam Drivakla</h4>
                                                        <span class="mg-subtitle">Product Designer</span>
                                                        <span><em>Last activity</em> 4 weeks ago. <em>Registered</em> 4 weeks ago</span>

                                                    </div>
                                                </div>

                                                <div class="mg-action">
                                                    <div class="btn-group custom-drop">
                                                        <button type="button" class="btn btn-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu pull-right animated flipInX">
                                                            <a href="#">Send Message</a>
                                                            <a href="#">View Profile</a>
                                                            <a href="#">Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group ml-2">
                                                        <a href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Single Resume -->
                                            <div class="manage-list">

                                                <div class="mg-list-wrap">
                                                    <div class="mg-list-thumb">
                                                        <img src="https://via.placeholder.com/400x400" class="mx-auto" alt="" />
                                                    </div>
                                                    <div class="mg-list-caption">
                                                        <h4 class="mg-title">Dhananjay Preet</h4>
                                                        <span class="mg-subtitle">UI/UX Designer</span>
                                                        <span><em>Last activity</em> 4 weeks ago. <em>Registered</em> 4 weeks ago</span>

                                                    </div>
                                                </div>

                                                <div class="mg-action">
                                                    <div class="btn-group custom-drop">
                                                        <button type="button" class="btn btn-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu pull-right animated flipInX">
                                                            <a href="#">Send Message</a>
                                                            <a href="#">View Profile</a>
                                                            <a href="#">Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group ml-2">
                                                        <a href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Single Resume -->
                                            <div class="manage-list">

                                                <div class="mg-list-wrap">
                                                    <div class="mg-list-thumb">
                                                        <img src="https://via.placeholder.com/400x400" class="mx-auto" alt="" />
                                                    </div>
                                                    <div class="mg-list-caption">
                                                        <h4 class="mg-title">Daniel Duke</h4>
                                                        <span class="mg-subtitle">PHP Developer</span>
                                                        <span><em>Last activity</em> 4 weeks ago. <em>Registered</em> 4 weeks ago</span>

                                                    </div>
                                                </div>

                                                <div class="mg-action">
                                                    <div class="btn-group custom-drop">
                                                        <button type="button" class="btn btn-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu pull-right animated flipInX">
                                                            <a href="#">Send Message</a>
                                                            <a href="#">View Profile</a>
                                                            <a href="#">Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group ml-2">
                                                        <a href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Single Resume -->
                                            <div class="manage-list">

                                                <div class="mg-list-wrap">
                                                    <div class="mg-list-thumb">
                                                        <img src="https://via.placeholder.com/400x400" class="mx-auto" alt="" />
                                                    </div>
                                                    <div class="mg-list-caption">
                                                        <h4 class="mg-title">Abhay Shukla</h4>
                                                        <span class="mg-subtitle">App Designer</span>
                                                        <span><em>Last activity</em> 4 weeks ago. <em>Registered</em> 4 weeks ago</span>

                                                    </div>
                                                </div>

                                                <div class="mg-action">
                                                    <div class="btn-group custom-drop">
                                                        <button type="button" class="btn btn-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-more"></i>
                                                        </button>
                                                        <div class="dropdown-menu pull-right animated flipInX">
                                                            <a href="#">Send Message</a>
                                                            <a href="#">View Profile</a>
                                                            <a href="#">Download</a>
                                                        </div>
                                                    </div>
                                                    <div class="btn-group ml-2">
                                                        <a href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- alert job -->
                        <div class="tab-pane" id="alert">

                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-bell"></i> Alert Jobs</h4>
                                </div>

                                <div class="tr-single-body">
                                    <div class="alert alert-success">
                                        <strong>Hi Dear!</strong> There is no record in transaction list
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Add New jobs -->
                        <div class="tab-pane" id="post-new-job">
                            <!-- Add New jobs -->
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-plus"></i> Post A New jobs</h4>
                                </div>

                                <div class="tr-single-body">
                                    <div class="row">

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Job Title</label>
                                                <input class="form-control" type="text" value="Web Designer">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Job Description</label>
                                                <div id="jb-description"><p>Job Description</p></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" value="youremail@gmail.com">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input class="form-control" type="text" value="123 254 4875">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>UserName</label>
                                                <input class="form-control" type="text" value="drizvato47">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Job Type</label>
                                                <select id="jb-type" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1">Full Time</option>
                                                    <option value="2">Part Time</option>
                                                    <option value="3">Freelancing</option>
                                                    <option value="4">Internship</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Career Level</label>
                                                <select id="career-lavel" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1">Manager</option>
                                                    <option value="2">Officer</option>
                                                    <option value="3">Student</option>
                                                    <option value="4">Executive</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Offerd Salary</label>
                                                <select id="offerd-sallery" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1">$0 - $15,000</option>
                                                    <option value="2">$15,000 - $20,000</option>
                                                    <option value="3">$20,000 - $25,000</option>
                                                    <option value="4">$25,000 - $50,000</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Experience</label>
                                                <select id="experience" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1">Entry Level</option>
                                                    <option value="2">Less Then One Year</option>
                                                    <option value="3">2 Years</option>
                                                    <option value="4">3 Years</option>
                                                    <option value="5">4 Years</option>
                                                    <option value="6">5+ Years</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select id="gender" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Both</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Specialisms</label>
                                                <select id="specialisms" class="form-control" multiple="multiple">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1">Accounting</option>
                                                    <option value="2">Constructions</option>
                                                    <option value="3">Retail</option>
                                                    <option value="4">Technology</option>
                                                    <option value="5">Sales & Marketing</option>
                                                    <option value="6">Telecommunications</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Industry</label>
                                                <select id="industry" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1">Development</option>
                                                    <option value="2">Finance</option>
                                                    <option value="3">Banking</option>
                                                    <option value="4">SEO/SMO</option>
                                                    <option value="5">Designing</option>
                                                    <option value="6">Management</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Qualification</label>
                                                <select id="qualification" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1">Certificate</option>
                                                    <option value="2">Diploma</option>
                                                    <option value="3">Bachelor Degree</option>
                                                    <option value="4">Master Degree</option>
                                                    <option value="5">Post Graduate</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input class="form-control" type="text" value="Country">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input class="form-control" type="text" value="Your City">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Full Address</label>
                                                <input class="form-control" type="text" value="Full Address">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Find On Map</label>
                                                <input class="form-control" type="text" value="Map Address">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Latitude</label>
                                                <input class="form-control" type="text" value="45.5073509">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Longitude</label>
                                                <input class="form-control" type="text" value="-0.12775829999">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- /CV -->

                            <a href="#" class="btn btn-info btn-md full-width">Save & Update<i class="ml-2 ti-arrow-right"></i></a>

                        </div>

                        <!-- package -->
                        <div class="tab-pane" id="package">
                            <table class="table table-striped tbl-big center mb-5">
                                <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">Select</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Jobs Remaining</th>
                                    <th scope="col">Features Remaining</th>
                                    <th scope="col">Renew Remaining</th>
                                    <th scope="col">Duration</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>
                                        <input type="radio" class="radio-custom" id="basic" name="cm-r" checked>
                                        <label for="basic" class="radio-custom-label"></label>
                                    </th>
                                    <td>Basic</td>
                                    <td>15</td>
                                    <td>07</td>
                                    <td>5</td>
                                    <td>30 Days</td>
                                </tr>
                                <tr>
                                    <th>
                                        <input type="radio" class="radio-custom" id="premium" name="cm-r">
                                        <label for="premium" class="radio-custom-label"></label>
                                    </th>
                                    <td>Premium</td>
                                    <td>18</td>
                                    <td>12</td>
                                    <td>2</td>
                                    <td>60 Days</td>
                                </tr>

                                </tbody>
                            </table>

                            <table class="table table-striped tbl-big center mb-5">
                                <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">Select</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Jobs Posting</th>
                                    <th scope="col">Feature Jobs</th>
                                    <th scope="col">Renew Jobs</th>
                                    <th scope="col">Duration</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>
                                        <input type="radio" class="radio-custom" id="basic-p" name="nm-r" checked>
                                        <label for="basic-p" class="radio-custom-label"></label>
                                    </th>
                                    <td>Basic</td>
                                    <td>$49</td>
                                    <td>50</td>
                                    <td>50</td>
                                    <td>30</td>
                                    <td>30 Days</td>
                                </tr>
                                <tr>
                                    <th>
                                        <input type="radio" class="radio-custom" id="premium-p" name="nm-r">
                                        <label for="premium-p" class="radio-custom-label"></label>
                                    </th>
                                    <td>Premium</td>
                                    <td>$99</td>
                                    <td>99</td>
                                    <td>50</td>
                                    <td>30</td>
                                    <td>30 Days</td>
                                </tr>
                                <tr>
                                    <th>
                                        <input type="radio" class="radio-custom" id="standard-p" name="nm-r">
                                        <label for="standard-p" class="radio-custom-label"></label>
                                    </th>
                                    <td>Standard</td>
                                    <td>$149</td>
                                    <td>170</td>
                                    <td>10</td>
                                    <td>50</td>
                                    <td>60 Days</td>
                                </tr>
                                <tr>
                                    <th>
                                        <input type="radio" class="radio-custom" id="platinum-p" name="nm-r">
                                        <label for="platinum-p" class="radio-custom-label"></label>
                                    </th>
                                    <td>Platinum</td>
                                    <td>$499</td>
                                    <td>250</td>
                                    <td>100</td>
                                    <td>70</td>
                                    <td>60 Days</td>
                                </tr>

                                </tbody>
                            </table>

                            <button class="btn btn-md btn-info" type="submit">Continue<i class="ti-arrow-right ml-2"></i></button>
                        </div>

                        <!-- change-password -->
                        <div class="tab-pane" id="change-password">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="lni-lock"></i> Change Password</h4>
                                </div>

                                <div class="tr-single-body">
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input class="form-control" type="password">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input class="form-control" type="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control" type="password">
                                    </div>
                                </div>

                            </div>

                            <a href="#" class="btn btn-info btn-md full-width">Save & Update<i class="ml-2 ti-arrow-right"></i></a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============== Candidate Dashboard ====================== -->

@endsection