<link href="{{ asset('css/dashboardtab.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('content')


<div class="card-header" style="text-align:center; font-size:20px; border-radius: 15px 15px 0 0; background:white; border:1px solid #ccc">Welcome to your dashboard, {{ Auth::user()->name }}</div>
<div style="margin-bottom:10px; height:90%">
    {{-- tab links --}}
<div class="tab" style="height:100%">
  <button class="tablinks" onclick="openCity(event, 'posts')" id="defaultOpen" style="font-size:20px"><i class="fas fa-newspaper"></i>  Your Posts</button>
  <button class="tablinks" onclick="openCity(event, 'notifications')" style="font-size:20px"><i class="fas fa-envelope"></i>   Notifications</button>
  <button class="tablinks" onclick="openCity(event, 'access')" style="font-size:20px"><i class="fas fa-fingerprint"></i>   Access Management</button>
</div>

<div id="posts" class="tabcontent">
  {{-- posts dash --}}
  <div class="card" style="width:100%">
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <a href="/posts/create" class="btn btn-dark float-right" style="margin-bottom:5px">Create a new post</a>     
        <br>
            @if(count ($posts) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Created on</th>
                        <th></th>
                        <th></th>
                        @if(auth()->user()->email != 'dssd@bazeuniversity.edu.ng')

                        @foreach($posts as $post)
                        <tr>
                        <td>{{$post->title}}</td>
                        <td>{{Date('d M, Y', strtotime($post->created_at))}}</td>
                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-dark float right">Edit</td>
                        <td style="text-align:center">
                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </td>
                        </tr>
                    @endforeach

                    @else
                            @foreach($postadmin as $post)
                            <tr>
                            <td>{{$post->title}}</td>
                            <td>{{Date('d M, Y', strtotime($post->created_at))}}</td>
                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-dark float right">Edit</td>
                            <td style="text-align:center">
                                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                            </tr>
                        @endforeach

                    @endif

                </table>
               
                {{-- {{$posts->links()}} --}}
                @else
                <p>You have no posts</p>
            @endif
        </div>
    </div>
</div>

{{-- notification dash --}}
<div id="notifications" class="tabcontent" style="padding-left:10px; padding-right:10px;padding-top:5px">
  <p>You have no new notifications</p>
  <hr> 
  <div class="container">
      <div class="row">
          <div class="col-sm mr-sm-3">
              <div class="card">
                <div class="card-header"> Registered Users: {{$usercount}}</div>
                    <div class="card-body">
                    
                       
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td><strong>Users</strong></td>
                                    <td><strong>Email</strong></td>
                                    @if(auth()->user()->email == 'dssd@bazeuniversity.edu.ng')
                                    <td><strong>Delete User</strong></td>
                                    @endif
                                    
                                </tr>
                             </thead>

                                @foreach($userlist as $users)
                            <tr>
                            <td>{{$users->name}}</td>
                            <td>{{$users->email}}</td>

                            @if(auth()->user()->email == 'dssd@bazeuniversity.edu.ng')
                            <td style="text-align:center">
                                {!!Form::open(['action' => ['DashboardController@destroy', $users->id], 'method' => 'POST','style' => 'text-align:center'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger',])}}
                                {!!Form::close()!!}
                            </td>
                            @endif
                            
                            
                            </tr>
                            @endforeach
                        </table>

                        {{-- message modal --}}
                        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New message to {{$users->name}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Recipient:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                          <label for="message-text" class="col-form-label">Message:</label>
                                          <textarea class="form-control" id="message-text"></textarea>
                                        </div>
                                      </form>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Send message</button>
                                    </div>
                                  </div>
                                </div>
                            </div> --}}
                        {{-- end of modal --}}
                    </div>
                </div>
            </div>
      </div>
  </div>
</div>

{{-- access dash --}}
<div id="access" class="tabcontent" style="padding-left:10px; padding-right:10px;padding-top:5px">
  <h3>Reset Password</h3>
  <p>Coming soon. Use the <strong>"forgot password"</strong> option on the log in page to change passwords.</p>
  <br>
  <hr>
    {{-- admin control for new user registration --}}
    @if(Auth::user()->email == 'dssd@bazeuniversity.edu.ng')
        <h3>New user registration</h3>
        <p>You can enable and disable the link for new user registration here.</p>

        <a onclick="enableBtn()" class="btn btn-primary">Enable Registration</a>
        <a onclick="disableBtn()" class="btn btn-Info">Disable Registration</a>

    @endif
</div>

{{-- scripts --}}
<script src="{{ asset('js/dashboardtab.js') }}"></script>
<script src="{{ asset('js/dashmodal.js') }}"></script>
<script>
        function disableBtn() {
            document.getElementById("regBtn").hidden = true;
        }
        
        function enableBtn() {
            document.getElementById("regBtn").hidden = false;
        }
        </script>

</div>
@endsection
