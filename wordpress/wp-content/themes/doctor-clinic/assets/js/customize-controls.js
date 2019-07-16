( function( api ) {

	// Extends our custom "doctor-clinic" section.
	api.sectionConstructor['doctor-clinic'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );