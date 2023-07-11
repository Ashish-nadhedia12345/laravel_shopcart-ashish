<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <li class="label">Navivation</li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="ti-file"></i> Main Site</a>
                </li>
                <li class="label">Apps</li>
                <li>
                  <a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i>User<span
                          class="sidebar-collapse-icon ti-angle-down"></span>
                  </a>
                  <ul>
                      <li>
                          <a href="">Create New</a>
                      </li>
                      <li>
                          <a href="">List All</a>
                      </li>
                  </ul>
              </li>
              <li>
                <a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i>Coupon<span
                        class="sidebar-collapse-icon ti-angle-down"></span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin.coupon.create') }}">Create New</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.coupon.index') }}">List All</a>
                    </li>
                </ul>
            </li>
                <li>
                    <a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i>Category<span
                            class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.category.create') }}">Create New</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.category.index') }}">List All</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i>Orders<span
                            class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.order.index') }}">List All</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i>Product<span
                            class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.product.create') }}">Create New</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.product.index') }}">List All</a>
                        </li>
                    </ul>
                </li>

                
                
                <li>
                    <a href="../documentation/index.html">
                        <i class="ti-file"></i> Documentation</a>
                </li>
                <li>
                    <a>
                        <i class="ti-close"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
