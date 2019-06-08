@if(session('message'))
    <div class="alert alert-info alert-dismissible" id="successMessage">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{session('message')}}
    </div>
@endif
@if(session('error'))

    <div class="alert alert-danger alert-dismissible fade in" id="errorMessage">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{session('error')}}
    </div>
@endif

@push('scripts')
    <script >
        $(document).ready(function(){
            $("#errorMessage").delay(2000).slideUp(500);
            $("#successMessage").delay(2000).slideUp(500);
    });
    </script>
@endpush






















