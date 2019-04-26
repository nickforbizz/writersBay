
@if($code == 'errorsArray')
    <li class="list-group-item">${ element[0]}</li>
@else
    <p class="well">
    <div class="alert alert-warning">Some Errors Occured</div>
    </p>

@endif