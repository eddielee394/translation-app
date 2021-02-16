<form id="contactForm" action="{{route('contact.send')}}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="form-group">
            <div class="col-md-6">
                <label>Your name *</label>
                <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
            </div>
            <div class="col-md-6">
                <label>Your email address *</label>
                <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-md-12">
                <label>Subject</label>
                <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-md-12">
                <label>Message *</label>
                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required></textarea>
            </div>
        </div>
    </div>
    <div class="row">
         <div class="col-md-12">
            <input type="submit" value="Send Message" class="btn btn-primary btn-lg mb-xlg g-recaptcha" data-sitekey="6LeIMiEUAAAAAKPoecUCozQKAKW1e39_rCyxBC2l" data-callback="onSubmit" data-loading-text="Loading...">
        </div>
        <div class="col-md-12">
            {{--{!! app('captcha')->render(); !!}--}}
        </div>
    </div>
</form>