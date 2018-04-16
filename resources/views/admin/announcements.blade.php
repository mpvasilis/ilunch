@extends('admin.layouts.template')
@section('title')
    Ανακοινώσεις
@endsection

@section('main')
    <h3 class="heading_b uk-margin-bottom">Ανακοινώσεις</h3>
    <div class="md-card">
        <div class="md-card-content"> 
            <table id="table" class="uk-table dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="dt_default_info" style="width: 100%;" >
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >ID</th>
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Title</th>
                            <th class="sorting" tabindex="0" aria-controls="dt_default" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Show Until</th>
                        </tr>  
                        </thead>
                        <tbody>
                        @foreach ($announcements as $announcement)
                        <tr role="row" class="odd">
                            <td>{{ $announcement -> id }}</td>
                            <td>{{ $announcement -> title }}</td>
                            <td>{{ $announcement -> show_until}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
            </table>         
        </div>
    </div>

    <div class="md-fab-wrapper">
                    <a class="md-fab md-fab-danger" href="#" id="note_add">
                        <i class="material-icons" data-uk-modal="{target:'#modal_header_footer'}"></i>
                    </a>
                
                            <div class="uk-modal" id="modal_header_footer">
                                <div class="uk-modal-dialog">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Προσθήκη νέας Ανακοινώσης </h3>
                                    </div>
    
                                    {!! Form::open(array('action' => array('AnnouncementsController@post'))) !!}

                                    <div class="md-input-wrapper">
                                        {!! Form::label('title', 'Τίτλος') !!}
                                        {!! Form::text('title', null, ['class' => 'md-input']) !!}
                                    </div>

                                    <div class="md-input">
                                        {!! Form::label('type', 'Τύπος') !!}
                                        {{ Form::select('type', ['Σημαντικό', 'Ενημέρωση', 'Δωρεάν Γεύματα'], null, ['class' => 'md-input']) }}
                                    </div>
                                    <div class="md-input-wrapper">
                                        {!! Form::label('show_until', 'Ορατό Μέχρι') !!}
                                        {!! Form::text('show_until', null,['class' => 'md-input', 'data-uk-datepicker' => "{format:'DD.MM.YYYY'}"]) !!}
                                    </div>
                                    
                                    <div class="md-input-wrapper">
                                        {!! Form::label('content', 'Πληροφορίες Γεύματος') !!}
                                        {!! Form::textarea('content', null, ['class' => 'md-input']) !!}
                                    </div>
                                    

                                
                                    <div class="uk-modal-footer uk-text-right">
                                         {!! Form::submit('Submit', ['class' => 'md-btn md-btn-primary ']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
    </div>
    
    

   
@endsection
