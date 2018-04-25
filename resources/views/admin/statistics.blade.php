@extends('admin.layouts.template')
@section('title')
    Statistics
@endsection

@section('main')
<div class="box-header with-border">
    <h3 class="box-title">Ιστορικό Γευμάτων</h3>
    <div class="box-body">
        <table class="table table-bordered table-hover dataTable" id="table">
                            <thead>
                            <tr role="row">
                                <th>ID</th>
                                <th>Όνομα</th>
                                <th>Ημερομηνία - Ώρα</th>
                                <th>Τύπος Γεύματος</th>
                                
                            </tr>
                                
                            </thead>
                            
                            <tbody>
                            
                            @foreach ($historys as $history)
                            <tr role="row" class="odd">
                                <td>{{ $history['id'] }}</td>
                                <td>{{ $history['name']}}</td>
                                <td>{{ $history['date']}}</td>
                                <td>{{ $history['meal_type']}}</td>
                             
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                        
                            </tfoot>
        </table>

				
   </div>
</div>   
@endsection
