<!-- message area -->
<div style="text-align:center">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </ul>
        </div>
    @elseif(session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
</div>
<!-- end message area -->