@extends('layouts.default')
@section('title', '编辑主题')
@section('content')
<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <?php $channel = $thread->channel ?>
        <div class="panel-heading">
            <h4>更新在<a href="{{ route('channel.show', $channel->id) }}">{{ $channel->channelname }}</a>&nbsp;板块的主题</h4>
        </div>
        <div class="panel-body">
            @include('shared.errors')

            <form method="POST" action="{{ route('thread.update', $thread->id) }}">
                {{ csrf_field() }}
                <?php $labels = $channel->labels()->get(); ?>
                <h6>（<span style="color:#d66666">开帖前请务必阅读：<a href="http://sosad.fun/threads/136">《<u>版规的详细说明</u>》</a>，不要违反版规哦</span>。想要在帖子中讨论边缘限制内容，请移步<a href="http://sosad.fun/threads/1863">《<u>午夜场申请专楼</u> 》</a>。需要帮助可以前往版务区<a href="http://sosad.fun/threads/88">《<u>文章帖子删除、转移、编辑等专楼</u> 》</a>求助。关于网站使用的常规问题，可以查看如下页面：<a href="{{ route('about') }}">《<u>关于本站</u>》</a>，<a href="{{ route('help') }}">《<u>使用帮助</u>》</a>，或前往答疑楼<a href="http://sosad.fun/threads/49">《<u>废文网使用答疑</u>》提问</a>。感谢开楼讨论！）</h6>
                <h4>请选择主题对应类型：</h4>
                @foreach ($labels as $index => $label)
                <label class="radio-inline"><input type="radio" name="label" value="{{ $label->id }}" {{ $label->id == $thread->label_id ? 'checked' : '' }}>{{ $label->labelname }}</label>
                @endforeach
                <br>
                <br>
                <div class="form-group">
                    <label for="title">标题：</label>
                    <input type="text" name="title" class="form-control" value="{{ $thread->title }}">
                </div>

                <div class="form-group">
                    <label for="brief">简介：</label>
                    <input type="text" name="brief" class="form-control" value="{{ $thread->brief }}">
                </div>

                <div class="form-group">
                    <label for="body">正文：</label>
                    <textarea id="mainbody" name="body" data-provide="markdown" rows="20" class="form-control" value="请输入至少20字的内容">{{ $thread->mainpost->body }}</textarea>
                    <button type="button" onclick="retrievecache('mainbody')" class="sosad-button-control addon-button">恢复数据</button>
                    <button type="button" onclick="removespace('mainbody')" class="sosad-button-control addon-button">清理段首空格</button>
                    <button href="#" type="button" onclick="wordscount('mainbody');return false;" class="pull-right sosad-button-control addon-button">字数统计</button>
                </div>

                <div class="checkbox">
                    <label><input type="checkbox" name="anonymous" {{ $thread->anonymous ? 'checked' : '' }}>马甲？</label>
                    <div class="form-group text-right grayout" id="majia" style="display:block">
                        <input type="text" name="majia" class="form-control" value="{{ $thread->majia }}" disabled>
                        <label for="majia"><small>(马甲不可修改，只能脱马或批马)</small></label>
                    </div>
                </div>
                <div class="checkbox">
                    <!-- <label><input type="checkbox" name="markdown" {{ $thread->mainpost->markdown ? 'checked' : '' }}>使用Markdown语法？</label> -->
                    <label><input type="checkbox" name="indentation" {{ $thread->mainpost->indentation ? 'checked' : '' }}>段首缩进（自动空两格）？</label>
                    <br>
                    <!-- <label><input type="checkbox" name="public" {{ $thread->public ? 'checked' : '' }}>是否公开可见</label> -->
                    <label><input type="checkbox" name="noreply" {{ $thread->noreply ? 'checked' : '' }}>是否禁止回帖</label>
                </div>
                <button type="submit" class="btn btn-primary sosad-button">确认修改</button>
            </form>
        </div>
    </div>
</div>

@stop
