@for($i=1;$i<=5;$i++)
@if($i <= $count)
<span class="fa fa-star" aria-hidden="true"></span>
@elseif ($i == round($count))
<span class="fa fa-star-half-o fa-flip-horizontal" aria-hidden="true"></span>
@else
<span class="fa fa-star-o" aria-hidden="true"></span>
@endif
@endfor