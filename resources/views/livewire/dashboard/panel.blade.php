<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <livewire:dashboard.sidebar />
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav w-100">
                    <li class="nav-item w-100">
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            <input type="text" class="form-control" placeholder="Search products">
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                            <div class="navbar-profile">
                                <img class="img-xs rounded-circle" src="{{ asset('dashboard-resource/images/faces/face15.jpg') }}" alt="">
                                <p class="mb-0 d-none d-sm-block navbar-profile-name">Henry Klein</p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                            <h6 class="p-3 mb-0">Profile</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-logout text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Log out</p>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Form elements </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Forms</li>
                            <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-sm-4 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5>Revenue</h5>
                                <div class="row">
                                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                                            <h2 class="mb-0">$32123</h2>
                                            <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                                    </div>
                                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                        <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5>Sales</h5>
                                <div class="row">
                                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                                            <h2 class="mb-0">$45850</h2>
                                            <p class="text-success ms-2 mb-0 font-weight-medium">+8.3%</p>
                                        </div>
                                        <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                                    </div>
                                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                        <i class="icon-lg mdi mdi-wallet-travel text-danger ms-auto"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5>Purchase</h5>
                                <div class="row">
                                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                                            <h2 class="mb-0">$2039</h2>
                                            <p class="text-danger ms-2 mb-0 font-weight-medium">-2.1% </p>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
                                    </div>
                                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                        <i class="icon-lg mdi mdi-monitor text-success ms-auto"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Order Status</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                    </label>
                                                </div>
                                            </th>
                                            <th> Client Name </th>
                                            <th> Order No </th>
                                            <th> Product Cost </th>
                                            <th> Project </th>
                                            <th> Payment Mode </th>
                                            <th> Start Date </th>
                                            <th> Payment Status </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ asset('dashboard-resource/images/faces/face1.jpg') }}" alt="image" />
                                                <span class="ps-2">Henry Klein</span>
                                            </td>
                                            <td> 02312 </td>
                                            <td> $14,500 </td>
                                            <td> Dashboard </td>
                                            <td> Credit card </td>
                                            <td> 04 Dec 2019 </td>
                                            <td>
                                                <div class="badge badge-outline-success">Approved</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ asset('dashboard-resource/images/faces/face2.jpg') }}" alt="image" />
                                                <span class="ps-2">Estella Bryan</span>
                                            </td>
                                            <td> 02312 </td>
                                            <td> $14,500 </td>
                                            <td> Website </td>
                                            <td> Cash on delivered </td>
                                            <td> 04 Dec 2019 </td>
                                            <td>
                                                <div class="badge badge-outline-warning">Pending</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ asset('dashboard-resource/images/faces/face5.jpg') }}" alt="image" />
                                                <span class="ps-2">Lucy Abbott</span>
                                            </td>
                                            <td> 02312 </td>
                                            <td> $14,500 </td>
                                            <td> App design </td>
                                            <td> Credit card </td>
                                            <td> 04 Dec 2019 </td>
                                            <td>
                                                <div class="badge badge-outline-danger">Rejected</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ asset('dashboard-resource/images/faces/face3.jpg') }}" alt="image" />
                                                <span class="ps-2">Peter Gill</span>
                                            </td>
                                            <td> 02312 </td>
                                            <td> $14,500 </td>
                                            <td> Development </td>
                                            <td> Online Payment </td>
                                            <td> 04 Dec 2019 </td>
                                            <td>
                                                <div class="badge badge-outline-success">Approved</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ asset('dashboard-resource/images/faces/face4.jpg') }}" alt="image" />
                                                <span class="ps-2">Sallie Reyes</span>
                                            </td>
                                            <td> 02312 </td>
                                            <td> $14,500 </td>
                                            <td> Website </td>
                                            <td> Credit card </td>
                                            <td> 04 Dec 2019 </td>
                                            <td>
                                                <div class="badge badge-outline-success">Approved</div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
