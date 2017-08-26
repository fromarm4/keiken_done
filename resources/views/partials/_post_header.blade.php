@if($post->isOpen())
<span class="label label-danger"><i class="fa fa-bullhorn" aria-hidden="true"></i> 募集中</span>
@else
<span class="label label-success"><i class="fa fa-check-square" aria-hidden="true"></i> 募集は締め切りました</span>
@endif

<span class="pull-right">{{ $post->created_at }}</span>