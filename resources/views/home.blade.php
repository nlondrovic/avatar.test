<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

<div class="p-1">

    <div class="d-flex flex-row justify-content-evenly w-100">
        <a class="nav-link" href="{{ route('home') }}"><h2>Pending</h2></a>
        <a class="nav-link text-success" href="{{ route('saved') }}"><h2>Saved</h2></a>
        <a class="nav-link text-danger" href="{{ route('discarded') }}"><h2>Discarded</h2></a>
    </div>

    @foreach($images as $image)
        <div class="img-card border-bottom border-2 pb-2" id="{{ 'img_card_'.$image['id'] }}">
            <img width="100" class="w-100" id="{{ 'img_'.$image['id'] }}"
                 src="{{ asset($image['path']) }}">
            @if(isset($showButtons) && $showButtons)
                <div class="d-flex flex-row justify-content-evenly w-100 mt-2">
                    <form action="{{ route('discardImage') }}" method="post">
                        @method('post')
                        @csrf
                        <input type="hidden" name="path" value="{{ $image['path'] }}">
                        <button class="btn btn-danger">DISCARD</button>
                    </form>

                    <form action="{{ route('saveImage') }}" method="post">
                        @method('post')
                        @csrf
                        <input type="hidden" name="path" value="{{ $image['path'] }}">
                        <button class="btn btn-success">SAVE</button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach

</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>

</body>

</html>
