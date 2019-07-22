<div class="container-fluid">
    @if ($message = Session::get('success'))

    <div class="alert alert-success alert-dismissible">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
    @endif
    @if ($errors->any())

    <div class="alert alert-error alert-dismissible">{{ $errors->first() }}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
    @endif
    <div class="panelTitle">{{ $title }}</div>
</div>

<script>
    document.title = "{{ $title }}";
</script>
