@extends('layouts.app')


@section('css')
<link href="{{ asset('css/search.css') }}" rel="stylesheet">
@endsection

@section('title', 'Search')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light lightgrey dept-navbar">
    <ul class="navbar-nav">
        @for ($i = 0; $i < 4; $i++)
        <li class="nav-item">
        <a href="/category/{{$categories[$i]->id}}" class="dept-navbar-item">
                    <span>
                        {{$categories[$i]->name}}
                    </span>
                </a>
            </li>
        @endfor
    </ul>
</nav>
<!-- 
    MAIN NAV ======================================================================================================
-->

<div class="search-result-bar bg-light">
    <span class="result-count">
        Returned {{$count}} results for <span class="sec-color font-weight-bold">{{$query}}</span>
    </span>
    <div class="filter-container">
        <span class="cart fa-stack has-badge" data-count="0" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-filter filter-icon fa-stack-1x nav-icon"></i>
        </span>
    </div>
</div>

<div class="container">
    <ul>
        @each('partials.productCard', $products, 'product')
    </ul>
</div>
<!-- PAGE TURNER -->

<nav aria-label="table navigation">
    {{ $products->links("pagination::bootstrap-4") }}
</nav>


<!-- ALL THE MODALS -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Filters</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
			<form id="filter" action="/search">
				<input type="hidden" name="search" value={{$query}}>
				<label for="categoryPicker">Category: </label>
				<select class="form-control" id="categoryPicker" name="category" form="filter">
					<option selected value>Category</option>
					@foreach ($categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
				<br>
				<div class="range-slider">
						<input type="text" name="above" class="above" value="0">??? - 
						<input type="text" name="below" class="below" value="1000">???
						<br>
						<input value="0" min="0" max="1000" step="1" type="range">
						<input value="1000" min="0" max="1000" step="1" type="range">
				</div>
				<label for="orderPicker">Order by: </label>
				<select class="form-control" id="orderPicker" name="order" form="filter">
						<option selected value>Order by</option>
						<option value="ASC">Price: Lowest to Highest</option>
						<option value="DESC">Price: Highest to Lowest</option>
				</select>
			</form>
        </div> <!-- end of modal-body -->
        <div class="modal-footer">
            <button type="submit" form="filter" class="btn btn-primary">Apply filter</button>
        </div>
    </div>
</div>
</div>
@endsection