@extends('layouts.header')

@section('content')
<section class="mt-5">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-2 justify-content-center d-grid rounded-3 bg-white shadow-lg m-2">

                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col-md-10 bg-light py-4 shadow-sm text-center justify-content-center align-items-center d-grid">
                                    <img src="{{ asset('images/folder.png'); }}" alt="folder" class="mx-auto d-block" width="80" srcset="{{ asset('images/folder.png'); }}">
                                    <span class="fw-bolder"><b class="h4" >+ {{ $folders }}</b> Dossiers</span>
                                </div>
                                <div class="col-md-10 bg-light py-4 shadow-sm text-center justify-content-center align-items-center d-grid">
                                <img src="{{ asset('images/documentation.png'); }}" alt="documentation" class="mx-auto d-block" width="80" srcset="{{ asset('images/documentation.png'); }}">
                                    <span class="fw-bolder mt-2"><b class="h4" >+ {{ $files  }}</b> fichers</span>
                                </div>
                                <div class="col-md-10 bg-light py-4 shadow-sm text-center justify-content-center align-items-center d-grid">
                                <img src="{{ asset('images/group.png'); }}" alt="users" class="mx-auto d-block" width="80" srcset="{{ asset('images/group.png'); }}">
                                    <span class="fw-bolder"><b class="h4" >+ {{ $users  }}</b> Utilisateurs</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 rounded-3 bg-white shadow-lg m-2">

                            <div class="row">
                                <div class="col-md-12 p-3">
                                    <h5>Statique Des Archives Cette Année</h5>
                                </div>
                            </div>

                            <canvas id="myChart"></canvas>

                            <div class="row justify-content-center align-items-center my-3 g-2">
                                <div class="col rounded-1 bg-blurgrid shadow-sm align-items-center p-2 mx-1 d-flex">
                                    <a class="link-underline text-dark link-underline-opacity-0 d-flex" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                                            <path fill="#FFA000" d="M40,12H22l-4-4H8c-2.2,0-4,1.8-4,4v8h40v-4C44,13.8,42.2,12,40,12z"></path><path fill="#FFCA28" d="M40,12H8c-2.2,0-4,1.8-4,4v20c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V16C44,13.8,42.2,12,40,12z"></path>
                                        </svg>
                                        <div class="mx-1 chartdes">
                                            <span>Dernier Dossier</span>
                                            <h6><b>Code :</b>@if($lastfolder){{ $lastfolder->Code  }}@endif</h6>                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="col rounded-1 bg-blurgrid shadow-sm align-items-center p-2 mx-1 d-flex">
                                    <a class="link-underline text-dark link-underline-opacity-0 d-flex" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" x="0" y="0" viewBox="0 0 56 56" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M49.455 8C48.724 3.538 38.281 0 25.5 0S2.276 3.538 1.545 8H1.5v37h.045c.731 4.461 11.175 8 23.955 8s23.224-3.539 23.955-8h.045V8h-.045z"  fill="#545e73" data-original="#545e73"></path><path d="M25.5 41c-13.255 0-24-3.806-24-8.5V45h.045c.731 4.461 11.175 8 23.955 8s23.224-3.539 23.955-8h.045V32.5c0 4.694-10.745 8.5-24 8.5zM1.5 32v.5c0-.168.018-.334.045-.5H1.5zM49.455 32c.027.166.045.332.045.5V32h-.045z"  fill="#38454f" data-original="#38454f"></path><path d="M25.5 29c-13.255 0-24-3.806-24-8.5V33h.045c.731 4.461 11.175 8 23.955 8s23.224-3.539 23.955-8h.045V20.5c0 4.694-10.745 8.5-24 8.5zM1.5 20v.5c0-.168.018-.334.045-.5H1.5zM49.455 20c.027.166.045.332.045.5V20h-.045z"  fill="#556080" data-original="#556080"></path><ellipse cx="25.5" cy="8.5" rx="24" ry="8.5"  fill="#91bae1" data-original="#91bae1"></ellipse><path d="M25.5 17c-13.255 0-24-3.806-24-8.5V21h.045c.731 4.461 11.175 8 23.955 8s23.224-3.539 23.955-8h.045V8.5c0 4.694-10.745 8.5-24 8.5zM1.5 8v.5c0-.168.018-.334.045-.5H1.5zM49.455 8c.027.166.045.332.045.5V8h-.045z"  fill="#8697cb" data-original="#8697cb"></path><circle cx="42.5" cy="44" r="12"  fill="#26b999" data-original="#26b999"></circle><path d="M49.071 38.179a.999.999 0 0 0-1.392.25l-5.596 8.04-3.949-3.242a.999.999 0 1 0-1.268 1.546l4.786 3.929a1.003 1.003 0 0 0 1.455-.201l6.214-8.929a1.002 1.002 0 0 0-.25-1.393z"  fill="#ffffff" data-original="#ffffff"></path></g></svg>
                                        <div class="mx-1 chartdes">
                                            <span>Stockage</span>
                                            <h6><b>{{ $stockage  }} MB</b></h6>                                            
                                        </div>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-3 rounded-3 bg-white shadow-lg m-2">

                            <div class="row">
                                <div class="col-md-12 p-3">
                                    <h5>Panel de Contrôle</h5>
                                </div>
                            </div>

                            <div class="row justify-content-center align-content-center ">
                                <div class="col-md-5 text-center rounded-3 m-2 align-content-center d-flow py-3 bg-folder">
                                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="/CreateFolder">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#ffa000" d="M59 19v-8a4 4 0 0 0-4-4H28.472c-1.515 0-2.9-.856-3.578-2.211l-.789-1.578A4.001 4.001 0 0 0 20.527 1H5a4 4 0 0 0-4 4v20h57z" opacity="1" data-original="#69adfe" class=""></path><path fill="#e8ecef" d="M54 24V13a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v11z" opacity="1" data-original="#e8ecef" class=""></path><path fill="#ffbd4f" d="M59 19v30a4 4 0 0 1-4 4H5a4 4 0 0 1-4-4V25a4 4 0 0 1 4-4h26.528c1.515 0 2.9-.856 3.578-2.211l.789-1.578A4.001 4.001 0 0 1 39.473 15h15.528a4 4 0 0 1 4 4z" opacity="1" data-original="#8dd1fe" class=""></path><circle cx="30" cy="43" r="16" fill="#ffffff" opacity="1" data-original="#61c161" class=""></circle><path fill="#24adff" d="M40 42v2c0 .55-.45 1-1 1h-7v7c0 .55-.45 1-1 1h-2c-.55 0-1-.45-1-1v-7h-7c-.55 0-1-.45-1-1v-2c0-.55.45-1 1-1h7v-7c0-.55.45-1 1-1h2c.55 0 1 .45 1 1v7h7c.55 0 1 .45 1 1z" opacity="1" data-original="#ffffff" class=""></path></g></svg>
                                        <p class="text-white  mt-2">Ajouter le Dossier</p>                                    
                                    </a>
                                </div>
                                <div class="col-md-5 text-center rounded-3 m-2 align-content-center d-flow py-3 bg-file">
                                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="/addfile">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#eceff1" d="M14.25 0H2.75C1.23 0 0 1.23 0 2.75v15.5C0 19.77 1.23 21 2.75 21h6.59a8.731 8.731 0 0 1-.84-3.75c0-1.15.22-2.25.64-3.26.2-.51.45-1 .74-1.45A8.827 8.827 0 0 1 12.36 10c.51-.35 1.05-.64 1.63-.86A8.18 8.18 0 0 1 17 8.51V2.75C17 1.23 15.77 0 14.25 0z" opacity="1" data-original="#eceff1" class=""></path><g fill="#90a4ae"><path d="M14 9c0 .05 0 .1-.01.14-.58.22-1.12.51-1.63.86H4c-.55 0-1-.45-1-1s.45-1 1-1h9c.55 0 1 .45 1 1zM9.88 12.54c-.29.45-.54.94-.74 1.45C9.1 14 9.05 14 9 14H4c-.55 0-1-.45-1-1s.45-1 1-1h5c.38 0 .72.22.88.54zM8 6H4a1 1 0 0 1 0-2h4a1 1 0 0 1 0 2z" fill="#90a4ae" opacity="1" data-original="#90a4ae"></path></g><path fill="#2196f3" d="M17.25 24c-3.722 0-6.75-3.028-6.75-6.75s3.028-6.75 6.75-6.75S24 13.528 24 17.25 20.972 24 17.25 24z" opacity="1" data-original="#2196f3"></path><path fill="#ffffff" d="M17.25 21a1 1 0 0 1-1-1v-5.5a1 1 0 0 1 2 0V20a1 1 0 0 1-1 1z" opacity="1" data-original="#ffffff"></path><path fill="#ffffff" d="M20 18.25h-5.5a1 1 0 0 1 0-2H20a1 1 0 0 1 0 2z" opacity="1" data-original="#ffffff"></path></g></svg>
                                        <p class="text-white mt-2">Ajouter le Fichier</p>
                                    </a>
                                </div>
                                <div class="col-md-5 text-center rounded-3 m-2 align-content-center d-flow py-3 bg-users">
                                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="/Users">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="60" height="60" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M371.613 227.096v5.795a66.072 66.072 0 0 0 3.39 20.891l13.126 39.378h24.774v-90.839h-16.516c-13.682.001-24.774 11.092-24.774 24.775z" fill="#5a4146" data-original="#5a4146"></path><path d="m484.684 244.251-13.974 48.91-66.065-57.806c-9.122 0-16.516-7.395-16.516-16.516 0-13.682 11.092-24.774 24.774-24.774h57.806c9.122 0 16.516 7.395 16.516 16.516v15.522a66.042 66.042 0 0 1-2.541 18.148z"  fill="#694b4b" data-original="#694b4b"></path><path d="M404.64 317.94h49.548v36.549H404.64z"  fill="#e6af78" data-original="#e6af78"></path><path d="M404.645 333.104c7.659 3.112 16.011 4.864 24.774 4.864s17.115-1.752 24.774-4.864v-15.169h-49.548v15.169z"  fill="#d29b6e" data-original="#d29b6e" class=""></path><path d="m494.031 349.351-39.84-11.382-24.772 16.439-24.774-16.44-39.838 11.383a24.774 24.774 0 0 0-17.968 23.821v60.376a8.258 8.258 0 0 0 8.258 8.258h148.645a8.258 8.258 0 0 0 8.258-8.258v-60.376a24.774 24.774 0 0 0-17.969-23.821z"  fill="#d5dced" data-original="#d5dced"></path><path d="M437.677 441.805h-16.516l4.129-87.321h8.258z"  fill="#afb9d2" data-original="#afb9d2"></path><path d="M429.419 326.193c-27.365 0-49.548-22.184-49.548-49.548v-9.675c0-4.38 1.74-8.581 4.837-11.679l14.975-14.975c3.171-3.171 7.507-4.994 11.989-4.853 26.398.833 49.764 6.488 62.537 18.963 3.127 3.054 4.759 7.326 4.759 11.696v10.523c0 27.365-22.184 49.548-49.549 49.548z"  fill="#f0c087" data-original="#f0c087"></path><path d="M404.645 269.018c0-9.526 8-17.098 17.507-16.492 16.671 1.064 41.409 3.85 56.586 11.15-.495-3.484-1.992-6.773-4.529-9.251-12.773-12.475-36.139-18.13-62.537-18.963l-.001.001v-.001c-4.481-.141-8.818 1.683-11.988 4.853l-14.974 14.974a16.513 16.513 0 0 0-4.838 11.679v9.675c0 22.596 15.141 41.621 35.82 47.579-6.883-8.492-11.045-19.272-11.045-31.063l-.001-24.141z"  fill="#e6af78" data-original="#e6af78"></path><path d="M478.968 397.779c0-6.571 2.61-12.872 7.256-17.518l21.257-21.257c2.841 4.061 4.519 8.95 4.519 14.169v60.376a8.258 8.258 0 0 1-8.258 8.258h-24.774v-44.028z"  fill="#c7cfe2" data-original="#c7cfe2" class=""></path><path d="M433.548 371h-8.258a4.13 4.13 0 0 1-4.129-4.129v-12.387h16.516v12.387a4.129 4.129 0 0 1-4.129 4.129z"  fill="#959cb5" data-original="#959cb5" class=""></path><path d="M429.419 354.409 415.422 365.1a4.955 4.955 0 0 1-7.354-1.558l-12.556-22.93 5.054-7.709a3.303 3.303 0 0 1 5.009-.611l23.844 22.117zM429.419 354.409l13.997 10.692a4.955 4.955 0 0 0 7.354-1.558l12.556-22.93-5.054-7.709a3.303 3.303 0 0 0-5.009-.611l-23.844 22.116z"  fill="#c7cfe2" data-original="#c7cfe2" class=""></path><path d="M147.822 322.745c-7.057-18.698-12.654-50.841-13.863-67.576-2.3-31.846-26.299-57.806-58.741-57.806s-56.441 25.961-58.741 57.806c-1.209 16.734-6.806 48.878-13.863 67.576-1.555 4.122.24 8.667 4.299 10.507 7.562 3.427 23.685 10.141 43.13 12.756h50.349c19.354-2.621 35.59-9.339 43.13-12.756 4.06-1.84 5.855-6.385 4.3-10.507z"  fill="#5a4146" data-original="#5a4146"></path><path d="M143.523 333.253c4.058-1.84 5.854-6.385 4.298-10.507-7.056-18.698-12.654-50.841-13.862-67.576-2.299-31.846-26.299-57.806-58.74-57.806l-.245.001c-24.893.101-33.69 34.05-12.261 46.717 1.287.761 2.112 1.127 2.112 1.127l18.769 100.8h16.799c19.354-2.623 35.59-9.34 43.13-12.756z"  fill="#694b4b" data-original="#694b4b"></path><path d="m134.95 362.588-26.724-13.361a16.516 16.516 0 0 1-9.13-14.774l.002-24.775h-49.55v24.776a16.515 16.515 0 0 1-9.13 14.772l-26.724 13.362A24.771 24.771 0 0 0 0 384.745v48.802a8.258 8.258 0 0 0 8.258 8.258h132.129a8.258 8.258 0 0 0 8.258-8.258v-48.801a24.773 24.773 0 0 0-13.695-22.158z"  fill="#e6af78" data-original="#e6af78"></path><path d="M74.323 342.709c8.892 0 17.409-1.833 25.217-5.096-.205-1.041-.444-2.076-.444-3.161l.002-24.775h-49.55v24.776c0 1.091-.239 2.131-.446 3.176 7.813 3.246 16.326 5.08 25.221 5.08z"  fill="#d29b6e" data-original="#d29b6e" class=""></path><path d="m134.95 362.588-19.038-9.519c-8.828 13.632-24.139 22.673-41.589 22.673s-32.762-9.041-41.59-22.674l-19.038 9.52A24.772 24.772 0 0 0 0 384.745v48.802a8.258 8.258 0 0 0 8.258 8.258h132.129a8.258 8.258 0 0 0 8.258-8.258v-48.801a24.773 24.773 0 0 0-13.695-22.158z"  fill="#d5dced" data-original="#d5dced"></path><path d="M74.323 326.193c-25.192 0-45.992-18.8-49.137-43.135-.456-3.526 1.239-6.983 4.413-8.584 3.802-1.918 9.327-5.152 14.617-9.872 5.891-5.256 9.347-10.799 11.299-14.868 1.681-3.504 5.545-5.486 9.311-4.525 29.076 7.416 48.871 22.543 56.053 28.719 1.928 1.658 3.039 4.103 2.841 6.639-2.001 25.53-23.352 45.626-49.397 45.626z"  fill="#f0c087" data-original="#f0c087"></path><path d="M120.878 273.927c-7.181-6.176-26.977-21.303-56.053-28.719-3.766-.961-7.63 1.021-9.311 4.525-1.478 3.082-3.921 7.008-7.546 11.016l-.005.028c-1.125 1.275-2.323 2.553-3.747 3.825-5.29 4.721-10.815 7.954-14.617 9.872-3.174 1.601-4.868 5.059-4.413 8.585 2.825 21.855 19.927 39.251 41.625 42.569-9.887-6.726-17.262-15.976-17.262-32.466v-11.776c1.876-1.385 3.765-2.766 5.663-4.46a65.745 65.745 0 0 0 11.81-13.933c22.243 6.941 37.323 18.502 43.04 23.418 1.565 1.372 5.449 4.952 9.993 9.215 1.955-4.705 3.248-9.753 3.663-15.058.199-2.537-.912-4.982-2.84-6.641z"  fill="#e6af78" data-original="#e6af78"></path><path d="M5.034 369.859C1.853 374.081 0 379.26 0 384.745v48.802a8.258 8.258 0 0 0 8.258 8.258h24.774v-41.61c0-5.017-2.281-9.763-6.199-12.897L5.034 369.859z"  fill="#c7cfe2" data-original="#c7cfe2" class=""></path><path d="m374.643 351.318-69.095-25.126L256 342.709l-49.548-16.516-69.095 25.126a33.032 33.032 0 0 0-21.744 31.043v51.186a8.258 8.258 0 0 0 8.258 8.258h264.258a8.258 8.258 0 0 0 8.258-8.258v-51.186a33.031 33.031 0 0 0-21.744-31.044z"  fill="#332561" data-original="#ff507d" class="" opacity="1"></path><path d="m247.349 359.226-7.865 82.579h33.032l-7.865-82.579z"  fill="#707487" data-original="#707487" class=""></path><path d="M264.67 370.571h-17.34a5.78 5.78 0 0 1-5.781-5.781v-22.081h28.901v22.081a5.78 5.78 0 0 1-5.78 5.781z"  fill="#5b5d6e" data-original="#5b5d6e" class=""></path><path d="M387.498 359.855c5.576 5.985 8.889 13.956 8.889 22.506v51.186a8.258 8.258 0 0 1-8.258 8.258h-41.29v-27.608c0-8.761 3.48-17.163 9.675-23.357l30.984-30.985z"  fill="#812a2a" data-original="#d23c69" class="" opacity="1"></path><path d="M346.839 155.889v-69.18c0-9.122-7.395-16.516-16.516-16.516h-99.097c-36.486 0-66.065 29.578-66.065 66.065v19.631a82.572 82.572 0 0 0 4.238 26.114l2.749 8.247a24.772 24.772 0 0 1 1.271 7.834v4.238H338.58v-4.238c0-2.663.429-5.308 1.271-7.834l2.749-8.247a82.553 82.553 0 0 0 4.239-26.114z"  fill="#5a4146" data-original="#5a4146"></path><path d="M206.452 103.741c0 18.528 15.02 33.548 33.548 33.548h4.645l2.242 65.032h91.693v-4.238c0-2.663.429-5.308 1.271-7.834l2.749-8.247a82.572 82.572 0 0 0 4.238-26.114V86.709c0-9.122-7.395-16.516-16.516-16.516H240c-18.528 0-33.548 15.02-33.548 33.548z"  fill="#694b4b" data-original="#694b4b"></path><path d="M206.45 268.39h99.1v74.32h-99.1z"  fill="#e6af78" data-original="#e6af78"></path><path d="M206.452 296.31c14.588 8.451 31.477 13.366 49.548 13.366s34.961-4.915 49.548-13.366v-27.924h-99.097l.001 27.924z"  fill="#d29b6e" data-original="#d29b6e" class=""></path><path d="m256 342.709-26.338 26.338c-3.54 3.54-9.391 3.141-12.417-.847l-27.309-35.984 7.143-15.053c2.108-4.442 7.606-6.07 11.792-3.49L256 342.709zM256 342.709l26.338 26.338c3.54 3.54 9.391 3.141 12.417-.847l27.309-35.984-7.143-15.053c-2.108-4.442-7.606-6.07-11.792-3.49L256 342.709z"  fill="#812a2a" data-original="#d23c69" class="" opacity="1"></path><path d="M256 293.161c-45.608 0-82.581-36.973-82.581-82.581v-9.675c0-4.38 1.74-8.581 4.837-11.679l6.841-6.841a16.516 16.516 0 0 0 4.837-11.679V150.91c0-3.824 2.568-7.146 6.289-8.025 19.531-4.613 80.308-15.54 121.669 14.88 2.686 1.975 4.171 5.22 4.171 8.554v4.387c0 4.38 1.74 8.581 4.837 11.679l6.841 6.841a16.516 16.516 0 0 1 4.837 11.679v9.675c.003 45.608-36.97 82.581-82.578 82.581z"  fill="#f0c087" data-original="#f0c087"></path><path d="M317.893 157.766c-29.09-21.395-67.731-22.321-94.925-19.392-11.471 1.235-20.949 3.144-26.743 4.512-3.721.879-6.289 4.201-6.289 8.025v19.795c0 4.381-1.74 8.582-4.838 11.68l-6.841 6.841a16.517 16.517 0 0 0-4.838 11.68v9.674c0 42.224 31.71 76.985 72.602 81.92-14.249-14.839-23.054-34.948-23.054-57.146v-60.361c0-8.369 6.223-15.363 14.526-16.404 19.818-2.485 56.116-3.979 84.57 12.118v-4.388c.002-3.334-1.486-6.58-4.17-8.554z"  fill="#e6af78" data-original="#e6af78"></path><path d="M124.502 359.855c-5.576 5.985-8.889 13.956-8.889 22.506v51.186a8.258 8.258 0 0 0 8.258 8.258h41.29v-27.608c0-8.761-3.48-17.163-9.675-23.357l-30.984-30.985z"  fill="#812a2a" data-original="#d23c69" class="" opacity="1"></path></g></svg>
                                        <p class="text-white">Utilisateurs</p>                                    
                                    </a>
                                </div>
                                <div class="col-md-5 text-center rounded-3 m-2 align-content-center d-flow py-3 bg-info">
                                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="/corbeille">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M346 90c-8.291 0-15-6.709-15-15V45c0-8.276-6.724-15-15-15H196c-8.276 0-15 6.724-15 15v30c0 8.291-6.709 15-15 15s-15-6.709-15-15V45c0-24.814 20.186-45 45-45h120c24.814 0 45 20.186 45 45v30c0 8.291-6.709 15-15 15z"  fill="#5c5f66" data-original="#5c5f66"></path><path d="M316 0h-60v30h60c8.276 0 15 6.724 15 15v30c0 8.291 6.709 15 15 15s15-6.709 15-15V45c0-24.814-20.186-45-45-45z"  fill="#53565c" data-original="#53565c"></path><path d="M378.402 512H133.598c-23.218 0-42.92-18.135-44.824-41.265l-27.715-334.49a15.005 15.005 0 0 1 3.896-11.396A15.017 15.017 0 0 1 76 120h360c4.189 0 8.203 1.758 11.045 4.849a15.006 15.006 0 0 1 3.896 11.396l-27.715 334.49C421.322 493.865 401.62 512 378.402 512z"  fill="#c4cad9" data-original="#c4cad9" class=""></path><path d="M436 120H256v392h122.402c23.218 0 42.92-18.135 44.824-41.265l27.715-334.49a15.005 15.005 0 0 0-3.896-11.396A15.017 15.017 0 0 0 436 120z"  fill="#b8bfcc" data-original="#b8bfcc"></path><path d="m166.029 437.938-15-242c-.513-8.276 5.771-15.396 14.033-15.908 8.569-.601 15.381 5.757 15.908 14.033l15 242c.513 8.276-5.771 15.396-14.033 15.908-8.852.402-15.415-6.159-15.908-14.033zM256 452c-8.291 0-15-6.709-15-15V195c0-8.291 6.709-15 15-15s15 6.709 15 15v242c0 8.291-6.709 15-15 15z"  fill="#a1a7b3" data-original="#a1a7b3"></path><path d="M330.063 451.971c-8.262-.513-14.546-7.632-14.033-15.908l15-242c.513-8.276 7.764-14.297 15.908-14.033 8.262.513 14.546 7.632 14.033 15.908l-15 242c-.493 7.874-7.056 14.435-15.908 14.033zM271 437V195c0-8.291-6.709-15-15-15v272c8.291 0 15-6.709 15-15z"  fill="#979ca7" data-original="#979ca7" class=""></path><path d="M436 150H76c-24.814 0-45-20.186-45-45s20.186-45 45-45h360c24.814 0 45 20.186 45 45s-20.186 45-45 45z"  fill="#7f838c" data-original="#7f838c" class=""></path><path d="M436 60H256v90h180c24.814 0 45-20.186 45-45s-20.186-45-45-45z"  fill="#757982" data-original="#757982"></path></g></svg>
                                        <p class="text-white mt-2">Corbeille</p>                                    
                                    </a>
                                </div>
                                <div class="col-md-10 text-center rounded-3 m-2 align-content-center d-flow py-3 bg-archiveshow">
                                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="/archiveshow">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50"  viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#47568c" d="m91 270-35.625 30L0 270l61-90 30 30zm0 0" opacity="1" data-original="#47568c"></path><path fill="#2c3b73" d="m421 270 35.625 30L512 270l-61-90-30 30zm0 0" opacity="1" data-original="#2c3b73" class=""></path><path fill="#ffda2d" d="M391 0v165H121V30h126.898L256 18l12-18zm0 0" opacity="1" data-original="#ffda2d" class=""></path><path fill="#fdbf00" d="M391 0v165H256V18l12-18zm0 0" opacity="1" data-original="#fdbf00" class=""></path><path fill="#fdbf00" d="M421 60v165H91V90h186.898L298 60zm0 0" opacity="1" data-original="#fdbf00" class=""></path><path fill="#ff9100" d="M421 60v165H256V90h21.898L298 60zm0 0" opacity="1" data-original="#ff9100" class=""></path><path fill="#ffda2d" d="M451 120v225H61V150h246.898L328 120zm0 0" opacity="1" data-original="#ffda2d" class=""></path><path fill="#fdbf00" d="M451 120v225H256V150h51.898L328 120zm0 0" opacity="1" data-original="#fdbf00" class=""></path><path fill="#61729b" d="M512 270v242H0V270h196.902l9.899 30h98.398l9.899-30zm0 0" opacity="1" data-original="#61729b" class=""></path><path fill="#47568c" d="M512 270v242H256V300h49.2l9.898-30zm0 0" opacity="1" data-original="#47568c"></path><path fill="#ffda2d" d="M181 360h150v30H181zm0 0" opacity="1" data-original="#ffda2d" class=""></path><path fill="#fdbf00" d="M256 360h75v30h-75zm0 0" opacity="1" data-original="#fdbf00" class=""></path></g></svg>
                                        <p class="text-white mt-2">Afficher Les Archives</p>                                    
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </section>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('myChart');

                month = [];
                filecount = [];
                foldercount = [];

                @foreach ($dataByMonth as $static)
                    month.push("{{ addslashes($static->month) }}");
                    filecount.push("{{ addslashes($static->files) }}");
                    foldercount.push("{{ addslashes($static->folders) }}");
                @endforeach




                new Chart(ctx, {
                    type: 'line',
                    data: {
                    labels: month,

                    datasets: [{
                        label: 'Dossier',
                        data: foldercount,
                        borderWidth: 1
                    },
                    {
                        label: 'Ficher',
                        data: filecount,
                        borderWidth: 1
                    }]
                    
                    },
                    options: {
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                    }
                });

            </script>
@endsection
