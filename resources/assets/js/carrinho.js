;(function () {
	'use strict';

	$(document).on('click', '[data-carrinho-quantidade]', function (e) {
		e.preventDefault();

		var $this        = $(this),
        	url          = $this.attr('href'),
        	quantidade   = $this.parent().find('[data-carrinho-quantidade-input]'),
        	produtoTotal = $this.parents('[data-carrinho-item]').find('[data-carrinho-produto-total]'),
        	pedidoTotal  = $('[data-carrinho-pedido-total]'),
        	tipo 		 = $this.attr('data-carrinho-quantidade')

    	$.getJSON(url, {
    		quantidade : quantidade.val(),
    		tipo 	   : tipo
    	}, function (response) {
    		quantidade.val(response.quantidade);
    		produtoTotal.text(response.produto_total);
    		pedidoTotal.text(response.pedido_total);
    	})
	});

}());