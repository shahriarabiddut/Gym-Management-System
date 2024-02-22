<div class="navbar bg-black	px-10 text-white">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
      </div>
      <ul class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        <li><a>Item 1</a></li>
        <li>
          <a>Parent</a>
          <ul class="p-2">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
          </ul>
        </li>
        <li><a>Item 3</a></li>
      </ul>
    </div>
    <a class="btn btn-ghost text-xl" href="{{ route('root') }}">
      <img class="w-10 rounded-full" src="./image/logo6.0ba8ae29.jpg" alt="">
    </a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="{{ route('root') }}" class="hover:text-orange-500 ease-in duration-300">Home</a></li>
      <li><a href="{{ route('about') }}" class="hover:text-orange-500 ease-in duration-300">About Us</a></li>
      <li><a href="{{ route('contact') }}" class="hover:text-orange-500 ease-in duration-300">Contact</a></li>
    </ul>
  </div>
  @if (Route::has('login'))
  @auth
  <div class="navbar-end">
    <a class=" bg-white hover:bg-orange-500 ease-in duration-300 px-7 py-3 text-black rounded-md" href="{{ route('user.dashboard') }}">Dashboard</a>
  </div>
  @else
  <div class="navbar-end">
    <a class=" bg-white hover:bg-orange-500 ease-in duration-300 px-7 py-3 text-black rounded-md" href="{{ route('login') }} ">Log In</a>
  </div>
  @endauth
  @endif
</div>