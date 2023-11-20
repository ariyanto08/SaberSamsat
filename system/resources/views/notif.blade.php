@foreach(['error'] as $status)
    @if (session($status))
        <div class="alert alert-danger alert-dismissable costum-danger-box">
            <a href="" class="close" data-dismisa="alert" aria-label="close">&times;</a>
            <strong> {{ session($status)}}</strong>
        </div>
    @endif
@endforeach
