var tipo = 1;
var status = 1;
var precio = 70;
var iBox;
var tinyBox;

$(document).on('ready',function(){

	initList();

	$('.special-select').on('mouseleave',function(){

		$('.special-sbox ul').removeClass('over');

	})

	$('#logout').on('click',function(){

		location.href = './logout';

	})


	$('#uventa-form').on('submit',function(e){
		e.preventDefault();
		return false;
	})

	$('.cancelity').on('click',function(){
		location.reload();
	})

	iBox  = '<div class="special-ibox">';
	iBox += '<label class="special-label"></label>';
	iBox += '<input class="special-input" type="text" maxlength="4" />'
	iBox += '	</div>';

	tinyBox  = '<div class="special-ibox tinySpecial">';
	tinyBox += '<label class="special-label">Cambio</label>';
	tinyBox += '<div class="special-input"></div>'
	tinyBox += '	</div>';

	$(window).on('keypress',function(e){

		

		key = e.which;

		if(key==13)
		{

			e.preventDefault()

			switch(parseInt(status))
			{
				case 1:

					offList();

					var nBox = $(iBox);
					nBox.children('.special-label').text('Cantidad');
					nBox.children('.special-input').addClass('quantity');
					nBox.css('display','none');

					nBox.insertBefore($('.special-bbox'));

					nBox.fadeIn('slow');
					nBox.children('.special-input').focus();
				break;
				case 2:

				var boletos = $('.quantity').val();

				if(boletos <= 0 || (/\D/i).test(boletos))
				{
					alert('Cantidad de boletos no valida');
					return false;
				}

				if(parseInt(tipo) === 1)
					{
					var nBox = $(iBox);
					nBox.children('.special-label').text('Total');
					
					$('.quantity').attr('disabled','disabled');

					var totalBoletos = parseInt(boletos) * precio;
				
					nBox.children('.special-input').val(totalBoletos);
					nBox.children('.special-input').attr('disabled','disabled');

					nBox.css('display','none');

					nBox.insertBefore($('.special-bbox'));

					nBox.fadeIn('slow');
					nBox.children('.special-input').focus();
				}else
				{
					status = 5;
					return false;
				}

				break;
				case 3:
				
					var nBox = $(iBox);
					nBox.children('.special-label').text('Pago');

					nBox.children('.special-input').addClass('pay')
					nBox.css('display','none');

					nBox.insertBefore($('.special-bbox'));

					nBox.fadeIn('slow');
					nBox.children('.special-input').focus();
				
				break;
				case 4:
					
					var pagaCon = parseInt($('.pay').val());
					var totalBoletos = parseInt($('.quantity').val()) * precio;

					if(!(pagaCon >= totalBoletos))
					{
						alert('Cantidad menor al total');
						return false;
					}

					var nBox = $(tinyBox);
					nBox.children('.special-label').text('Cambio');


					$('.pay').attr('disabled','disabled');

					nBox.children('.special-input').text(pagaCon - totalBoletos);
					
					nBox.css('display','none');

					nBox.insertBefore($('.special-bbox'));

					nBox.fadeIn('fast');
				break;
				case 5:
					$('<button class="special-button fatality">Finalizar</button>').prependTo($('.special-bbox'));
				break;
				case 6:
					var cBoletos = $('.quantity').val();

					$.ajax({
						type: 'POST',
						url: './sold',
						data: {q:cBoletos,t:tipo},
						success: function(data){
							initList();
							console.log(data);
						}
					}).error(function(){
						initList()
					})
					
					$('.special-ibox').remove();
					$('.fatality').remove();
					status = 0;
				break;
				default:
					console.log(tipo+'Mierda!');
			}

			status++;
		}
	})

})


function initList()
{
	$('.special-selectbutton').on('click mouseover',function(){
		$('.special-sbox ul').addClass('over');
		addChangedIndexE();
	})
}

function offList()
{
	$('.special-selectbutton').off('click mouseover');
}

function addChangedIndexE () {
	$('.special-index').on('click',function(){

			var self = $(this);
			var clon = self.clone();
			
			tipo = parseInt(self.attr('data-value'));

			$(this).addClass('selectedIndex');
			
			(clon).prependTo('ul');

			$('.selectedIndex').remove();

			$('.special-index').off('click');

			addChangedIndexE();
	})
}