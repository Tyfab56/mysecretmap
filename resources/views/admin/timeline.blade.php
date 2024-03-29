@extends('frontend.main_master')
@section('scripts')
document.getElementById('translateBtn1').addEventListener('click', function() {
    let inputText = document.getElementById('title_fr').value;
    let apiUrl = 'https://api-free.deepl.com/v2/translate';
    let apiKey = '34b13441-b8ff-f718-3afe-dd39b12c44c8:fx';
    let targetLang = 'en';
    
    let xhr = new XMLHttpRequest();
    xhr.open('POST', apiUrl, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = JSON.parse(xhr.responseText);
            document.getElementById('title_en').value = response.translations[0].text;
        }
    };
    xhr.send('auth_key=' + apiKey + '&text=' + inputText + '&target_lang=' + targetLang);
});

document.getElementById('translateBtn2').addEventListener('click', function() {
    let inputText = document.getElementById('description_fr').value;
    let apiUrl = 'https://api-free.deepl.com/v2/translate';
    let apiKey = '34b13441-b8ff-f718-3afe-dd39b12c44c8:fx';
    let targetLang = 'en';
    
    let xhr = new XMLHttpRequest();
    xhr.open('POST', apiUrl, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = JSON.parse(xhr.responseText);
            document.getElementById('description_en').value = response.translations[0].text;
        }
    };
    xhr.send('auth_key=' + apiKey + '&text=' + inputText + '&target_lang=' + targetLang);
});
$('#getspot').click(function() {
        var id = $('#id-enregistrement').val();
        $.ajax({
            url: '/getspot',
            type: 'post',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function(response) {
                console.log(response);
                $('#description_fr').val(response.description);
            }
        });
    });
@endsection
@section('content')
<div class="box">
  <div class="form-container">
<form method="POST" action="{{ route('admin.timeline.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="id-enregistrement">Id Spots</label>
      <input type="text" id="id-enregistrement" name="id_spot">
      <button id="getspot" type="button">Récupérer l'enregistrement</button>
    </div>
    <div class="form-group">
        <label for="date">{{ __('Date') }}</label>
        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

        @error('date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
    <select name="timelinescat" class="form-control">
            @foreach($icons as $icon)
                <option value="{{ $icon->id }}">{{ $icon->icon }}</option>
            @endforeach
</select>

    </div>
    <div class="form-group">
        <label for="title_fr">{{ __('Title (French)') }}</label>
        <input id="title_fr" type="text" class="form-control @error('title.fr') is-invalid @enderror" name="title[fr]" value="{{ old('title.fr') }}" required autocomplete="title_fr">
        <button id="translateBtn1" type="button">Traduire Titre</button>
        @error('title.fr')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="title_en">{{ __('Title (English)') }}</label>
        <input id="title_en" type="text" class="form-control @error('title.en') is-invalid @enderror" name="title[en]" value="{{ old('title.en') }}" required autocomplete="title_en">
       
        @error('title.en')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description_fr">{{ __('Description (French)') }}</label>
        <textarea id="description_fr" class="form-control @error('description.fr') is-invalid @enderror" name="description[fr]" required autocomplete="description_fr">{{ old('description.fr') }}</textarea>
        <button id="translateBtn2" type="button">Traduire Description</button>
        @error('description.fr')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description_en">{{ __('Description (English)') }}</label>
        <textarea id="description_en" class="form-control @error('description.en') is-invalid @enderror" name="description[en]" required autocomplete="description_en">{{ old('description.en') }}</textarea>

        @error('description.en')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="page">{{ __('Page') }}</label>
        <textarea id="page" class="form-control" name="page">{{ old('page') }}</textarea>     
    </div>

    <div class="form-group">
        <label for="image">{{ __('Image') }}</label>
        <input id="imagetimeline" type="file" class="form-control-file @error('image') is-invalid @enderror" name="imagetimeline">

        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{ __('Create Timeline') }}</button>
</form>
</div>
</div>
<style>
    .form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
textarea {
    display: block;
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    margin-bottom: 10px;
}

input[type="date"] {
    display: block;
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    margin-bottom: 10px;
}

.form-control-file {
    display: block;
    font-size: 16px;
    margin-top: 5px;
}

button[type="submit"] {
    background-color: #2196F3;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0b7dda;
}


.form-container {
  max-width: 50%;
  width : 50%;
  padding: 40px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
}
</style>
@endsection