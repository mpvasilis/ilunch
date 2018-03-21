@extends('admin.layouts.template')
@section('title')
    Ανακοινώσεις
@endsection

@section('main')
    <h3 class="heading_b uk-margin-bottom">Ανακοινώσεις</h3>

        <div class="md-card">
    
    <div class="md-card-content">
                    <div id="dt_default_wrapper" class="dataTables_wrapper form-inline dt-uikit md-processed"><div class="dt-uikit-header"><div class="uk-grid"><div class="uk-width-medium-2-3"><div class="dataTables_length" id="dt_default_length"><label>Show <select name="dt_default_length" aria-controls="dt_default" class="dt-selectize selectized" tabindex="-1" style="display: none;"><option value="10" selected="selected">10</option></select><div class="selectize-control dt-selectize single"><div class="selectize-input items full has-options has-items"><div class="item" data-value="10">10</div><input type="text" autocomplete="off" tabindex="" style="width: 4px;"></div></div> entries</label></div></div><div class="uk-width-medium-1-3"><div id="dt_default_filter" class="dataTables_filter"><div class="md-input-wrapper"><input type="search" class="md-input" placeholder="Search:" aria-controls="dt_default"><span class="md-input-bar "></span></div></div></div></div></div><div class="uk-overflow-container"><table id="dt_default" class="uk-table dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="dt_default_info" style="width: 100%;">
                        <thead>
                            <tr role="row"><th rowspan="2" class="sorting" tabindex="0" aria-controls="dt_default" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 102px;">ID</th><th colspan="5" rowspan="1">Όνομα</th></tr>
                            
                        </thead>
                        

                        <tbody>
                        @foreach ($announcements as $announcement)
                        <tr role="row" class="odd">
                            <td>{{ $announcement -> id }}</td>
                            <td>{{ $announcement -> title }}</td>
                            
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                    
                        </tfoot>
                    </table></div><div class="dt-uikit-footer"><div class="uk-grid"><div class="uk-width-medium-3-10"><div class="dataTables_info" id="dt_default_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="uk-width-medium-7-10"><div class="simple_numbers" id="dt_default_paginate"><ul class="uk-pagination"><li class="paginate_button previous uk-disabled" id="dt_default_previous"><a href="#" aria-controls="dt_default" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button uk-active"><a href="#" aria-controls="dt_default" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="dt_default" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="dt_default" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="dt_default" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="dt_default" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="dt_default" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="dt_default_next"><a href="#" aria-controls="dt_default" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div></div>
                </div>
    </div>

     <div class="md-fab-wrapper">
                    <a class="md-fab md-fab-danger" href="#" id="note_add">
                        <i class="material-icons" data-uk-modal="{target:'#modal_header_footer'}"></i>
                    </a>
                </div>
                            <div class="uk-modal" id="modal_header_footer">
                                <div class="uk-modal-dialog">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Προσθήκη νέας Ανακοινώσης </h3>
                                    </div>
    
                                    {!! Form::open(['route' => 'admin_announcements']) !!}

                                    <div class="md-input-wrapper">
                                        {!! Form::label('name', 'Τίτλος') !!}
                                        {!! Form::text('name', null, ['class' => 'md-input']) !!}
                                    </div>

                                    <div class="md-input">
                                        {!! Form::label('type', 'Τύπος') !!}
                                        {{ Form::select('type', ['Σημαντικό', 'Ενημέρωση', 'Δωρεάν Γεύματα'], null, ['class' => 'md-input']) }}
                                    </div>

                                    <div class="md-input-wrapper">
                                        {!! Form::label('description', 'Πληροφορίες Γεύματος') !!}
                                        {!! Form::textarea('description', null, ['class' => 'md-input']) !!}
                                    </div>
                                            <div class="uk-modal-footer uk-text-right">
                                         {!! Form::submit('Submit', ['class' => 'md-btn md-btn-primary ']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
    </div>
    
    

    
@endsection
