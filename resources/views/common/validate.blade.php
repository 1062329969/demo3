<ul>
    @if(count($errors))
        {{--@foreach($errors->all() as $err)--}}
        {{--{{ $err }}--}}
        {{--@endforeach--}}
        <li>{{ $errors->first() }}</li>
    @endif
</ul>