@if($errors->any())
    <div class="row">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    <div class="col-md-4" style="color:red;">
                        {{$error}}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endif
