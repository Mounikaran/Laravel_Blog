@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif

@if (session('success'))
    <script>
       $(document).ready(function(){
            $('.post-toast').toast('show');
        });
    </script>
    <div class="toast post-toast myToast dusty-grass-gradient" role="alert" aria-live="assertive" aria-atomic="true" data-delay=2000>
        <div class="toast-body teal-text font-weight-bold">
            <i class="fas fa-check-circle px-2"></i> {{ session('success') }}
        </div>
      </div>
@endif

@if (session('update'))
    <script>
        $(document).ready(function(){
            $('.update-toast').toast('show');
        });
    </script>
    <div class="toast update-toast myToast winter-neva-gradient" role="alert" aria-live="assertive" aria-atomic="true" data-delay=2000>
        <div class="toast-body indigo-text font-weight-bold">
            <i class="far fa-check-circle px-2"></i> {{ session('update') }}
        </div>
      </div>
@endif
@if (session('delete'))
    <script>
        $(document).ready(function(){
            $('.delete-toast').toast('show');
        });
    </script>
    <div class="toast delete-toast myToast peach-gradient" role="alert" aria-live="assertive" aria-atomic="true" data-delay=2000>
        <div class="toast-body text-danger font-weight-bold">
            <i class="far fa-trash-alt px-2"></i> {{session('delete')}}
        </div>
      </div>
@endif


