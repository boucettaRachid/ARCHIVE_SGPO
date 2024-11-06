@extends('layouts.header')

@section('content')
    <section>
            <div class="container">
                    <div class="row justify-content-center align-items-center g-2">
                       <div class="col mx-3">
                            <div class="col-md-12 my-4">
                              <a class="btn btn-primary" href="/AddUser"> + Ajouter un nouvel utilisateur</a>
                            </div>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nom de utilisateur</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Le Post de utilisateur</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">settings</th>
                                  </tr>
                                </thead>
                                <tbody>

                                @foreach ($users as $user)
                                  <tr>
                                    <th id="id{{ $user->id }}" scope="row">{{ $user->id }}</th>
                                    <td id="name{{ $user->id }}">{{ $user->name }}</td>
                                    <td id="email{{ $user->id }}">{{ $user->email }}</td>
                                    <td id="Post{{ $user->id }}">{{ $user->Post }}</td>
                                    <td id="Role{{ $user->id }}">{{ $user->Role }}</td>
                                    <td>
                                        <button type="button" onclick="showprofile({{ $user->id }})" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class="btn btn-primary mx-1"> Afficher</button>
                                        <a href='{{ route("deleteuser", ["userid" => $user->id]) }}' style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class="btn btn-danger mx-1"> Supprimer</a>
                                    </td>
                                  </tr>
                                  @endforeach

                                  
                                </tbody>
                              </table>
                       </div>
                       <div class="col-md-3 rounded-2 bg-light text-center p-3 justify-content-center align-items-center d-grid">
                            <img src="{{ asset('images/user.png') }}" class="rounded-circle shadow" width="200" alt="user">
                            <p id="idtemp" class="lead my-1"># 2196f3R-7UT4</p>
                            <p class="text-dark"><b class="h4"><span id="usertemp" >UserName</span></b><span id="12role" class="badge text-bg-secondary mx-3">Admin</span></p>
                       </div>
                    </div>
                </div>

@if(session('success'))

      <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <img src="{{ asset('images/success.png') }}" width="30" class="rounded me-2" alt="danger">
            <strong class="me-auto">User Delete</strong>
            <small>successfully</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-success text-light">
              user delete successfully.
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

    <script>

      showprofile(1)

      function showprofile(e){
        var id = document.getElementById("id"+e).innerText;
        var name = document.getElementById("name"+e).innerText;
        var email = document.getElementById("email"+e).innerText;
        var Post = document.getElementById("Post"+e).innerText;
        var Role = document.getElementById("Role"+e).innerText;

        document.getElementById("idtemp").innerText = "#"+Date.now()+id;
        document.getElementById("12role").innerText = Role;
        document.getElementById("usertemp").innerText = name;
      }
    </script>


@endsection