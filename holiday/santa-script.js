$(function () {
	$('.santa').click(function () {
		var supportsTouch = (typeof Touch == "object");

		if (supportsTouch && !$(this).hasClass('sack-description')) {
			$('.santa').removeClass('sack-description');
			$(this).addClass('sack-description');
		}
		else {
			$('#presents').modal('show');
			var santa = $(this).attr('id');
			$('#selected-santa').val(santa);
			$('.santa-sack img').detach();
			$('.santa-sack').append($('<img src="/holiday/img/sack_' + santa + '.png">'));

			var data = location.search.substr(1).split("&");
			var values = {};
			for (i = 0; i < data.length; i++) {
				var value = data[i].split('=');
				values[value[0]] = value[1];
			}

			var name = null;
			if (values.fname != undefined &&
				values.lname != undefined) {
				var name = values.fname + ' ' + values.lname;
			}
			$('#name').val(name);
			$('#email').val(values.email);

			$('.santa').removeClass('sack-description');
		}
	});

	// attaching handler to entire li so it can't be missed with the mouse
	$('.santa-grid li').hover(
		function () {
			$(this).find('.santa').addClass('santa-open');
		}, function () {
			$(this).find('.santa').removeClass('santa-open');
		});

	$.fn.sendToSanta = function () {
		$('#sack-form').submit();
		return this;
	}

	$('#sack-form').validate({
		debug: true,
		rules: {
			name: "required",
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			name: "Santa can't find you without your full name!",
			email: "Santa won't spam you, we swear."
		},
		submitHandler: function (form) {
			var data = {};
			data['name'] = $('#name').val();
			data['email'] = $('#email').val();
			data['santa'] = $('#selected-santa').val();

			$.ajax({
				url: '/holiday/submit.php',
				type: 'POST',
				dataType: 'JSON',
				data: data,
				success: function (data, status) {
					$('.santa-form').html(data.message);
//					$('#presents').modal('hide');
				},
				error: function (xhr, desc, err) {
					console.log('ERROR! ERROR! ERROR!');
				}
			});
		}
	});
});
