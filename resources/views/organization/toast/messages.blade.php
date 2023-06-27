@if ($message = Session::get('success'))

    <script>
        showNotificationModal('top','right','{{ $message }}','success','<i class="fa fa-check-circle fa-2x"></i>');
    </script>
@endif


@if ($message = Session::get('error'))
    <script>
        showNotificationModal('top','right','{{ $message }}','danger','<i class="fa fa-exclamation-triangle fa-2x"></i>');
    </script>
@endif


@if ($message = Session::get('warning'))
    <script>
        showNotificationModal('top','right','{{ $message }}','warning','<i class="anticon anticon-minus-circle"></i>');
    </script>
@endif

@if ($message = Session::get('info'))
    <script>
        showNotificationModal('top','right','{{ $message }}','info','<i class="anticon anticon-info"></i>');
    </script>
@endif


@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    @foreach ($errors->all() as $error)
    <script>
        showNotificationModal('top','right','{{ $error }}','danger','<i class="fa fa-exclamation-triangle fa-2x"></i>');
    </script>
    @endforeach
</div>
@endif