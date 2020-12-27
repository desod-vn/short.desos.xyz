$(() => {
	$('#link-hide').hide();
	$('#link-more').on('click', () => {
		$('#link-hide').slideToggle(500);
	})



	
	const alertInfo = () => {
		let alertInfo = `<div id="link-alert" class="color-pale-red mar-tb-5 pad-15 panel-round-l size-text-20">
					<span class="color-text-red">*</span> Xin lỗi, bạn vui lòng nhập url hợp lệ !</div>`;
		$('#link-alert').remove();
		$('#link-form').before(alertInfo);
		$('#link-press').attr('type', 'button');
	};


	
	$('#link-press').on('mousedown', () => {
		let missWhat = 0;
		let link = $('#link-in').val();
		let number = $('#link-in').val().length;

		if((link[number - 1] == ' ') || (link[number - 1] == '.') || (link[0] == ' ') || (link[0] == '.'))
			missWhat = 0;
		for(let i = 0; i < number; i++){
			if(link[i] == ' '){
				missWhat = 0;
				break;
			}
			if(link[i] == '.')
				missWhat = 1;
		}
		
		if(link == '')
			alertInfo();
		else if(number <= 4)
			alertInfo();
		else if(missWhat == 0)
			alertInfo();
		else
			$('#link-press').attr('type', 'submit');
	});
	copyLink = () => {
		const copyText = document.getElementById("link-out");
	  
		
		copyText.select();
		copyText.setSelectionRange(0, 99999);
	  
		document.execCommand("copy");
		
	  }
})