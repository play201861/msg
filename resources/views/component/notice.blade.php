@if (session('status'))
<div class="toast position-fixed"
     style="right:0;top:100px"
     data-delay="2000">
    <div class="toast-header">
        <strong class="mr-auto">通知</strong>
        <small>{{ now() }}</small>
        <button class="ml-2 mb-1 close">
            <span>&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{ session('status') }}
    </div>
</div>
<script>
    $('.toast').toast('show')

</script>
@endif
