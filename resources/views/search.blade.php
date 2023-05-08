@extends('layouts_app.search')

@section('title')
    <div class="title">
        <h1>管理システム</h1>
    </div>
@endsection

@section('content')
    <div class="content_border">
        <form action="/search" method="get" class="content">
            @csrf
            <table class="content_main">
            <tr>
                <th class="content_fiex content_fiex-name" name="fullname">お名前</th>
                    <td class="content_fiex-sub">
                        <div class="content-name">
                            <input type="text" class="content_name-sub content_fiex-name" name="fullname">
                        </div>
                    </td>
                <th class="content_fiex-sex">性別</th>
                    <td class="content_fiex-sub content_fiex-sex">
                        <input type="radio" class="content_sex-sub" name=sex checked="checked" value="2">
                        <em class=content_sex>全て</em>
                        <input type="radio" class="content_sex-sub" name=sex value="0">
                        <em class=content_sex>男性</em>
                        <input type="radio" class="content_sex-sub" name=sex value="1">
                        <em class=content_sex>女性</em>
                    </td>
            </tr>
            <tr>
                <th class="content_fiex">登録日</th>
                    <td class="content_fiex-sub">
                            <input type="text" class="content_postcode-sub" name="" value="">
                            <em class="content_post">～</em>
                            <input type="text" class="content_postcode-subs" name="" value="">
                    </td>
            </tr>
            <tr>
                <th class="content_fiex">メールアドレス</th>
                    <td class="content_fiex-sub">
                        <input type="email" class="content_email-sub" name=email value="">
                    </td>
            </tr>
            </table>
            <p class="content_btn">
                <input type="submit" class="content_btn-search" name="keyword"  id="datepicker" value="検索">
            </p>
        </form>
        <form action="/search" method="get" class="content">    
            <p class="content_btn-sub">
                <input type="submit" class="content_btn-reset" value="リセット">
            </p>
        </form>
    </div>
@endsection

@section('page')
<div class="page">
    <div>全35件中 {{ $contacts->firstItem() }}件～{{ $contacts->lastItem() }}件目</div>
    {{ $contacts->links() }}
</div>
@endsection

@section('search')
    <div class="search">
        <table class="search-main">
            <tr class="search-second">
                <th class="search-third">ID</th>
                <th class="search-four">お名前</th>
                <th class="search-five">性別</th>
                <th class="search-six">メールアドレス</th>
                <th class="search-seven">ご意見</th>
            </tr>
            @foreach ($contacts as $contact)
            <tr class="search-list">
                <td class="contact-create search-third">{{$contact->id}}</td>
                <td class="contact-create search-four">{{$contact->fullname}}</td>
                <td class="contact-create search-five">
                    @if($contact->gender == 0)
                    男性
                    @elseif($contact->gender == 1)
                    女性
                    @else
                    全て
                    @endif
                </td>
                <td class="contact-create search-six">{{$contact->email}}</td>
                <td class="contact-create search-seven search-seven_sub">{{$contact->opinion}}</td>
                <td>
                    <form action="/del" method="post">
                    @csrf
                        <input type="hidden" name="id" value="{{ $contact->id }}">
                        <input class="from-btn_del" type="submit" value="削除">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection

<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
    });
</script>