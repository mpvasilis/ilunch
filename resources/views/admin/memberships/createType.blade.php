@extends('admin.layouts.template')
@section('title')
{{ trans('admin/members.memb-crate-type-title') }}
@endsection

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('admin/members.memb-crate-type-title') }}</h3>

            <div class="box-body">
                {!! Form::open(array('action' => array('MembershipsController@createType'))) !!}

                {!! Form::label('is_active', 'Τύπος ') !!}
                <select class="form-control" name="type">
                    <option value="DAYS">{{ trans('admin/members.memb-duration') }}</option>
                    <option value="VISITS">{{ trans('admin/members.memb-visits') }}</option>
                    <option value="UNTIL">{{ trans('admin/members.memb-until-date') }}</option>
                    <option value="FREE">{{ trans('admin/members.memb-free-until') }}</option>
                </select>

                {!! Form::label('value', 'Τιμή') !!}
                {!! Form::text('value', null, ['class' => 'form-control']) !!}
                {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
