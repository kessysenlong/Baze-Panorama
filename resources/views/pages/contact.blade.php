
@extends('layouts.app')
@section('content')

<div  class="container">
            {{-- <div class="alert alert-info">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Info:</strong> Contact form is inactive at this time.
                      </div> --}}

      <div class="card" style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius:15px">
            <div class="card-header"><h3>Get in touch</h3></div>
            <div class="card-body">
            <div class="row" style="margin-bottom:20px;text-align:center">
            <div class="col-sm">
                  <img src="/storage/cover_images/service_telephone.png" alt="telephone">
                  <p>Tel: 1234567</p>
                  <p>Mobile: +234 123 456 7890</p>
            </div>

            <div class="col-sm">
                  <img src="/storage/cover_images/address.png" alt="email">
                  <p>For Publications: dssd@bazeuniversity.edu.ng</p>
                  <p>General inquiries: inquiries@bazeuniversity.edu.ng</p>     
            </div>

            <div class="col-sm">
                  <img src="/storage/cover_images/conversation.png" alt="social media">
                  <p>Facebook: Baze Publications</p>
                  <p>Twitter:  @Bazepublications</p>
            </div>

            </div>

            <div style="margin-bottom:5px; text-align:center">
                  <img src="/storage/cover_images/location.png" alt="address">
                  <p><strong>You can find us at:</strong></p>
                  
            </div>
            
            <div class="row">
                  <div class="col-sm" style="text-align:center">
                        
                        <p>Room F67</p>
                        <p>Dr. Jamila Shuara</p>
                        <p>Director, Strategy & Special Duties</p>
                        <p>Open hours: 9am - 4pm (Mon -Fri)</p>
                  </div>

                  <div class="col-sm" style="text-align:center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2944.7316543373067!2d7.403982929874135!3d9.00740493818412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e7372e355f317%3A0x7f90ec48624fd5b4!2sBaze+University!5e1!3m2!1sen!2sng!4v1534329173682" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
            </div>

            {{-- <div class="container" style="text-align:center; max-width:70%" >
                  <div class="col-sm">
            <div class="form-area">  
            <form role="form" method="POST" action= "{{ url ('contact')}}">
                  @csrf
                  <br style="clear:both">
                              <h3 style="margin-bottom: 25px; text-align: center;">Contact Form</h3>

                                      <div class="form-group">
                                              <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                        </div>

                                        <div class="form-group">
                                              <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                        </div>

                                        <div class="form-group">
                                              <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                        </div>
                              <div class="form-group">

                              <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="250" rows="7"></textarea>
                                                      
                              </div>
                      
                  <button type="submit" id="submit" name="submit" class="btn btn-primary">Send Email</button>
                  </form>
              </div>
                  </div>
            </div> --}}
            

            </div>
      </div>
      
      

</div>
@endsection