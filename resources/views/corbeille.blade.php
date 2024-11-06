@extends('layouts.header')

@section('content')
<main>

<section>
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-md-8 bg-light">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Date delete</th>
                        <th scope="col">Folder</th>
                        <th scope="col">user deleted</th>
                        <th scope="col">settings</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($corbeille as $corbeillerow)
                      <tr>
                        <th scope="row">{{ $corbeillerow->id }}</th>
                        <td>{{ $corbeillerow->Title }}</td>
                        <td>{{ $corbeillerow->created_at }}</td>
                        <td>{{ $corbeillerow->folder }}</td>
                        <td>{{ $corbeillerow->username }}</td>
                        <td>
                            <a href='{{ route("Recovry", ["idfile" => $corbeillerow->id]) }}' style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class="btn btn-primary mx-1"> Recovry</a>
                            <a herf='{{ route("Deletefile", ["idfile" => $corbeillerow->id]) }}' type="button" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class="btn btn-danger mx-1"> Delete</button>
                        </td>
                      </tr>
                    @endforeach

                    </tbody>
                  </table>
            </div>
            <div class="col-4 bg-light">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>


    @if(session('success'))

<div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <img src="{{ asset('images/success.png') }}" width="30" class="rounded me-2" alt="danger">
            <strong class="me-auto">Recovry file</strong>
            <small>successfully</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-success text-light">
                Your folder is Recovryed successfully
            </div>
        </div>
    </div>

    <script>
            $(document).ready(function(){
                $('.toast').toast('show');
            });
    </script>

@endif

@if(session('error'))

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <img src="{{ asset('images/erorr.png') }}" width="30" class="rounded me-2" alt="danger">
            <strong class="me-auto">Recovry file</strong>
            <small>ERORR</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-danger text-light">
                This folder is not Recovryed
            </div>
        </div>
    </div>

    <script>
            $(document).ready(function(){
                $('.toast').toast('show');
            });
    </script>

@endif




</section>

</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        filecount = [];
        users = [];

        @foreach ($corbeille as $corbeillerow)
            filecount.push({{ $corbeillerow->usercount }});
            users.push('{{ $corbeillerow->username }}');
        @endforeach

        const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                labels: users,
                datasets: [{
                    label: 'Number file Deteled',
                    data: filecount,
                    borderWidth: 3
                }]
            }
        });
    </script>

@endsection