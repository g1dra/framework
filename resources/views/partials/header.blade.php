<a-layout-header style="background: #fff; padding: 0">
    

    <a-menu class="float-left" mode="horizontal">
        <a-menu-item>
            <a-icon 
                class="trigger header-trigger" 
                :type="collapsed ? 'menu-unfold' : 'menu-fold'" 
                @click="()=> collapsed = !collapsed">
            </a-icon>
        </a-menu-item>
    </a-menu>
    <a-menu class="header-nav"  mode="horizontal">
        <a-sub-menu key="header-account">
            <span slot="title">
                <a-avatar
                    class="header-avtar" 
                    size="small" 
                    shape="square" 
                    icon="user"></a-avatar>
                {{ Auth::guard('admin')->user()->full_name }}
            </span>
            <a-menu-item key="1">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('admin-logout-form').submit();">
                <a-icon type="logout"></a-icon>
                <span>Logout</span>
                </a>
            </a-menu-item>
        </a-sub-menu>
    </a-menu>
     <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</a-layout-header>
