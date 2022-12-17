@extends('frontend.main_master')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/driveway.css')}}" />

@endsection
@section('fullscripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('scripts')

@endsection
@section('content')
@auth
@if (auth()->user()->isPhotographer())
<section id="ts-features" class="ts-features">
    <div class="container">
        <div class="row">
          <div class="col-lg-12"><img  class="w100" src="{{$spot->imgpanolarge??''}}"></div>
        </div>
        <div class="col-12">
          <form  id="fileUploadForm" method="post" action="{{ route('addimagespot.store') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" id="spotid" name="spotid" value="{{$spot->id}}">
              <div class="form-group">
              
                <div class="controls">
                    <input type="file" name="img" class="form-control" id="img">

                    <div class="help-block"></div>
                    @error('img')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
              </div>
            </div>
            <div class=" text-xs-right">
              <input type="submit" name="file" class="btn btn-rounded btn-primary mb-5" value="Validation">
              <a class="btn btn-secondary mb-5" href="/destination/{{ $spot->pays_id }}/{{ $spot->id }}">RETOUR PAGE PRECEDENTE</a>
            
          </div>
          </form>
        </div>
        <div class="row">
          <div class="col-lg-3 bgregbox">
           <p><b>Nombre d'images :</b> {{ $spottotalcount }}</p>
          </div>
          <div class="col-lg-9">
            <div class="dw">
             
            @foreach($pictures as $picture)
            
              <div class="dw-panel">
                
                 <div>
                  <img  src="{{ $picture->medium }}" class="dw-panel__content" alt="">
                 </div>
                 <div><a href="javascript:delPicture({{ $picture->id }})"><img class="addit" src="{{asset('frontend/assets/images/delete.png')}}"></a></div>
              </div>
             
      
                 
            
              
            @endforeach
            </div>
          </div>
        </div>

        <script>
          $(function () {
              $(document).ready(function () {
                  $('#fileUploadForm').ajaxForm({
                      beforeSend: function () {
                          var percentage = '0';
                      },
                      uploadProgress: function (event, position, total, percentComplete) {
                          var percentage = percentComplete;
                          $('.progress .progress-bar').css("width", percentage+'%', function() {
                            return $(this).attr("aria-valuenow", percentage) + "%";
                          })
                      },
                      complete: function (xhr) {
                          console.log('File has uploaded');
                      }
                  });
              });
          });

          function delPicture (id)
            {
            let url = '{{route('delimagespot', ['Id'])}}';
            url = url.replace('Id', id);

            Swal.fire({
            title: 'Confirmer la suppression?',
            text: "Suppression definitive",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer'
            }).then((result) => {
            if (result.value) {
            window.location.href = url;
            }
            });
            }
      </script>
 @else
 Uniquement pour les photographes
 @endif
@endauth
@endsection