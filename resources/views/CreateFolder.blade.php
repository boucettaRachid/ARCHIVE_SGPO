@extends('layouts.header')

@section('content')
<style>
    .progress {
    margin-top: 20px;
    height: 20px;
}

.progress-bar {
    background-color: #007bff;
}

</style>
<main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/plupload/3.1.2/plupload.full.min.js"></script>
<section>
    <div class="container">
        <div class="row justify-content-center align-content-center">

            <form method='POST' id="uploadForm" action="/uploadfolder" enctype="multipart/form-data">
            @csrf
                <div class="col-md-8 mx-auto d-block my-2 p-1 rounded-2 shadow-sm bg-white">

                    <div class="m-3">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" viewBox="0 0 468.293 468.293" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M29.525 50.447h111.996c7.335 0 14.11 3.918 17.77 10.274l18.433 25.181a20.507 20.507 0 0 0 17.77 10.274h272.798v287.495c0 15.099-12.241 27.34-27.34 27.34H27.34C12.241 411.011 0 398.77 0 383.671V128.068a205.16 205.16 0 0 1 9.68-62.276 20.505 20.505 0 0 1 19.845-15.345z"  fill="#f6c358" data-original="#f6c358"></path><path d="M42.615 91.473h359.961v152.058H42.615z"  fill="#ebf0f3" data-original="#ebf0f3"></path><path d="M447.788 64.117H334.927a20.504 20.504 0 0 0-18.65 11.983l-19.313 42.267a20.505 20.505 0 0 1-18.65 11.983H0v260.155c0 15.099 12.241 27.34 27.34 27.34h413.613c15.099 0 27.34-12.241 27.34-27.34V84.622c0-11.324-9.181-20.505-20.505-20.505z"  fill="#fcd462" data-original="#fcd462" class=""></path></g></svg>
                        <span class="mx-3 h6">Ajoutez votre dossier ici</span>                                
                    </div>

                    <div class="m-3">
                    <input type="file" id="folderInput" class="form-control" name="folder[]" webkitdirectory mozdirectory multiple required>
                    </div>

                    <!-- Progress bar -->
                    <div id="progressBar" class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <!--<script>// Initialize Plupload
                       $(document).ready(function() {
                        var uploader = new plupload.Uploader({
                            runtimes: 'html5',
                            browse_button: 'folderInput',
                            url: '/uploadfolder',
                            multipart_params: {
                                '_token': '{{ csrf_token() }}'
                            }
                        });

                        uploader.init();

                        uploader.bind('FilesAdded', function(up, files) {
                            uploader.start();
                        });

                        uploader.bind('UploadProgress', function(up, file) {
                            var progress = file.percent;
                            $('#progressBar .progress-bar').css('width', progress + '%').attr('aria-valuenow', progress);
                        });

                        uploader.bind('FileUploaded', function(up, file, response) {
                            console.log('File uploaded:', file.name);
                        });

                        uploader.bind('UploadComplete', function(up, files) {
                            // After all files are uploaded, submit the form
                            $('#uploadForm').submit();
                        });
                        });
                    </script>-->

                    @error('folder.*')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="col-md-8 mx-auto d-block my-2 p-1 rounded-2 shadow-sm bg-white">

                    <div class="m-3">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M496 432.011H272c-8.832 0-16-7.168-16-16v-320c0-8.832 7.168-16 16-16h224c8.832 0 16 7.168 16 16v320c0 8.832-7.168 16-16 16z"  fill="#eceff1" data-original="#eceff1"></path><path d="M336 176.011h-64c-8.832 0-16-7.168-16-16s7.168-16 16-16h64c8.832 0 16 7.168 16 16s-7.168 16-16 16zM336 240.011h-64c-8.832 0-16-7.168-16-16s7.168-16 16-16h64c8.832 0 16 7.168 16 16s-7.168 16-16 16zM336 304.011h-64c-8.832 0-16-7.168-16-16s7.168-16 16-16h64c8.832 0 16 7.168 16 16s-7.168 16-16 16zM336 368.011h-64c-8.832 0-16-7.168-16-16s7.168-16 16-16h64c8.832 0 16 7.168 16 16s-7.168 16-16 16zM432 176.011h-32c-8.832 0-16-7.168-16-16s7.168-16 16-16h32c8.832 0 16 7.168 16 16s-7.168 16-16 16zM432 240.011h-32c-8.832 0-16-7.168-16-16s7.168-16 16-16h32c8.832 0 16 7.168 16 16s-7.168 16-16 16zM432 304.011h-32c-8.832 0-16-7.168-16-16s7.168-16 16-16h32c8.832 0 16 7.168 16 16s-7.168 16-16 16zM432 368.011h-32c-8.832 0-16-7.168-16-16s7.168-16 16-16h32c8.832 0 16 7.168 16 16s-7.168 16-16 16z"  fill="#388e3c" data-original="#388e3c"></path><path d="M282.208 19.691c-3.648-3.04-8.544-4.352-13.152-3.392l-256 48A15.955 15.955 0 0 0 0 80.011v352c0 7.68 5.472 14.304 13.056 15.712l256 48c.96.192 1.952.288 2.944.288 3.712 0 7.328-1.28 10.208-3.68a16.006 16.006 0 0 0 5.792-12.32v-448c0-4.768-2.112-9.28-5.792-12.32z"  fill="#2e7d32" data-original="#2e7d32"></path><path d="m220.032 309.483-50.592-57.824 51.168-65.792c5.44-6.976 4.16-17.024-2.784-22.464-6.944-5.44-16.992-4.16-22.464 2.784l-47.392 60.928-39.936-45.632c-5.856-6.72-15.968-7.328-22.56-1.504-6.656 5.824-7.328 15.936-1.504 22.56l44 50.304-44.608 57.344c-5.44 6.976-4.16 17.024 2.784 22.464a16.104 16.104 0 0 0 9.856 3.36c4.768 0 9.472-2.112 12.64-6.176l40.8-52.48 46.528 53.152A15.874 15.874 0 0 0 208 336.011c3.744 0 7.488-1.312 10.528-3.968 6.656-5.824 7.328-15.936 1.504-22.56z"  fill="#fafafa" data-original="#fafafa"></path></g></svg>
                        <span class="mx-3 h6">Ajoutez votre fichier xsl ici</span>
                    </div>

                    <div class="m-3">
                        <input type="file" class="form-control" accept="xlsx" name="drive" required>
                    </div>
                    @error('drive')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="col-md-8 mx-auto d-block my-2 p-1 rounded-2 shadow-sm bg-white">
                    
                    <div class="m-3">
                        <span class="mx-3 h6">Commencez à télécharger des dossiers</span>
                    </div>
                    
                        <div class="m-3">
                            <input type="submit" class="btn btn-primary w-100" value="AJOUTER">
                        </div>

                        @if(session('success'))

                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                    <img src="{{ asset('images/success.png') }}" width="30" class="rounded me-2" alt="danger">
                                    <strong class="me-auto">AJOUTER LE DOSSIER</strong>
                                    <small>avec succès</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body bg-success text-light">
                                        Votre dossier s'est ajouté avec succès
                                    </div>
                                </div>
                            </div>

                            <script>
                                    $(document).ready(function(){
                                        $('.toast').toast('show');
                                    });
                            </script>

                        @endif

                        @if(session('erorr'))

                            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                    <img src="{{ asset('images/erorr.png') }}" width="30" class="rounded me-2" alt="danger">
                                    <strong class="me-auto">AJOUTER LE DOSSIER</strong>
                                    <small>ERORR</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body bg-danger text-light">
                                        Ce dossier existe dans l'archive
                                    </div>
                                </div>
                            </div>

                            <script>
                                    $(document).ready(function(){
                                        $('.toast').toast('show');
                                    });
                            </script>

                        @endif

                </div>

            </form>

        </div>                    
    </div>

</section>

</main>
@endsection