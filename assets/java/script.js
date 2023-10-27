function scroll(x, y){
	window.scrollTo(x, y);
}

//mostrar e ocutar divs, em array
function mostrar(ocu, chave){
    for (var i=0; i<ocu.length; i++){	
		if (i<chave){
			ocultar(ocu[i], 0);	
		}else{
			ocultar(ocu[i], 1);
		};
	};
};

//ocultar e mostra div
function ocultar(div, es){
	if(es==1){
		div.style.display = 'flex';
	}else{
		div.style.display = 'none';
	};
};

//redirecionar pagina
function redirect(page) {
    window.location.href = page;
}

//minha função favorita:
function adamCendler(btn){
	btn.click();
}

function PreViewImg(input, imgPreview){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(imgPreview).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}