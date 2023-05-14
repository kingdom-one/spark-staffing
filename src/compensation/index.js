import '../../scss/pages/compensation-survey.scss';

new ( class CompensationSurvey {
	userName = '';
	email = '';
	ministryName = '';
	ministrySize = '';
	participate = 'Yes';
	contribute = true;
	price = '';
	constructor() {
		console.log( 'hello from compensation.js' );
		this.getFormFields();
		this.handlePricingOutput();
	}
	getFormFields() {
		this.name = document.querySelector( '#name' );
		this.email = document.querySelector( '#email' );
		this.ministryName = document.querySelector( '#ministry-name' );
		this.ministrySize = document.querySelector(
			'input[name="ministry-size"]:checked'
		);
		this.participate = document.querySelector(
			'input[name="participant"]:checked'
		);
		this.contribute = document.querySelector( '#contributor' );
	}
	handlePricingOutput() {
		this.ministryName.addEventListener( 'change', ( { target } ) => {
			document.getElementById(
				'pricing-ministry-name'
			).innerHTML = ` for ${ target.value }`;
		} );
		document.getElementById( 'product-price' ).innerHTML = this.price;
	}
	setPrice() {
		const state = {
			Name: '',
			email: '',
			ministryName: '',
			ministrySize: '',
			participant: '',
			contributor: true,
		};
		document
			.querySelector( '.survey__form' )
			.addEventListener( 'change', ( { target } ) => {
				switch ( target.name ) {
					case 'ministry-name':
						state.ministryName = target.value;
						break;
					case 'ministry-size':
						state.ministrySize = target.value;
						break;
					case 'contributor':
						state.contributor = target.checked;
						break;
					default:
						state[ target.name ] = target.value;
				}
				const required = [
					state.Name,
					state.email,
					state.ministryName,
				];
				if ( required.some( ( val ) => val == false ) ) {
					return null;
				} else {
					this.price = this.calcPrice( state );
				}
			} );
	}
	calcPrice( { contributor, participant, ministrySize } ) {
		console.log( contributor, participant, ministrySize );
		if ( contributor ) {
			return 'free!';
		} else {
			if ( participant.length == 0 && ministrySize.length == 0 ) {
			} else if (
				participant === 'Participant' &&
				ministrySize == 'Small/Medium'
			) {
				return '$600';
			} else if (
				participant === 'Non-Participant' &&
				ministrySize == 'Small/Medium'
			) {
				return '$1200';
			} else if (
				participant === 'Participant' &&
				ministrySize == 'Large'
			) {
				return '$800';
			} else if (
				participant === 'Non-Participant' &&
				ministrySize == 'Large'
			) {
				return '$1600';
			} else if (
				participant === 'Participant' &&
				ministrySize == 'Mega/Multi'
			) {
				return '$1250';
			} else if (
				participant === 'Non-Participant' &&
				ministrySize == 'Mega/Multi'
			) {
				return '$2500';
			} else {
				return null;
			}
		}
	}
} )();
