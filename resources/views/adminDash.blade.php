<link href="{{ asset('css/dashboardtab.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')


<div class="card-header" style="text-align:center; font-size:20px; border-radius: 15px 15px 0 0; background:white; border:1px solid #ccc">Welcome to your dashboard, {{ Auth::user()->name }}</div>
    <div style="margin-bottom:10px; height:90%">
    {{-- tab links --}}
    <div class="tab" style="height:100%">
    <button class="tablinks" onclick="openCity(event, 'dash')" style="font-size:20px"><i class="fas fa-tachometer-alt"></i>   Dashboard</button>
    <button class="tablinks" onclick="openCity(event, 'posts')" id="defaultOpen" style="font-size:20px"><i class="fas fa-newspaper"></i>  Your Posts</button>
    <button class="tablinks" onclick="openCity(event, 'inbox')" style="font-size:20px"><i class="fas fa-inbox"></i>   Inbox</button>
    <button class="tablinks" onclick="openCity(event, 'sent')" style="font-size:20px"><i class="fas fa-paper-plane"></i>   Sent</button>
    <button class="tablinks" onclick="openCity(event, 'contact')" style="font-size:20px"><i class="fas fa-address-book"></i>   Contact List</button>
    <button class="tablinks" onclick="openCity(event, 'account')" style="font-size:20px"><i class="fas fa-user-circle"></i>   My Account</button>
    </div>

    {{-- dashboard tab --}}
    <div id="dash" class="tabcontent">

    </div>

    {{-- posts tab --}}
    <div id="posts" class="tabcontent">
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

{{-- inbox tab --}}
    <div id="inbox" class="tabcontent" style="padding-left:10px; padding-right:10px;padding-top:5px">
    
    @if(count ($inbox) > 0)
        
            @foreach($inbox as $msg)
            <div class="col-sm-md">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$msg->id}}" aria-expanded="false" aria-controls="collapseOne">
                        <div class="row" style="width:100%">
                            <div class="col-sm-3 float-left">
                                From: {{$msg->from}}
                            </div>

                            <div class="col-sm-6 float-left">
                                <h4>{{$msg->subject}}</h4>
                            </div>

                            <div class="col-sm-3 float-right">
                                    <small>Sent at:</small> {{Date('d M, Y', strtotime($msg->created_at))}}
                            </div>
                        </div>
                        </button>
                        </h5>
                    </div>
            
                    <div id="{{$msg->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            {{$msg->message}}
                        </div>

                        <div class="card-footer">
                            {!!Form::open(['action' => ['DashboardController@destroy', $msg->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}

                            <button type="submit" class="btn btn-secondary">Reply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
    @else
        <h3>You have no messages</h3>
        
    @endif

    <br>

    </div>

{{-- Sent/Outbox tab --}}
    <div id="sent" class="tabcontent">

        </div>

{{-- contact list tab --}}
<div id="contact" class="tabcontent">
  <div class="container" style="padding-top:5px">
        
                          <table class="table table-striped">
                              <thead>
                                  <tr>
                                      <td><strong>Users</strong></td>
                                      <td><strong>Email</strong></td>
                                      <td></td>
                                      @if(auth()->user()->email == 'dssd@bazeuniversity.edu.ng')
                                      <td><strong>Delete User</strong></td>
                                      @endif
                                      
                                  </tr>
                               </thead>
  
                            @foreach($userlist as $users)
                              <tr>
                              <td>{{$users->name}}</td>
                              <td>{{$users->email}}</td>
                              <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$users->id}}">
                                          Leave a message
                                  </button>
  
                                  <!-- MODAL -->
                                  <div class="modal fade" id="{{$users->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                              <h5 class="modal-title">New Message to {{$users->name}}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                              </div>
                                              <div class="modal-body">
                                        
                                                {!! Form::open(['action' => 'DashboardController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    
                                                <div class="form-group">
                                                    {{Form::label('subject', 'Subject')}}
                                                    {{Form::text('subject', '', ['class' => 'form-control', 'placeholder' => 'Subject'])}}
                                                </div>
                                    
                                                <div class="form-group" hidden="true">
                                                    {{Form::label('from', 'From:')}}
                                                    {{Form::text('from', auth()->user()->id, ['class' => 'form-control'])}}
                                                </div>
                                    
                                                <div class="form-group" hidden="true">
                                                        {{Form::label('to', 'Recepient:')}}
                                                        {{Form::text('to', $users->id, ['class' => 'form-control'])}}
                                                    </div>
                                    
                                                <div class="form-group">
                                                    {{Form::label('message', 'Message')}}
                                                    <!--using id ckeditor to implement text editor in text area-->
                                                    {{Form::textarea('message', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Type your message'])}}
                                                </div>
                            
                                                <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Send</button>
                                                </div>
                            
                                                {!! Form::close() !!}
                            
                                                </div>
              
                                            </div>
                                        </div>
                                    </div>
                              </td>
  
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
                      </div>
                  
              </div>
        </div>
    </div>
</div>

{{-- account dash --}}
    <div id="account" class="tabcontent" style="padding-left:10px; padding-right:10px;padding-top:5px">
        <h2>Your Profile</h2>
            Name: {{auth()->user()->name}} <br>
            Joined: {{Date('d M, Y', strtotime(auth()->user()->created_at))}} <br>
            Role: - <br>
        <hr>

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
