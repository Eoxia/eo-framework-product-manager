window.eoxiaJS.myPlugin.product = {};

window.eoxiaJS.myPlugin.product.init = function() {};

window.eoxiaJS.myPlugin.product.createdProductSuccess = function(triggeredElement, response) {
	jQuery( '.wpeo-table tbody tr:last' ).before( response.data.view );
};

window.eoxiaJS.myPlugin.product.loadedEditModeSuccess = function(triggeredElement, response) {
	triggeredElement.closest( 'tr' ).replaceWith( response.data.view );
};
