@extends('admin.layouts.template')
@section('title')
    Γεύματα
@endsection

@section('main')
    <h3 class="heading_b uk-margin-bottom">Γεύματα</h3>

    <div class="md-card">
    
    <div class="md-card-content">
                   <table id="table" class="uk-table dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="dt_default_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >ID</th>
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Title</th>
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Show Until</th>
                        </tr>
                            
                        </thead>
                        
                        <tbody>
                        @foreach ($meals as $meal)
                        <tr role="row" class="odd">
                            <td>{{ $meal -> id }}</td>
                            <td>{{ $meal -> title }}</td>
                            <td>
                                <a class="md-btn md-btn-warning md-btn-wave-light waves-effect waves-button waves-light" data-uk-modal="{target:'#modal_edit'}" 
                               
                                    data-uk-title="{{ $meal -> title }}"
                                    >Edit</a>
                                <a class="md-btn md-btn-danger md-btn-wave-light waves-effect waves-button waves-light" href="javascript:void(0)">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                    
                        </tfoot>
                    </table>
                </div>
                <div class="md-fab-wrapper">
                    <a class="md-fab md-fab-danger" href="#" id="note_add">
                        <i class="material-icons" data-uk-modal="{target:'#modal_header_footer'}"></i>
                    </a>
                </div>
                            <div class="uk-modal" id="modal_header_footer">
                                <div class="uk-modal-dialog">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Προσθήκη νέου γεύματος </h3>
                                    </div>
    
                                    {!! Form::open(array('action' => array('MealsController@post'))) !!}

                                    <div class="md-input-wrapper">
                                        {!! Form::label('title', 'Όνομα') !!}
                                        {!! Form::text('title', null, ['class' => 'md-input']) !!}
                                    </div>

                                    <div class="md-input">
                                        {!! Form::label('type_id', 'Τύπος Γεύματος') !!}
                                        {{ Form::select('type_id', ['1', '2', '3'], null, ['class' => 'md-input']) }}
                                    </div>

                                     <div class="md-input">
                                        {!! Form::label('is_active', 'Είναι διαθέσιμο') !!}
                                        {{ Form::select('is_active', ['1', '0'], null, ['class' => 'md-input']) }}
                                    </div>

                                    <div class="md-input-wrapper">
                                        {!! Form::label('info', 'Πληροφορίες Γεύματος') !!}
                                        {!! Form::textarea('info', null, ['class' => 'md-input']) !!}
                                    </div>
                                    <div class="uk-modal-footer uk-text-right">
                                         {!! Form::submit('Submit', ['class' => 'md-btn md-btn-primary ']) !!}
                                         {!! Form::close() !!}
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="uk-modal" id="modal_edit">
                                <div class="uk-modal-dialog">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Επεξεργασία Γεύματος </h3>
                                    </div>
    
                                    {!! Form::open(array('action' => array('MealsController@post'))) !!}

                                    <div class="md-input-wrapper" >
                                        {!! Form::label('title', 'Όνομα') !!}
                                        {!! Form::text('title', null, ['class' => 'md-input']) !!}
                                    </div>

                                    <div class="md-input">
                                        {!! Form::label('type_id', 'Τύπος Γεύματος') !!}
                                        {{ Form::select('type_id', ['1', '2', '3'], null, ['class' => 'md-input']) }}
                                    </div>

                                    <div class="md-input">
                                        {!! Form::label('is_active', 'Είναι διαθέσιμο') !!}
                                        {{ Form::select('is_active', ['1', '0'], null, ['class' => 'md-input']) }}
                                    </div>

                                    <div class="md-input-wrapper">
                                        {!! Form::label('info', 'Πληροφορίες Γεύματος') !!}
                                        {!! Form::textarea('info', null, ['class' => 'md-input']) !!}
                                    </div>
                                    <div class="uk-modal-footer uk-text-right">
                                        {!! Form::submit('Submit', ['class' => 'md-btn md-btn-primary ']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
    </div>
    <script>
    

    
@endsection
