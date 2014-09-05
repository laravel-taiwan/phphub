@extends('layouts.default')

@section('title')
創建新話題_@parent
@stop

@section('content')

<div class="topic_create">

  <div class="col-md-8 main-col">

    <div class="reply-box form box-block">

      <div class="alert alert-warning">
          {{ lang('be_nice') }}
      </div>

      @include('layouts.partials.errors')

      @if(isset($topic))
          {{ Form::model($topic, ['route' => ['topics.update', $topic->id], 'method' => 'patch']) }}
      @else
          {{ Form::open(['route' => 'topics.store', 'method' => 'post']) }}
      @endif

        <div class="form-group">
            <select class="selectpicker form-control" name="node_id" >

              <option value="" disabled {{ App::make('Topic')->present()->haveDefaultNode($node, null) ?: 'selected'; }}>{{ lang('Pick a node') }}</option>

              @foreach ($nodes['top'] as $top_node)
                <optgroup label="{{{ $top_node->name }}}">
                  @foreach ($nodes['second'][$top_node->id] as $snode)
                    <option value="{{ $snode->id }}" {{ App::make('Topic')->present()->haveDefaultNode($node, $snode) ? 'selected' : ''; }} >{{ $snode->name }}</option>
                  @endforeach
                </optgroup>
              @endforeach
            </select>
        </div>

        <div class="form-group">
          {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => lang('Please write down a topic')]) }}
        </div>

        <ul class="list-inline editor-tool">
          <li class="active" id="edit-btn"><a href="javascript:void(0)" onclick="showEditor();" >{{ lang('Edit') }}</a></li>
          <li id="preview-btn"><a href="javascript:void(0)" onclick="preview();" >{{ lang('Preview') }}</a></li>
        </ul>

        <div class="preview display-none markdown-reply box">
{{ lang('No content.') }}..
        </div>

        <div class="form-group">
          {{ Form::textarea('body', null, ['class' => 'form-control',
                                            'rows' => 20,
                                            'style' => "overflow:hidden",
                                            'id' => 'reply_content',
                                            'placeholder' => lang('Please using markdown.')]) }}
        </div>

        <div class="form-group status-post-submit">
          {{ Form::submit(lang('Publish'), ['class' => 'btn btn-primary', 'id' => 'topic-create-submit']) }}
        </div>

      {{ Form::close() }}

    </div>
  </div>

  <div class="col-sm-4 side-bar">

    @if ( $node )

    <div class="panel panel-default corner-radius help-box">
      <div class="panel-heading text-center">
        <h3 class="panel-title">{{ lang('Current Node') }} : {{{ $node->name }}}</h3>
      </div>
      <div class="panel-body">
        {{ $node->description }}
      </div>
    </div>

    @endif

    <div class="panel panel-default corner-radius help-box">
      <div class="panel-heading text-center">
        <h3 class="panel-title">{{ lang('Writting Format Notice') }}</h3>
      </div>
      <div class="panel-body">
        <ul class="list">
          <li>請注意單詞拼寫，以及中英文排版，<a href="https://github.com/sparanoid/chinese-copywriting-guidelines">參考此頁</a></li>
          <li>支持 Markdown 格式,<strong>**粗體**</strong>、~~刪除線~~、<code>`單行代碼`</code></li>
          <li>支持表情符號，見<a href="http://www.emoji-cheat-sheet.com" target="_blank" rel="nofollow">Emoji cheat sheet</a></li>
          <li>@name  會連結到使用者頁面，並會通知他</li>
          <li>![Alt text here](http://foo.com/bar.jpg) 顯示圖片</li>
          <li>http://example.org 自動加連結</li>
          <li>在標題中寫入城市名稱會自動歸類到對應的城市節點上. [還未實現]</li>
        </ul>
      </div>
    </div>

    <div class="panel panel-default corner-radius help-box">
      <div class="panel-heading text-center">
        <h3 class="panel-title">{{ lang('This kind of topic is not allowed.') }}</h3>
      </div>
      <div class="panel-body">
        <ul class="list">
          <li>這裡放一些關於論壇的基本說明</li>
          <li>請儘量分享技術相關的話題, 謝絕發佈社會, 政治等相關新聞</li>
          <li>這裡絕對不討論任何有關盜版軟件、音樂、電影如何獲得的問題</li>
          <li>這裡絕對不會全文轉載任何文章，而只會以連結方式分享</li>
      </div>
    </div>

    <div class="panel panel-default corner-radius help-box">
      <div class="panel-heading text-center">
        <h3 class="panel-title">{{ lang('We can benefit from it.') }}</h3>
      </div>
      <div class="panel-body">
        <ul class="list">
          <li>分享生活見聞, 分享知識</li>
          <li>接觸新技術, 討論技術解決方案</li>
          <li>為自己的創業項目找合夥人, 遇見志同道合的人</li>
          <li>自發線下聚會, 加強社交</li>
          <li>發現更好工作機會</li>
          <li>甚至是開始另一個神奇的開源項目</li>
        </ul>
      </div>
    </div>

  </div>
</div>

@stop

@section('scripts')
    <script src="{{ cdn('js/jquery.autosize.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('textarea').autosize();
        });
    </script>
@stop
