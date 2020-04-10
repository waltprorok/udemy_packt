@extends('template')

@section('content')

    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-8 col-md-offset-2">
                <h1>Contact Us</h1>

                <form action="{{ route('contact') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" name="message" rows="8"></textarea>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Send Email"/>

                </form>
            </div>
        </div>
    </div>

@endsection
