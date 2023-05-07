@extends('layouts_app.app')

@section('title')
    <div class="title">
        <h1>内容確認</h1>
    </div>
@endsection

@section('content')
    <div>
        <form action="/thank" method="post" class="content">
            @csrf
            <table class="content_main">
            <tr>
                <th class="content_fiex content_fiex-name" name="fullname">お名前</th>
                    <td class="content_fiex-sub">
                        {{ $data['fullname'] }}
                    </td>
            </tr>
            <tr>
                <th class="content_fiex">性別</th>
                    <td class="content_fiex-sub">
                        {{ $data['gender'] == 0 ? '男性' : '女性' }}
                    </td>
            </tr>
            <tr>
                <th class="content_fiex">メールアドレス</th>
                    <td class="content_fiex-sub">
                        {{ $data['email'] }}
                    </td>
            </tr>
            <tr>
                <th class="content_fiex">郵便番号</th>
                    <td class="content_fiex-sub">
                        {{ $data['postcode'] }}
                    </td>
            </tr>
            <tr>
                <th class="content_fiex">住所</th>
                    <td class="content_fiex-sub">
                        {{ $data['address'] }}
                    </td>
            </tr>
            <tr>
                <th class="content_fiex">建築名</th>
                    <td class="content_fiex-sub">
                        {{ $data['building_name'] }}
                    </td>
            </tr>
            <tr>
                <th class="content_fiex">ご意見</th>
                    <td class="content_fiex-sub content_opinion-sub">
                        {{ $data['opinion'] }}
                    </td>
            </tr>
            </table>
            <div class="content_btn">
                <input type="submit" class="content_btn-sub" value="送信">
            </div>
        </form>
            <div class="content_btn">
                <form action="/complete" method="post" class="content">
                @csrf
                    <input type="submit" class="content_btn-subs" name="action" value="修正する">
                </from>
            </div>
    </div>
@endsection