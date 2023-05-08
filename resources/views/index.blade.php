@extends('layouts_app.app')

@section('title')
    <div class="title">
        <h1>お問い合わせ</h1>
    </div>
@endsection

@section('content')
@error('title')
    <div>{{$message}}</div>
@enderror
    <div>
        <form action="/add" method="post" class="content">
            @csrf
            <table class="content_main">
            @error('fullname')
            <tr>
                <th>
                <td class="content_fiex-sub">{{$message}}</td>
            </td>
            @enderror
            <tr>
                <th class="content_fiex content_fiex-name" name="fullname">お名前<span class="style">※</span></th>
                    <td class="content_fiex-sub">
                        <div class="content-name">
                            <input type="text" class="content_name-sub content_fiex-name" name="fullname" value="{{ old('fullname') }}">
                            <div class="content_example content_example-name">例)山田</div>
                        </div>
                        <div class="content-name">
                            <input type="text" class="content_name-sub content_fiex-name" name="fullname" value="{{ old('fullname') }}">
                            <div class="content_example content_example-name">例)太郎</div>
                        </div>
                    </td>
            </tr>
            @error('gender')
            <tr>
                <th>
                <td class="content_fiex-sub">{{$message}}</td>
            </td>
            @enderror
            <tr>
                <th class="content_fiex">性別<span class="style">※</span></th>
                    <td class="content_fiex-sub">
                        <input type="radio" class="content_sex-sub" name="gender" checked="checked" value="{{ old('gender') }}"  >
                        <em class=content_sex>男性</em>
                        <input type="radio" class="content_sex-sub" name="gender" value="{{ old('gender') }}">
                        <em class=content_sex>女性</em>
                    </td>
            </tr>
            @error('email')
            <tr>
                <th>
                <td class="content_fiex-sub">{{$message}}</td>
            </td>
            @enderror
            <tr>
                <th class="content_fiex">メールアドレス<span class="style">※</span></th>
                    <td class="content_fiex-sub">
                        <input type="email" class="content_email-sub" name="email" value="{{ old('email') }}">
                        <div class="content_example">例)test@exmple.com</div>
                    </td>
            </tr>
            @error('postcode')
            <tr>
                <th>
                <td class="content_fiex-sub">{{$message}}</td>
            </td>
            @enderror
            <tr>
                <th class="content_fiex">郵便番号<span class="style">※</span></th>
                    <td class="content_fiex-sub">
                        <em class="content_post">〒</em>
                        <input type="text" class="content_postcode-sub" name="postcode" pattern="^\d{3}-\d{4}$" id="postcode" value="{{ old('postcode') }}">
                        <div class="content_example content_example-sub">例)123-4567</div>
                    </td>
            </tr>
            @error('address')
            <tr>
                <th>
                <td class="content_fiex-sub">{{$message}}</td>
            </td>
            @enderror
            <tr>
                <th class="content_fiex">住所<span class="style">※</span></th>
                    <td class="content_fiex-sub">
                        <input type="text" class="content_address-sub" name="address" value="{{ old('address') }}">
                        <div class="content_example">例)東京都渋谷区千駄ケ谷1-2-3</div>
                    </td>
            </tr>
            @error('building_name')
            <tr>
                <th>
                <td class="content_fiex-sub">{{$message}}</td>
            </td>
            @enderror
            <tr>
                <th class="content_fiex">建築名</th>
                    <td class="content_fiex-sub">
                        <input type="text" class="content_architecture-sub" name="building_name" value="{{ old('building_name') }}">
                        <div class="content_example">例)千駄ケ谷マンション101</div>
                    </td>
            </tr>
            @error('opinion')
            <tr>
                <th>
                <td class="content_fiex-sub">{{$message}}</td>
            </td>
            @enderror
            <tr>
                <th class="content_fiex">ご意見<span class="style">※</span></th>
                    <td class="content_fiex-sub">
                        <textarea class="content_opinion-sub" name="opinion" maxlength="120" value="{{ old('opinion') }}" cols="40" rows="10"></textarea>
                    </td>
            </tr>
            </table>
            <p class="content_btn">
                <input type="submit" class="content_btn-sub" value="確認">
            </p>
        </form>
    </div>
@endsection

<script>
$(function(){
    // 郵便番号入力欄がフォーカスされたときの処理
    $('input[name="postcode"]').on('focus', function(){
        // 入力値が全角の場合は半角に変換する
        var postcode = $(this).val().replace(/[^0-9０-９]/g, '').replace(/([0-9０-９]{3})([0-9０-９]{4})/, '$1-$2');
        $(this).val(postcode);
    });
});
</script>