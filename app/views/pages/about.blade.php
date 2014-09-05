@extends('layouts.default')

@section('title')
{{ lang('About Us') }}_@parent
@stop

@section('content')

<div class="panel">
    <div class="panel-body">
        <div class="markdown-body" id="emojify">
            <h1 id="toc_0">關於我們 </h1>
            <h2 id="toc_1">說明</h2>

            <h2 id="toc_2">關於新手問題</h2>

            <p>這個社群不是用來問新手問題的, 如果你是新手, 請先看 <a href="http://www.phptherightway.com/">PHP The Right Way</a> , 裡面有中文版本, 此文件能為你構建一個合理的 PHP 基礎知識體系. </p>

            <p>第一次接觸 Laravel? 這裡是 <a href="http://laravel.com/docs/quick">官方文件</a>, 中文翻譯見 <a href="http://laravel.tw/doc/quick">Laravel 中文版</a>, Laravel 的出名, 也得益於這份撰寫精煉的文件, 值得多讀幾遍.</p>

            <p>在學習上遇到問題的時候, 請先 Google. </p>

            <p>如果覺得你的問題比較特別, 需要單獨提問的話, 請到 <a href="http://segmentfault.com/t/php">Segmentfault 的 PHP 分類下</a> 發表你的問題, 謝謝. </p>

            <h2 id="toc_7">Laravel?</h2>

            <p>為什麼是 Laravel? 為什麼不是 CI, Symfony, CakePHP, ThinkPHP ... </p>

            <blockquote>
                <p>Because Laravel is amazing and It is the future.</p>
            </blockquote>

            <h2 id="toc_">關於 PHPHub</h2>
            <p>PHPHub 是積極向上的 PHP &amp; Laravel 開發者社群</p>
            <p>我們是一個公益組織, 致力於推動 Laravel, php-fig 等國外 PHP 新技術, 新理念在中國的發展.</p>

            <p>在這裡沒有商業廣告, 沒有灌水, 沒有千篇一律新手問答, 有的是關於新技術的討論和分享. </p>

            <p>名字的靈感來自偉大的 Github, <b>hub</b> 有 "中心", "集線器" 的意思, 意味著 PHPer 們齊聚一堂, 互相交換著信息流. </p>

            <p>本項目基于 MIT Licence 開源, <a href="https://github.com/summerblue/phphub">原始碼在此 at Github</a>, 歡迎貢獻代碼, Feature Request 和 Bug Report <a href="https://github.com/summerblue/phphub/issues">請到此發表</a>.</p>



        </div>

    </div>
</div>

@stop
