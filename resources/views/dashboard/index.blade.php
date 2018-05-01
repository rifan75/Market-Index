@extends('app')

@section('breadcrumbs.items')
	<li class="active">Dashboard</li>
@endsection

@section('breadcrumbs.actions')
<!--
	<a href="#addTransactionModal" data-toggle="modal" class="{{ config('layout.create_button_class') }}"><i class="fa fa-plus"></i> Add Transaction</a>
-->
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

										<div class="row">
							        <div class="ui stackable grid">
							          <div class="three wide center aligned column">
							            <div id="breaking-news-label" class="ui violet large basic label"><i class="fa fa-rss" aria-hidden="true"></i>&nbsp;Breaking News</div>
							          </div>
							          <div class="thirteen wide column">
							            <div id="news-ticker" class="marquee"></div>
							          </div>
							        </div>
							      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
