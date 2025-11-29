<!doctype html>
<html lang="en" class="semi-dark" dir="rtl">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
  <!--plugins-->
  <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
  <link href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Noto+Kufi+Arabic:wght@100..900&family=Noto+Sans+Arabic:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet"> <!-- loader-->
  <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="{{ asset('assets/css/dark-theme.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/light-theme.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/semi-dark.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/header-colors.css') }}" rel="stylesheet" />

  <title>FreelanGo - لوحة تحكم المسؤول</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
    <header class="top-header">
      <nav class="navbar navbar-expand gap-3">
        <div class="mobile-toggle-icon fs-3">
          <i class="bi bi-list"></i>
        </div>
        <form class="searchbar">
          <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
          <input class="form-control" type="text" placeholder="Type here to search">
          <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
        </form>
        <div class="top-navbar-right ms-auto">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item search-toggle-icon">
              <a class="nav-link" href="#">
                <div class="">
                  <i class="bi bi-search"></i>
                </div>
              </a>
            </li>
            <li class="nav-item dropdown dropdown-user-setting">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="user-setting d-flex align-items-center">
                  <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="user-img" alt="">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <img src="assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="54"
                        height="54">
                      <div class="ms-3">
                        <h6 class="mb-0 dropdown-user-name">Jhon Deo</h6>
                        <small class="mb-0 dropdown-user-designation text-secondary">HR Manager</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item" href="pages-user-profile.html">
                    <div class="d-flex align-items-center">
                      <div class=""><i class="bi bi-person-fill"></i></div>
                      <div class="ms-3"><span>Profile</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class=""><i class="bi bi-gear-fill"></i></div>
                      <div class="ms-3"><span>Setting</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="index2.html">
                    <div class="d-flex align-items-center">
                      <div class=""><i class="bi bi-speedometer"></i></div>
                      <div class="ms-3"><span>Dashboard</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class=""><i class="bi bi-piggy-bank-fill"></i></div>
                      <div class="ms-3"><span>Earnings</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class=""><i class="bi bi-cloud-arrow-down-fill"></i></div>
                      <div class="ms-3"><span>Downloads</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item" href="authentication-signup-with-header-footer.html">
                    <div class="d-flex align-items-center">
                      <div class=""><i class="bi bi-lock-fill"></i></div>
                      <div class="ms-3"><span>Logout</span></div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown dropdown-large">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="projects">
                  <i class="bi bi-grid-3x3-gap-fill"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <div class="row row-cols-3 gx-2">
                  <div class="col">
                    <a href="ecommerce-orders.html">
                      <div class="apps p-2 radius-10 text-center">
                        <div class="apps-icon-box mb-1 text-white bg-gradient-purple">
                          <i class="bi bi-basket2-fill"></i>
                        </div>
                        <p class="mb-0 apps-name">Orders</p>
                      </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                        <div class="apps-icon-box mb-1 text-white bg-gradient-info">
                          <i class="bi bi-people-fill"></i>
                        </div>
                        <p class="mb-0 apps-name">Users</p>
                      </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="ecommerce-products-grid.html">
                      <div class="apps p-2 radius-10 text-center">
                        <div class="apps-icon-box mb-1 text-white bg-gradient-success">
                          <i class="bi bi-trophy-fill"></i>
                        </div>
                        <p class="mb-0 apps-name">Products</p>
                      </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="component-media-object.html">
                      <div class="apps p-2 radius-10 text-center">
                        <div class="apps-icon-box mb-1 text-white bg-gradient-danger">
                          <i class="bi bi-collection-play-fill"></i>
                        </div>
                        <p class="mb-0 apps-name">Media</p>
                      </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="pages-user-profile.html">
                      <div class="apps p-2 radius-10 text-center">
                        <div class="apps-icon-box mb-1 text-white bg-gradient-warning">
                          <i class="bi bi-person-circle"></i>
                        </div>
                        <p class="mb-0 apps-name">Account</p>
                      </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                        <div class="apps-icon-box mb-1 text-white bg-gradient-voilet">
                          <i class="bi bi-file-earmark-text-fill"></i>
                        </div>
                        <p class="mb-0 apps-name">Docs</p>
                      </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="ecommerce-orders-detail.html">
                      <div class="apps p-2 radius-10 text-center">
                        <div class="apps-icon-box mb-1 text-white bg-gradient-branding">
                          <i class="bi bi-credit-card-fill"></i>
                        </div>
                        <p class="mb-0 apps-name">Payment</p>
                      </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                        <div class="apps-icon-box mb-1 text-white bg-gradient-desert">
                          <i class="bi bi-calendar-check-fill"></i>
                        </div>
                        <p class="mb-0 apps-name">Events</p>
                      </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                        <div class="apps-icon-box mb-1 text-white bg-gradient-amour">
                          <i class="bi bi-book-half"></i>
                        </div>
                        <p class="mb-0 apps-name">Story</p>
                      </div>
                    </a>
                  </div>
                </div><!--end row-->
              </div>
            </li>
            <li class="nav-item dropdown dropdown-large">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="messages">
                  <span class="notify-badge">5</span>
                  <i class="bi bi-chat-right-fill"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end p-0">
                <div class="p-2 border-bottom m-2">
                  <h5 class="h5 mb-0">Messages</h5>
                </div>
                <div class="header-message-list p-2">
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <img src="assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="50"
                        height="50">
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span class="msg-time float-end text-secondary">1
                            m</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The standard
                          chunk of lorem...</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <img src="assets/images/avatars/avatar-2.png" alt="" class="rounded-circle" width="50"
                        height="50">
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span
                            class="msg-time float-end text-secondary">7 m</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Many desktop
                          publishing</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <img src="assets/images/avatars/avatar-3.png" alt="" class="rounded-circle" width="50"
                        height="50">
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span
                            class="msg-time float-end text-secondary">2 h</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Making this the
                          first true</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <img src="assets/images/avatars/avatar-4.png" alt="" class="rounded-circle" width="50"
                        height="50">
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Peter Costanzo <span
                            class="msg-time float-end text-secondary">3 h</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">It was
                          popularised in the 1960</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <img src="assets/images/avatars/avatar-5.png" alt="" class="rounded-circle" width="50"
                        height="50">
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Thomas Wheeler <span
                            class="msg-time float-end text-secondary">1 d</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">If you are going
                          to use a passage</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <img src="assets/images/avatars/avatar-6.png" alt="" class="rounded-circle" width="50"
                        height="50">
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Johnny Seitz <span
                            class="msg-time float-end text-secondary">2 w</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">All the Lorem
                          Ipsum generators</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <img src="assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="50"
                        height="50">
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span class="msg-time float-end text-secondary">1
                            m</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The standard
                          chunk of lorem...</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <img src="assets/images/avatars/avatar-2.png" alt="" class="rounded-circle" width="50"
                        height="50">
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span
                            class="msg-time float-end text-secondary">7 m</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Many desktop
                          publishing</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <img src="assets/images/avatars/avatar-3.png" alt="" class="rounded-circle" width="50"
                        height="50">
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span
                            class="msg-time float-end text-secondary">2 h</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Making this the
                          first true</small>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="p-2">
                  <div>
                    <hr class="dropdown-divider">
                  </div>
                  <a class="dropdown-item" href="#">
                    <div class="text-center">View All Messages</div>
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown dropdown-large">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="notifications">
                  <span class="notify-badge">8</span>
                  <i class="bi bi-bell-fill"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end p-0">
                <div class="p-2 border-bottom m-2">
                  <h5 class="h5 mb-0">Notifications</h5>
                </div>
                <div class="header-notifications-list p-2">
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-primary text-primary"><i class="bi bi-basket2-fill"></i>
                      </div>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">New Orders <span class="msg-time float-end text-secondary">1
                            m</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">You have recived
                          new orders</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-purple text-purple"><i class="bi bi-people-fill"></i></div>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">New Customers <span
                            class="msg-time float-end text-secondary">7 m</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5 new user
                          registered</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-success text-success"><i
                          class="bi bi-file-earmark-bar-graph-fill"></i></div>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">24 PDF File <span class="msg-time float-end text-secondary">2
                            h</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The pdf files
                          generated</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-orange text-orange"><i
                          class="bi bi-collection-play-fill"></i></div>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Time Response <span
                            class="msg-time float-end text-secondary">3 h</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5.1 min avarage
                          time response</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-info text-info"><i class="bi bi-cursor-fill"></i></div>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">New Product Approved <span
                            class="msg-time float-end text-secondary">1 d</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Your new product
                          has approved</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-pink text-pink"><i class="bi bi-gift-fill"></i></div>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">New Comments <span
                            class="msg-time float-end text-secondary">2 w</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New customer
                          comments recived</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-warning text-warning"><i class="bi bi-droplet-fill"></i>
                      </div>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">New 24 authors<span
                            class="msg-time float-end text-secondary">1 m</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">24 new authors
                          joined last week</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-primary text-primary"><i class="bi bi-mic-fill"></i></div>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Your item is shipped <span
                            class="msg-time float-end text-secondary">7 m</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Successfully
                          shipped your item</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-success text-success"><i class="bi bi-lightbulb-fill"></i>
                      </div>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Defense Alerts <span
                            class="msg-time float-end text-secondary">2 h</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">45% less alerts
                          last 4 weeks</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-info text-info"><i class="bi bi-bookmark-heart-fill"></i>
                      </div>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">4 New Sign Up <span
                            class="msg-time float-end text-secondary">2 w</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New 4 user
                          registartions</small>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-bronze text-bronze"><i class="bi bi-briefcase-fill"></i>
                      </div>
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">All Documents Uploaded <span
                            class="msg-time float-end text-secondary">1 mo</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Sussessfully
                          uploaded all files</small>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="p-2">
                  <div>
                    <hr class="dropdown-divider">
                  </div>
                  <a class="dropdown-item" href="#">
                    <div class="text-center">View All Notifications</div>
                  </a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!--end top header-->
    @include('layout.sidebar')


    <!--start content-->
    <main class="page-content">
      @yield('content')
    </main>
    <!--end page main-->

    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <!--plugins-->
  <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/js/pace.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/chartjs/js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
  <!--app-->
  <script src="{{ asset('assets/js/app.js') }}"></script>
  <script src="{{ asset('assets/js/index.js') }}"></script>
  <script>
    new PerfectScrollbar(".best-product")
  </script>
  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

  <script>
    const notyf = new Notyf({
      duration: 4000,
      ripple: true,
      position: { x: 'left', y: 'top' },
      types: [
        {
          type: 'error',
          background: '#FF4C4C',
          className: 'custom-error-toast',
          icon: {
            className: 'bi bi-x-circle-fill',
            tagName: 'i',
            color: 'white',
          }
        },
        {
          type: 'success',
          background: '#089331ff',
          icon: {
            className: 'bi bi-check-circle-fill',
            tagName: 'i',
            color: 'white',
          }
        },
        {
          type: 'warning',
          background: '#ffe600ff',
          icon: {
            className: 'bi bi-exclamation-triangle-fill',
            tagName: 'i',
            color: 'white',
          }
        }
      ]
    });
  </script>
  <script>
    $('#createForm').on('submit', function (e) {
      e.preventDefault();
      let formData = new FormData(this);
      $.ajax({
        url: $(this).attr('action'),
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function () {
          notyf.success('تمت العملية بنجاح');
          $('#create').modal('hide');
          $('#dataTable').DataTable().ajax.reload();
        },
        error: function (xhr) {
          $('.error-text').remove();
          if (xhr.status === 422) {
            let errors = xhr.responseJSON.errors;
            $.each(errors, function (key, value) {
              $('#' + key).after('<span class="error-text" style="color:red;">' + value[0] + '</span>');
              $('#' + key).next('.error-text').fadeIn(300);
            });
          }
        },
      });
    });
    $('#deleteForm').on('submit', function (e) {
			e.preventDefault();
			let formData = new FormData(this)
			$.ajax({
				url: $(this).attr('action'),
				type: 'post',
				data: formData,
				processData: false,
				contentType: false,
				success: function (responce) {
					if (responce.message) {
						notyf.error(responce.message);
						$('#delete').modal('hide');
					} else {
						notyf.success('تمت حذف بنجاح');
						$('#delete').modal('hide');
						$('#dataTable').DataTable().ajax.reload();
					}
				},
				error: function (xhr) {
					$('.error-text').remove();
					if (xhr.status === 422) {
						let errors = xhr.responseJSON.errors;
						$.each(errors, function (key, value) {
							$('#' + key).after('<span class="error-text" style="color:red;">' + value[0] + '</span>');
							$('#' + key).next('.error-text').fadeIn(300);
						});
					}
				},
			});
		});
  </script>
  @yield('js')


</body>

</html>