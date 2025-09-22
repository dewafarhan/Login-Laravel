@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Contact Us</div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" rows="5" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Our Location</div>
                <div class="card-body">
                    <div id="map" style="height: 400px;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6664463317338!2d106.82496361476882!3d-6.175392395527383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sMonumen%20Nasional!5e0!3m2!1sen!2sid!4v1647660089900!5m2!1sen!2sid"
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                    <div class="mt-3">
                        <h5>Address:</h5>
                        <p>Jl.Bintaro utama Perkantoran
                        Multiguna No.08 sektor 3A
                        Pondok Aren,<br>
                        Tanggerang Selatan, Indonesia<br>
                        Phone: (021) 123-4567<br>
                        Email: info@example.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
