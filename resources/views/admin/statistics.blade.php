@extends('admin.layouts.template')
@section('title')
    Statistics
@endsection

@section('main')
    <h3 class="heading_b uk-margin-bottom">Στατιστικά</h3>

    <div class="md-card">
        <div class="md-card-content">
				    <div id="pop_div">                </div>


				@columnchart('Finances', 'pop_div')
                </div>
    </div>
@endsection
