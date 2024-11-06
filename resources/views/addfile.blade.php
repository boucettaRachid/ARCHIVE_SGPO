@extends('layouts.header')

@section('content')
<main>

<section>
    <div class="container">

        <form method='POST' class="row justify-content-center align-content-center" action="/uploadfile"  enctype="multipart/form-data">
            @csrf
            <div class="col-md-8 my-2 rounded-2 shadow-sm bg-white">

                <div class="m-3">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" viewBox="0 0 468.293 468.293" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M29.525 50.447h111.996c7.335 0 14.11 3.918 17.77 10.274l18.433 25.181a20.507 20.507 0 0 0 17.77 10.274h272.798v287.495c0 15.099-12.241 27.34-27.34 27.34H27.34C12.241 411.011 0 398.77 0 383.671V128.068a205.16 205.16 0 0 1 9.68-62.276 20.505 20.505 0 0 1 19.845-15.345z"  fill="#f6c358" data-original="#f6c358"></path><path d="M42.615 91.473h359.961v152.058H42.615z"  fill="#ebf0f3" data-original="#ebf0f3"></path><path d="M447.788 64.117H334.927a20.504 20.504 0 0 0-18.65 11.983l-19.313 42.267a20.505 20.505 0 0 1-18.65 11.983H0v260.155c0 15.099 12.241 27.34 27.34 27.34h413.613c15.099 0 27.34-12.241 27.34-27.34V84.622c0-11.324-9.181-20.505-20.505-20.505z"  fill="#fcd462" data-original="#fcd462" class=""></path></g></svg>
                    <span class="mx-3 h6">Sélectionnez votre dossier</span>                                
                </div>

                <div class="m-3">
                    <select name='folder' class="form-select" aria-label="Default select example" placeholder="Open To select folder">
                        @foreach($folders as $folder)
                        <option value="{{ $folder->id }}">{{ $folder->Code }}</option>
                        @endforeach
                      </select>
                </div>

            </div>

            <div class="col-md-8 my-2 rounded-2 shadow-sm bg-white">

                <div class="m-3">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" viewBox="0 0 404.48 404.48" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M376.325 87.04c0-16.896-13.824-30.72-30.72-30.72h-230.41c-16.896 0-30.72 13.824-30.72 30.72v286.72c0 16.896 13.824 30.72 30.72 30.72H289.26l87.04-81.92.025-235.52z" style="" fill="#dadee0" data-original="#dadee0"></path><path d="M84.475 87.04c0-16.896 13.824-30.72 30.72-30.72h204.81v-25.6c0-16.896-13.824-30.72-30.72-30.72H58.875c-16.896 0-30.72 13.824-30.72 30.72v286.72c0 16.896 13.824 30.72 30.72 30.72h25.6V87.04z" style="" fill="#1bb7ea" data-original="#1bb7ea"></path><path d="M319.985 322.56h56.32l-87.04 81.92v-51.2c0-16.896 13.824-30.72 30.72-30.72z" style="" fill="#f2f2f2" data-original="#f2f2f2"></path><path d="M161.275 192h138.24a7.68 7.68 0 0 0 7.68-7.68 7.677 7.677 0 0 0-7.68-7.68h-138.24a7.677 7.677 0 0 0-7.68 7.68 7.68 7.68 0 0 0 7.68 7.68M161.275 140.8h138.24a7.68 7.68 0 0 0 7.68-7.68 7.677 7.677 0 0 0-7.68-7.68h-138.24a7.677 7.677 0 0 0-7.68 7.68 7.68 7.68 0 0 0 7.68 7.68M161.275 243.2h138.24a7.68 7.68 0 0 0 7.68-7.68 7.677 7.677 0 0 0-7.68-7.68h-138.24a7.677 7.677 0 0 0-7.68 7.68 7.68 7.68 0 0 0 7.68 7.68M161.275 294.4h76.8a7.68 7.68 0 0 0 7.68-7.68 7.676 7.676 0 0 0-7.68-7.68h-76.8a7.676 7.676 0 0 0-7.68 7.68 7.68 7.68 0 0 0 7.68 7.68" style="" fill="#1f4254" data-original="#1f4254"></path></g></svg>
                    <span class="mx-3 h6">Ajouter des informations pour le fichier</span>                                
                </div>

                <div class="m-3">
                    <label for="type" class="form-label">Ajouter le type du fichier</label>
                    <input type="text" id="type" class="form-control" name="typefile">
                </div>
                
                <div class="m-3">
                    <label for="title" class="form-label">Ajouter le nom du fichier</label>
                    <input type="text" id="title" class="form-control" name="titlefile">
                </div>

                <div class="m-3">
                    <label for="description" class="form-label">Ajouter une description</label>
                    <textarea name="descriptionfile" class="form-control" id="description" cols="30" rows="10"></textarea>
                </div>

                <div class="m-3">
                    <label for="codename" class="form-label">Code de Fichier</label>
                    <input type="text" class="form-control" id="codename" name="codename">
                </div>

            </div>

            <div class="col-md-8 my-2 rounded-2 shadow-sm bg-white">

                <div class="m-3">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" viewBox="0 0 791.454 791.454" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#0263d1" d="M202.718 0h264.814l224.164 233.873v454.622c0 56.868-46.092 102.959-102.959 102.959H202.718c-56.868 0-102.959-46.092-102.959-102.959V102.959C99.759 46.092 145.85 0 202.718 0z" opacity="1" data-original="#0263d1"></path><g fill="#fff"><path fill-rule="evenodd" d="M467.212 0v231.952h224.484z" clip-rule="evenodd" opacity="1" fill="#ffffff302" data-original="#ffffff302"></path><path d="M195.356 564.73V433.71h46.412c9.282 0 17.925 1.387 25.927 3.948 8.002 2.667 15.257 6.508 21.766 11.63 6.508 5.121 11.63 11.95 15.364 20.485s5.655 18.351 5.655 29.447-1.921 20.912-5.655 29.447-8.856 15.364-15.364 20.485-13.764 8.962-21.766 11.63c-8.002 2.561-16.644 3.948-25.927 3.948zm32.755-28.487h9.709c5.228 0 10.136-.64 14.51-1.814 4.481-1.28 8.535-3.307 12.376-5.975s6.828-6.508 8.962-11.523c2.241-4.908 3.307-10.883 3.307-17.711s-1.067-12.803-3.307-17.818c-2.134-4.908-5.121-8.749-8.962-11.416-3.841-2.774-7.895-4.694-12.376-5.975-4.374-1.174-9.282-1.814-14.51-1.814h-9.709zm161.855 29.981c-19.738 0-36.062-6.402-48.972-19.098-12.91-12.697-19.312-28.701-19.312-47.905 0-19.205 6.402-35.209 19.312-47.905 12.91-12.697 29.234-19.098 48.972-19.098 19.418 0 35.529 6.402 48.439 19.098 12.803 12.697 19.205 28.701 19.205 47.905s-6.402 35.209-19.205 47.905c-12.91 12.696-29.021 19.098-48.439 19.098zm-25.18-39.37c6.508 7.255 14.83 10.883 24.966 10.883s18.351-3.628 24.86-10.883c6.508-7.362 9.709-16.538 9.709-27.634s-3.201-20.272-9.709-27.634c-6.508-7.255-14.724-10.883-24.86-10.883s-18.458 3.628-24.966 10.883c-6.508 7.362-9.816 16.538-9.816 27.634s3.308 20.272 9.816 27.634zm170.71 39.37c-19.098 0-34.996-5.975-47.585-17.711-12.697-11.843-18.991-28.274-18.991-49.293 0-20.912 6.402-37.343 19.205-49.186 12.91-11.843 28.594-17.818 47.372-17.818 16.964 0 30.834 4.161 41.824 12.59 10.883 8.322 17.178 19.418 18.778 33.288l-33.075 6.722c-1.387-7.255-4.695-13.123-9.816-17.498s-11.096-6.615-17.925-6.615c-9.389 0-17.178 3.308-23.473 10.029-6.295 6.828-9.496 16.217-9.496 28.487s3.201 21.659 9.389 28.381c6.295 6.828 14.084 10.136 23.579 10.136 6.828 0 12.697-1.92 17.498-5.761s7.789-8.962 9.069-15.364l33.822 7.682c-3.094 13.23-9.923 23.473-20.592 30.834-10.562 7.363-23.792 11.097-39.583 11.097z" fill="#ffffff" opacity="1" data-original="#ffffff"></path></g></g></svg>
                    <span class="mx-3 h6">téléverser un fichier</span>                                
                </div>

                <div class="m-3">
                    <input type="file" class="form-control" id="file" name="filescan[]" >                               
                </div>
            </div>

            <div class="col-md-8 my-2 rounded-2 shadow-sm bg-white">
                <div class="m-3">
                    <input type="submit" value="Save file" class="btn btn-primary w-100">
                </div>
            </div>

        </form>
                  
    </div>

</section>

</main>
@endsection