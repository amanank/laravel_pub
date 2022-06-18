@if(session()->has('message'))

<div class="alert alert-success">
    <button type="button " class="close" data-dismiss="alert">x</button>
    {{session()->get('message')}}
</div>


@endif