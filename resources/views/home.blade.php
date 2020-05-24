@extends('app')

@section('title', 'トップページ')

@section('content')
  {{-- ヘッダー --}}
  @include('shared/header')

  <main class="main-wrapper">
    <div class="main-wrapper__inner">
      {{-- トップページの画像 --}}
      <div class="main-container">
        <div class="img-section">
          <img src="/images/basket5.jpeg" alt="" class="main-image">
        </div>
        {{-- 新着投稿 --}}
        <div class="post-section">
          <div class="post-section__title">
            <p style="padding-top: 10px;">新着投稿</p>
          </div>
          {{ $posts->links('pagination::default') }}
          {{-- 記事のカード --}}
          @foreach ($posts as $post)
            @include('shared/card')
          @endforeach
        </div>
      </div>
      {{-- サイドバー --}}
      @include('shared/sidebar')
    </div>
  </main>
@endsection