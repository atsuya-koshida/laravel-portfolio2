@extends('app')

@section('title', 'チャットグループ作成')

@section('content')
    @include('shared/header')

    <main class="main-wrapper">
      <div class="main-wrapper__inner">
        <div class="main-container">
          <div class="group-section new-group">
            <div class="group-section__title">
              <p>チャットグループを作成</p>
            </div>
            @include('error_card_list')
            <form action="{{ route('group.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="text-box">
                <label class="text-label">グループ名</label>
                <input name="name" type="text" placeholder="グループ名を入力して下さい">
              </div>
              <div class="file-box">
                <p>画像</p>
                <input type="file" name="image">
              </div>
              <p style="width: 90%; margin: 0 auto 10px;">フォロー中のユーザーを追加</p>
              <div class="custom-checkboxes">
                @foreach ($followings as $user)
                <label>
                  <input type="checkbox" name="users[]" value="{{ $user->id }}">{{ $user->name }}
                </label>
                @endforeach
              </div>
              <div class="submit-box">
                <input type="submit" value="作成" class="main-btn blue">
              </div>
            </form>
          </div>
        </div>
        @include('shared/sidebar')
      </div>
    </main>
@endsection