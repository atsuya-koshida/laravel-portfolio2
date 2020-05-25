<header class="header">
  <div class="header__inner">
    <div class="header__left-box">
      <p class="main-title">
        <a href="{{ route('home') }}">Play Ground</a>
      </p>
    </div>
    <ul class="header__right-box">
      @guest
        <li><a href="{{ route('register') }}">新規登録</a></li>
        <li><a href="{{ route('login') }}">ログイン</a></li>
      @endguest
      @auth
        <li><a href="{{ route('user.show', ['user' => Auth::id()]) }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ route('user.edit', ['user' => Auth::id()]) }}">プロフィール編集</a></li>
        <li>
          <form name="logout" id="logout-button" method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="javascript:logout.submit()">ログアウト</a>
          </form>
        </li>
      @endauth
    </ul>
    <div id="nav-drawer">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input"><span></span></label>
      <label class="nav-unshown" id="nav-close" for="nav-input"></label>
      <div id="nav-content">
        <ul class="drawer-menu">
          @auth
          <li class="drawer-menu__item">
            <a href="{{ route('user.show', ['user' => Auth::id()]) }}">マイページ</a>
          </li>
          <li class="drawer-menu__item">
            <a href="{{ route('post.create') }}">メンバーを募集する</a>
          </li>
          <li class="drawer-menu__item">
            <a href="{{ route('post.index') }}">チームを探す</a>
          </li>
          <li class="drawer-menu__item">
            <a href="{{ route('group.index') }}">チャット</a>
          </li>
          <li class="drawer-menu__item">
            <a href="{{ route('user.edit', ['user' => Auth::id()]) }}">プロフィール編集</a>
          </li>
          <li class="drawer-menu__item">
            <form name="logoutd" id="logout-button" method="POST" action="{{ route('logout') }}">
              @csrf
              <a href="javascript:logoutd.submit()">ログアウト</a>
            </form>
          </li>
          @endauth
          @guest
            <li class="drawer-menu__item"><a href="{{ route('register') }}">新規登録</a></li>
            <li class="drawer-menu__item"><a href="{{ route('login') }}">ログイン</a></li>
          @endguest
        </ul>
      </div>
    </div>
  </div>
</header>