<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="footer-ribbon">
				<span>{{$UniversalTranslationHelper->translateText('footer_get_in_touch')}}</span>
			</div>

			<div class="col-md-3">
				<div class="newsletter">
					<h4>{{$UniversalTranslationHelper->translateText('footer_newsletter')}}</h4>
					<p>{{$UniversalTranslationHelper->translateText('footer_newsletter_body')}}</p>

					<div class="alert alert-success hidden" id="newsletterSuccess">
						<strong>Success!</strong> You've been added to our email list.
					</div>

					<div class="alert alert-danger hidden" id="newsletterError"></div>

					<form id="newsletterForm" action="{{route('newsletter.subscribe')}}" method="POST">{{ csrf_field() }}
						<div class="input-group">
							<input class="form-control" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit">Go!</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<h4>{!! $UniversalTranslationHelper->translateText('footer_latest_tweets') !!}</h4>
				<div id="tweet" class="twitter" data-plugin-tweets data-plugin-options="{'username': 'PVtranslations', 'count': 2}">
					<p>Please wait...</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="contact-details">
					<h4>{{$UniversalTranslationHelper->translateText('footer_contact_us')}}</h4>
					<ul class="contact">
						<li><p><i class="fa fa-globe"></i>ParlezVous-Translations</p></li>
						<li><p><i class="fa fa-map-marker"></i> <strong>Address:</strong>91 Rue du Faubourg Saint-Honoré
								<br>75008 Paris | France</p></li>
						<li><p><i class="fa fa-phone"></i> <strong>Phone:</strong> +33 1 45 74 99 26</p></li>
						<li><p><i class="fa fa-envelope"></i> <a href="{{route('contact')}}"><strong>Email</strong> </a></p></li>
					</ul>
				</div>
			</div>
			<div class="col-md-2">
				<h4>{{$UniversalTranslationHelper->translateText('footer_follow_us')}}</h4>
				<ul class="social-icons">
					<li class="social-icons-facebook"><a href="{{ Voyager::setting('fb_url', 'Facebook') }}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li class="social-icons-twitter"><a href="{{ Voyager::setting('twtr_url', 'Twitter') }}" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
					<li class="social-icons-linkedin"><a href="{{ Voyager::setting('lnkd_url', 'LinkdIn') }}" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
		</div>
		@if(isset($ads))
			@foreach($ads as $ad)
				@if($ad->place == 'footer' && $ad->status == '1')
					<div class="container">
						<div class="row">
							<div class="footer_ad">
								<div class="ad">
									{!! $ad->code!!}
								</div>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		@endif

	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-1">
					<a href="/{{$current_locale}}" class="logo">
						<img alt="Parlez-Vous Translations" class="img-responsive" src="{{asset('/assets/frontEnd/img/logo-white.png')}}">
					</a>
				</div>
				<div class="col-md-7">
					<p>&copy; <?php echo date("Y"); ?> Copyright. All Rights Reserved.</p>
				</div>
				<div class="col-md-4">
					<nav id="sub-menu">
						<ul>
							{{--<li><a href="{{route('faq')}}">FAQ's</a></li>--}}
							{{--<li><a href="{{route('generic','privacy')}}">Privacy Policy</a></li>--}}
							{{--<li><a href="{{route('contact')}}">Contact</a></li>--}}
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</footer>