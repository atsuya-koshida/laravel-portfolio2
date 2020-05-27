@extends('app')

@section('title', 'プロフィール編集')

@section('content')
    @include('shared/header')

    <main class="main-wrapper">
      <div class="main-wrapper__inner">
        <div class="main-container">
          <div class="user-section">
            <p class="user-section__title">プロフィール編集</p>
            <form action="{{ route('user.update', ['user' => $user]) }}" method="POST" enctype="multipart/form-data">
              @method('PATCH')
              @csrf
              <div class="text-box">
                <label>名前</label>
                <input type="text" name="name" placeholder="名前を入力して下さい" required value="{{ $user->name ?? old('name') }}">
              </div>
              <div class="text-box">
                <label>メールアドレス</label>
                <input type="email" name="email" placeholder="メールアドレスを入力して下さい" required value="{{ $user->email ?? old('email') }}">
              </div>
              <div class="text-box">
                <label>生年月日</label>
                <div class="date-box">
                  <input type="date" name="birthday" value="{{ $user->birthday ?? old('birthday') }}">
                </div>
              </div>
              <div class="file-box">
                <p>画像</p>
                <input type="file" name="image">
              </div>
              <div class="select-box selected">
                <select name="prefecture_id">
                  <option value="" hidden>都道府県を選んでください</option>
                  @foreach ($prefectures as $prefecture)
                  @if ($prefecture->id === $user->prefecture_id)
                  <option value="{{ $prefecture->id }}" selected>{{ $prefecture->name }}</option>
                  @else
                  <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <p style="width: 90%; margin: 0 auto 10px;">ポジション</p>
              <div class="custom-checkboxes">
                @foreach ($sorted_positions as $position)
                @if (empty($position->pivot))
                <label>
                  <input type="checkbox" name="positions[]" value="{{ $position->id }}">{{ $position->name }}
                </label>
                @else
                <label>
                  <input type="checkbox" name="positions[]" value="{{ $position->id }}" checked>{{ $position->name }}
                </label>
                @endif
                @endforeach
              </div>
              <div class="submit-box">
                <input type="submit" value="更新する" class="main-btn blue">
              </div>
            </form>
          </div>
        </div>
        @include('shared/sidebar')
      </div>
    </main>
@endsection