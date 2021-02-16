<!-- Vendor -->
<script src="{{ URL::to('assets/frontEnd/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::to('assets/frontEnd/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
<script src="{{ URL::to('assets/frontEnd/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ URL::to('assets/frontEnd/vendor/jquery-cookie/jquery-cookie.min.js') }}"></script>
<script src="{{ URL::to('assets/frontEnd/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('assets/frontEnd/vendor/common/common.min.js') }}"></script>

<script src="{{ URL::to('assets/frontEnd/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="/assets/frontEnd/vendor/jquery-validation/additional-methods.min.js"></script>
<script>
$.validator.messages.required = "{{$UniversalTranslationHelper->translateText('quote.form.field.required')}}";

$.validator.addMethod( "require_from_group", function( value, element, options ) {
    
	var $fields = $( options[ 1 ], element.form ),
		$fieldsFirst = $fields.eq( 0 ),
		validator = $fieldsFirst.data( "valid_req_grp" ) ? $fieldsFirst.data( "valid_req_grp" ) : $.extend( {}, this ),
		isValid = $fields.filter( function() {
			return validator.elementValue( this );
		} ).length >= options[ 0 ];

	// Store the cloned validator for future validation
	$fieldsFirst.data( "valid_req_grp", validator );

	// If element isn't being validated, run each require_from_group field's validation rules
	if ( !$( element ).data( "being_validated" ) ) {
		$fields.data( "being_validated", true );
		$fields.each( function() {
			validator.element( this );
		} );
		$fields.data( "being_validated", false );
	}
	return isValid;
}, $.validator.format( "{{$UniversalTranslationHelper->translateText('quote.form.field.at_least_one')}}" ) );


//console.log($.validator.messages);

</script>
<script src="{{ URL::to('assets/frontEnd/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
<script src="{{ URL::to('assets/frontEnd/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
<script src="{{ URL::to('assets/frontEnd/vendor/vide/vide.min.js') }}"></script>
<script src="{{ URL::to('assets/frontEnd/vendor/jquery.cookiebar/jquery.cookiebar.min.js') }}"></script>
<script src="{{ URL::to('assets/frontEnd/vendor/sticky-kit/sticky-kit.js') }}"></script>


<!-- Theme Base, Components and Settings -->
<script src="{{ URL::to('assets/frontEnd/js/theme.js') }}"></script>

<!-- Current Page Vendor and Views -->
@stack('scripts')


<!-- Theme Custom -->
<script src="{{ URL::to('assets/frontEnd/js/custom.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ URL::to('assets/frontEnd/js/theme.init.js') }}"></script>
