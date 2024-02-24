<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">

        <div>
           <img src="{{asset('frontend/img/nama/logo.png')}}" alt=""  width="130px"/>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard')  }}">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">لوحة التحكم</div>
            </a>
        </li>


        <li>
            <a href="{{ route('products.index')  }}">
                <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">المنتجات</div>
            </a>
        </li>


        <li>
            <a href="{{ route('blogs.index')  }}">
                <div class="parent-icon"><i class="lni lni-files"></i>
                </div>
                <div class="menu-title">المقالات</div>
            </a>
        </li>




        <li class="">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                <div class="parent-icon"><i class="bi bi-lock-fill"></i>
                </div>
                <div class="menu-title">تسجيل الخروج</div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>



    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->
