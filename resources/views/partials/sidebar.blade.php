<ul class="sidebar-menu" id="tree1">
	@section('sidebar-nav')
	<!--
	<li class="sidebar-icon"><a href="/"><i class="fa fa-home fa-2x"></i></a></li>
	<li class="sidebar-divider"></li>
	-->
	<li><a href="{{ route('adminmarketindex') }}">Market Index</a></li>
	<li><a href="{{ route('admincompany') }}">Listing Company</a></li>
	<li >Upload Data
          <ul >
            <li><a href="{{ route('upload') }}">Upload Data Stock</a></li>
						<li><a href="{{ route('uploademiten') }}">Upload Data Emiten</a></li>
          </ul>
  </li>
	<li><a href="">{{ trans('labels.goals.plural') }}</a></li>
	<li><a href="">{{ trans('labels.accounts.plural') }}</a></li>
	<li class="sidebar-divider hidden-xs"></li>
	<li><a href="{{ route('stockdata') }}">Stock Data</a></li>
	<li><a href="{{ route('dashboard') }}">{{ trans('labels.transactions.plural') }}</a></li>
	<li><a href="">{{ trans('labels.categories.plural') }}</a></li>
	<li><a href="">{{ trans('labels.goals.plural') }}</a></li>
	<li><a href="">{{ trans('labels.accounts.plural') }}</a></li>
	<li class="sidebar-divider hidden-xs"></li>

	@show
</ul>
