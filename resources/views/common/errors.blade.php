@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-sm-6">
            <div class="alert alert-danger">
                <strong>Whoops! Something went wrong!</strong>
         
                <br><br>
         
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
       
    </div>
   
@endif