@include('partials.head')

  <div id="app">
    <div class="main-wrapper">

      {{-- main menu --}}
      @include('partials.main_menu')
      {{-- end main menu --}}

      {{-- sidebars --}}
      @include('partials.sidebars')
      {{-- end sidebars --}}

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">

          <div class="section-body">

            @yield('content')

          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> Ver 1.0 <div class="bullet"></div> Develope By <a href="#">Malcorp</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  @include('partials.footer')