@extends('layouts.default')

@section('title')
{{ lang('About Us') }}_@parent
@stop

@section('content')

<div class="panel">
    <div class="panel-body">
        <div class="markdown-body" id="emojify">
        
            <h1 id="toc_0">關於 Laravel 台灣</h1>
            
            <h2 id="toc_1">Laravel 台灣</h2>
            <p>Laravel 台灣是一個專門討論 Laravel 及 PHP 的正體中文社群，目前由眾多熱心的志工共同維護，致力於建置完整的 Laravel 正體中文社群。</p>
            <p>歡迎對 Laravel PHP Framework 有興趣的朋友加入討論！任何關於 Laravel 的新聞、議題、疑問、分享都歡迎貼在論壇內。</p>
            <p>您可以在以下地方找到我們：</p>
            <ul>
                <li><a href="http://laravel.tw/">網站</a></li>
                <li><a href="http://laravel.tw/docs">官方文件翻譯</a></li>
                <li><a href="https://www.facebook.com/groups/laravel.tw">Facebook 社團</a></li>
                <li><a href="https://github.com/laravel-taiwan">Github Repo</a></li>
                <li><a href="https://laraveltw.hackpad.com/">Hackpad 文件</a></li>
            </ul>
            
            <h2 id="toc_2">給新鮮人的提示</h2>
            <p>如果您是 PHP 新手，可以先參考 <a href="http://www.phptherightway.com/">PHP The Right Way</a>，可以為您建立完整的 PHP 基礎知識。</p>
            <p>假如您是 Laravel 新手，可以先參考由社群志工翻譯的正體中文 <a href="http://laravel.tw/docs/quick">官方文件</a>。</p>
            
            <h2 id="toc_3">Laravel 學習資源</h2>
            <p>若您對 Laravel 有興趣，想要持續學習，可先參考以下資料：</p>
            <ul>
                <li><a href="http://bit.ly/1rqVGaZ">給你一個使用 Laravel 的理由 - 聖佑</a></li>
                <li><a href="http://bit.ly/1kSaY2J">實戰驚豔 Laravel 給你的5個驚嘆號 - 柏宏</a></li>
                <li><a href="http://bit.ly/1txX9M5">FlyingV Laravel + AWS 經驗分享 - Eugene、Ronald</a></li>
                <li><a href="http://bit.ly/1vR32FA">Laravel x RESTful x AWS - Seta Chuang</a></li>
                <li><a href="http://www.laravel-dojo.com/">Laravel Dojo (Laravel 道場)</a></li>
            </ul>
            <p>或是直接在本論發表新文章，會有熱心的社群朋友跟您一起參與討論！</p>

            <h2 id="toc_4">關於 PHPHub</h2>
            <p>本論壇使用 PHPHub 架設完成，程式碼使用 MIT Licence，您可以在 <a href="https://github.com/summerblue/phphub">Github</a> 上取得源始碼，感謝 <a href="https://github.com/summerblue">Charlie Jade (summerblue)</a> 的付出！</p>
            <p>若您願意協助貢獻或是回報錯誤，歡迎至 Github 上<a href="https://github.com/summerblue/phphub/issues">建立 issue</a>。</p>

        </div>

    </div>
</div>

@stop
