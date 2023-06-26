<aside class="left-sidebar" xmlns="http://www.w3.org/1999/html">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="{{route('dashboard')}}" aria-expanded="false"><i class="ti-home"></i>
                        <span class="hide-menu">Dashboard</span></a>
                </li>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti-layout-grid2"></i>
                        <span class="hide-menu">Category Module</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route('categories.create')}}">Add Category</a></li>
                            <li><a href="{{route('categories.index')}}">Manage Category</a></li>
                         </ul>
                    </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti-layout-grid3"></i>
                        <span class="hide-menu">Sub Category</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('subcategories.create')}}">Add Sub_Cat</a></li>
                        <li><a href="{{route('subcategories.index')}}">Manage Sub_Cat</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti-trello"></i>
                        <span class="hide-menu">Brand Module</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('brands.create')}}">Add Brand</a></li>
                        <li><a href="{{route('brands.index')}}">Manage Brand</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti-layout-column4"></i>
                        <span class="hide-menu">Unit Module</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('units.create')}}">Add Unit</a></li>
                        <li><a href="{{route('units.index')}}">Manage Unit</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti-basketball"></i>
                        <span class="hide-menu">Size Module</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Add Size</a></li>
                        <li><a href="#">Manage Size</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti-pencil-alt2"></i>
                        <span class="hide-menu">Color Module</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Add Color</a></li>
                        <li><a href="#">Manage Color</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti-image"></i>
                        <span class="hide-menu">Product Module</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('products.create')}}">Add Product</a></li>
                        <li><a href="{{route('products.index')}}">Manage Product</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti-wand"></i>
                        <span class="hide-menu">Order Module</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Manage Order</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti-user"></i>
                        <span class="hide-menu">Customer Module</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Manage Customer</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti-user"></i>
                        <span class="hide-menu">User Module</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Add User</a></li>
                        <li><a href="#">Manage User</a></li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti ti-face-sad"></i>
                        <span class="hide-menu">Log Out</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
