@extends('layouts.header')

@section('content')

<style>
.col-folders, .col-files, .infofiles{
    height: 630px !important;
    overflow-y: scroll;
}

.col-folders::-webkit-scrollbar {
    display: none;
  }
  .infofiles::-webkit-scrollbar{
    display: none;
  }
  
  /* Hide scrollbar for IE, Edge and Firefox */
  .col-folders, .col-files {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: thin;  /* Firefox */
    margin: 2px;
    border: 1px #e6e5e5 solid;
  }

  .col-files::-webkit-scrollbar{
    scrollbar-width:thin;
  }

  .detailfolder p{
    padding: 0px;
    margin: 0px;
    font-size: 12px;
  }

  .fileshowclass{
    height: 590px ;
  }
  .fileshowclass img{
    height: 600px;
    width: auto;
    object-fit: contain;
  }
  .downqrcode{
    position: relative;
    top: -165px;
    right: -151px;
    padding: 5px;
  }

  .disabledDiv {
    opacity: 0.5;
    pointer-events: none;
   }

   #imgfile.zoomed {
    transform: scale(2); /* Example: Zoom 2x */
    transition: transform 0.3s ease;
    }
</style>

<main>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-0 my-1 rounded-2 col-folders">

            @foreach ($folders as $folder)
                <div class="col p-2 my-1 border-bottom bg-light d-flex">
                    <a class="d-flex link-offset-2 link-underline link-underline-opacity-0" href="{{ route('archiveshow', ['parameter' => $folder->id]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 48 48">
                            <path fill="#FFA000" d="M40,12H22l-4-4H8c-2.2,0-4,1.8-4,4v8h40v-4C44,13.8,42.2,12,40,12z"></path><path fill="#FFCA28" d="M40,12H8c-2.2,0-4,1.8-4,4v20c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V16C44,13.8,42.2,12,40,12z"></path>
                        </svg>
                        <div class="px-3 detailfolder">
                            <h6 class="text-dark m-0">{{ $folder->Title }}<span class="badge text-bg-secondary">{{ $folder->TdeDOCUMENT }}</span></h6>
                            <p class="text-dark">{{ $folder->Code }}</p>
                        </div>                        
                    </a>
                </div>
            @endforeach

            </div>
            <div class="col-md-2 bg-light p-0 m-1 rounded-2 col-folders">

            @if(isset($files))
                @foreach ($files as $file)
                    <div class="col p-2 my-1 border-bottom bg-light d-flex"
                        onclick='fetchData(`{{ route("getfile", ["codefile" => $file->id]) }}`)'>
                            <div class="col-md-2">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" x="0" y="0" viewBox="0 0 791.454 791.454" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#0263D1" d="M202.621 0h264.884l224.238 233.828v454.717c0 56.783-46.126 102.909-103.061 102.909h-386.06c-56.783 0-102.909-46.126-102.909-102.909V102.909C99.712 46.126 145.838 0 202.621 0z" opacity="1" data-original="#0263d1" class=""></path><g fill="#fff"><path fill-rule="evenodd" d="M467.2 0v232.002h224.542z" clip-rule="evenodd" opacity="1" fill="#ffffff302" data-original="#ffffff302" class=""></path><path d="M500.082 411.788h-208.71c-9.591 0-17.507-7.764-17.507-17.354s7.916-17.354 17.507-17.354h208.71c9.591 0 17.354 7.764 17.354 17.354s-7.763 17.354-17.354 17.354zm-69.57 208.71h-139.14c-9.591 0-17.507-7.764-17.507-17.354s7.916-17.354 17.507-17.354h139.14c9.591 0 17.354 7.764 17.354 17.354s-7.763 17.354-17.354 17.354zm69.57-69.57h-208.71c-9.591 0-17.507-7.764-17.507-17.354s7.916-17.354 17.507-17.354h208.71c9.591 0 17.354 7.764 17.354 17.354s-7.763 17.354-17.354 17.354zm0-69.57h-208.71c-9.591 0-17.507-7.764-17.507-17.354s7.916-17.354 17.507-17.354h208.71c9.591 0 17.354 7.764 17.354 17.354s-7.763 17.354-17.354 17.354z" fill="#ffffff" opacity="1" data-original="#ffffff"></path></g></g></svg>                                   
                            </div>
                            <div class="col">
                                <div class="px-3 detailfolder">
                                    <span class="d-none" id="idfileshow">{{ $file->id }}</span>
                                    <h6 class="text-dark m-0"><span id="titlefileshow">{{ $file->Title }}</span><span class="badge text-bg-secondary" id='typefileshow'>{{ $file->TdeFICHER }}</span></h6>
                                    <p id="codefileshow">{{ $file->Code }}</p>
                                    <p id="Descriptionfileshow" class="d-none">
                                    {{ $file->Description }}
                                    </p>
                                </div>
                            </div>
                    </div>
                @endforeach
            @else
            <div class="col p-2 my-1 border-bottom bg-light d-flex">
                <h5>Sélectionnez votre dossier pour afficher les fichiers</h5>
            </div>
            @endif
                
            </div>


            <div class="col fileshowclass" id="filesectionpart">

                <img id="imgfile" src="{{ asset('images/nofile.jpg') }}" class=" mx-2 w-100" alt="file">

            </div>


            <div class="col-md-3 m-1 rounded-3 bg-light infofiles">
                <div class="col-md-12 p-3 d-flex">
                    <a onclick='showedit()' type="button" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                        <i class="fa fa-edit mx-1" aria-hidden="true"></i>
                        Edit file
                    </a>
                    <a type="button" href="#folderCode" class="btn btn-primary mx-2" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                        <i class="fa fa-exchange mx-1" aria-hidden="true"></i>
                        Remplce File
                    </a>
                
                @if($role)
                <form method="POST" action="/deletefile">
                    @csrf
                    <input type="hidden" id='iddelfile' value="" name="idfile">
                    <button type="submit" class="btn btn-danger" onclick="confirmalert('Êtes-vous sûr de vouloir supprimer ce fichier')" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                        <i class="fa fa-trash mx-1" aria-hidden="true"></i>
                        Delete File
                    </button>
                </form>
                @endif


                </div>
                <div  id="editinfofile"  class="col disabledDiv">
                    <form method="POST" action="/editfile" onsubmit="confirmalert('Êtes-vous sûr de vouloir Modifier ce fichier')">
                    @csrf
                        <div class="mb-3">
                            <label for="Namefile"  class="form-label">Nom de ficher</label>
                            <input type="text" id="Namefile" name="Namefile" class="form-control" value="">
                        </div>
                        <div class="mb-3">
                            <label for="codefile"  class="form-label">Code de ficher</label>
                            <input type="text" id="codefile" name="codefile" class="form-control" value="">                                        
                        </div>
                        <div class="mb-3">
                            <label for="typefile"  class="form-label">Type de ficher</label>
                            <input type="text" id="typefile" name="typefile" class="form-control" value="RECU">                     
                        </div>
                        <div class="mb-3">
                            <label for="descriptionfile"  class="form-label">Description de ficher</label>
                            <textarea name="descriptionfile" id="descriptionfile" class="form-control" id="descriptionfile" cols="30" rows="10"> 
                            </textarea>                    
                        </div>
                        <div class="mb-3">
                            <label for="folderCode"  class="form-label">Code de Dossier</label>
                            <select class="form-select" name="folderCode" id="folderCode" aria-label="Default select example">
                            @foreach ($folders as $folder)
                                <option value="{{ $folder->id }}">{{ $folder->Code }}</option>
                            @endforeach
                              </select>                  
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Qr Code</label>
                                <div class="form-control w-50" id="qrcode">
                                </div>
                            <a class="btn btn-success downqrcode" id="downloadEl">
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </a>                  
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="idfile" id="idfileinput">
                            <input type="submit" class="btn btn-primary w-100" value="Enregistrer">
                            <button type="button" onclick="hideinfofile()" class="btn btn-danger mt-2 w-100">Annuler</button>                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

<script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js"></script>
<script>


function fetchData(path) {
    $.ajax({
        url: path,
        type: 'GET',
        success: function(response) {
            //console.log(response);
            document.getElementById('idfileinput').value = response['id'];
            document.getElementById('Namefile').value = response['Title'];
            document.getElementById('typefile').value = response['TdeFICHER'];
            document.getElementById('descriptionfile').value = response['Description'];
            document.getElementById('codefile').value = response['Code'];
            document.getElementById('folderCode').value = response['Folder'];

            let baseUrl = "{{ url('storage/archive') }}";
            let urlfile = `${baseUrl}/${response['file']}`;


            if(getFileExtensionFromUrl(urlfile) == 'pdf'){
                
                console.log('is pdf')
                let partfileshow = document.getElementById('filesectionpart');
                partfileshow.innerHTML = '<iframe src="'+urlfile+'" width="100%" height="600px"></iframe>'

            }else{
                document.getElementById('imgfile').src = urlfile;
            }

            qrcodegene(response['Code']);
            document.getElementById('iddelfile').value = response['id'];
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}


function getFileExtensionFromUrl(url) {
    try {
        // Create a URL object
        let parsedUrl = new URL(url);
        
        // Get the pathname from the URL
        let pathname = parsedUrl.pathname;
        
        // Get the extension by splitting the pathname at the '.' and getting the last part
        let extension = pathname.split('.').pop();
        
        // If there is no extension (no '.' in the pathname), return an empty string
        return extension === pathname ? '' : extension;
    } catch (e) {
        console.error('Invalid URL', e);
        return '';
    }
}

function qrcodegene(code)
{
    // Get the div element
    var qrCodeDiv = document.getElementById("qrcode");

    qrCodeDiv.innerHTML = ``;
    new QRCode(qrCodeDiv, {
        text: code,
        width: 150,
        height: 150,
        colorDark: "#000",
        colorLight: "#fff"
    });

    download();
}

function download() {
  var qrCodeDiv = document.getElementById("qrcode");
  const canvasEl = qrCodeDiv.querySelector('canvas');
  let data = canvasEl.toDataURL('image/png');

  downloadEl.setAttribute('href', data);
  downloadEl.setAttribute('download', 'qrcode.png');
}


function showedit()
{
    document.getElementById("editinfofile").classList.remove("disabledDiv");
}
function hideinfofile()
{
    document.getElementById("editinfofile").classList.add("disabledDiv");
}


function confirmalert(message)
{
    // Show a confirmation dialog box
    var result = window.confirm(message);   
}


</script>

@endsection