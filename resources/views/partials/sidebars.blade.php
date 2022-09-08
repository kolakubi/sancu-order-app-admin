<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/">
          <img src="/sancu_assets/img/logo-sancu-mini.png" alt="" class="img" style="max-width: 100px">
        </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">St</a>
      </div>
      <ul class="sidebar-menu">
          {{-- Orders --}}
          {{-- ------------- --}}
          <li class="menu-header">Order</li>
          <li class="nav-item">
            <a href="{{route('orders')}}" class="nav-link"><i class="fas fa-pencil-alt"></i><span>Orders</span></a>
          </li>
          <li class="nav-item">
            <a href="{{route('whatsapp')}}" class="nav-link"><i class="bi bi-whatsapp"></i><span>Whatsapp</span></a>
          </li>

          {{-- Inventory --}}
          {{-- ------------- --}}
          <li class="menu-header">Inventory</li>
          <li class="nav-item">
            <a href="{{route('item')}}" class="nav-link"><i class="bi bi-gift"></i><span>Item</span></a>
          </li>
          <li class="nav-item">
            <a href="{{route('category')}}" class="nav-link"><i class="bi bi-diagram-2"></i><span>Category</span></a>
          </li>
          <li class="nav-item">
            <a href="{{route('stok_masuk')}}" class="nav-link"><i class="bi bi-box-arrow-in-left"></i></i><span>Stok Masuk</span></a>
          </li>
          <li class="nav-item">
            <a href="{{route('stok_keluar')}}" class="nav-link"><i class="bi bi-box-arrow-right"></i><span>Stok Keluar</span></a>
          </li>
          <li class="nav-item">
            <a href="{{route('kartu_stok')}}" class="nav-link"><i class="bi bi-arrow-repeat"></i><span>Kartu Stok</span></a>
          </li>
          <li class="nav-item">
            <a href="{{route('log_item')}}" class="nav-link"><i class="bi bi-stopwatch"></i><span>Log Perubahan Harga</span></a>
          </li>

          {{-- Promosi --}}
          {{-- ------------- --}}
          <li class="menu-header">Promosi</li>
          <li class="nav-item">
            <a href="{{route('coupon')}}" class="nav-link"><i class="bi bi-percent"></i><span>Coupon</span></a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-card-image"></i><span>Banner</span></a>
          </li>

          {{-- Laporan --}}
          {{-- ------------- --}}
          <li class="menu-header">Laporan</li>
          <li class="nav-item">
            <a href="{{route('penjualan')}}" class="nav-link"><i class="bi bi-bar-chart"></i><span>Penjualan</span></a>
          </li>
          <li class="nav-item">
            <a href="{{route('penjualan_per_db')}}" class="nav-link"><i class="bi bi-person-lines-fill"></i><span>Penjualan Distributor</span></a>
          </li>

          {{-- User --}}
          {{-- ------------- --}}
          <li class="menu-header">User</li>
          <li class="nav-item mb-5">
            <a href="{{route('user')}}" class="nav-link"><i class="bi bi-person-fill"></i><span>Akun</span></a>
          </li>

        </ul>
    </aside>
  </div>