 <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
          <div class="sidebar-header">
            <div>
              <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
            </div>
            <div>
              <h4 class="logo-text">FreelanGO</h4>
            </div>
            <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
            </div>
          </div>
          <!--navigation-->
          <ul class="metismenu" id="menu">
            <li>
              <a href="{{route("$guard.dashboard") }}" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">لوحة التحكم</div>
              </a>
            </li>
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">طلبات التوثيق</div>
              </a>
              <ul>
                <li> <a href="app-emailbox.html"><i class="bi bi-person fs-5"></i>طلبات العملاء</a>
                </li>
                <li> <a href="app-chat-box.html"><i class="bi bi-laptop fs-5"></i>طلبات المستقلين</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-people"></i>
                </div>
                <div class="menu-title">ادارة المستخدمين</div>
              </a>
              <ul>
                <li> <a href="{{ route("$guard.showAdmins") }}"><i class="bi bi-person-badge fs-5"></i>المسؤولون</a>
                </li>
                <li> <a href="{{ route("$guard.showFreelancers") }}"><i class="bi bi-laptop fs-5"></i>المستقلين</a>
                </li>
                <li> <a href="{{ route("$guard.showUsers") }}"><i class="bi bi-person fs-5"></i>العملاء</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-shield-lock"></i>
                </div>
                <div class="menu-title">ادارة الصلاحيات و الأدوار</div>
              </a>
              <ul>
                <li> <a href="{{ route("$guard.permission.index") }}"><i class="bi bi-gear-fill fs-5"></i>الصلاحيات</a>
                </li>
                <li> <a href="{{ route("$guard.showUsers") }}"><i class="bi bi-bookmark-star-fill fs-5"></i>الأدوار</a>
                </li>
              </ul>
            </li>
          </ul>
          <!--end navigation-->
       </aside>
       <!--end sidebar -->