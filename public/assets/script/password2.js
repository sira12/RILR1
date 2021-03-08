//FUNCION MOSTRAR CARCATERES DE PASSWORD
document.querySelector('.campo span').addEventListener('click', e => {
    const passwordInput = document.querySelector('#password');
    if (e.target.classList.contains('show')) {
        e.target.classList.remove('show');
        e.target.textContent = 'Ocultar';
        //e.target.toggleClass = '<i class="mdi mdi-eye"></i>';
        passwordInput.type = 'text';
    } else {
        e.target.classList.add('show');
        e.target.textContent = 'Mostrar';
        //e.target.toggleClass = '<i class="mdi mdi-eye-off"></i>';
        passwordInput.type = 'password';
    }
});

document.querySelector('.campo2 span').addEventListener('click', e => {
    const passwordInput = document.querySelector('#password2');
    if (e.target.classList.contains('show')) {
        e.target.classList.remove('show');
        e.target.textContent = 'Ocultar';
        //e.target.toggleClass = '<i class="mdi mdi-eye"></i>';
        passwordInput.type = 'text';
    } else {
        e.target.classList.add('show');
        e.target.textContent = 'Mostrar';
        //e.target.toggleClass = '<i class="mdi mdi-eye-off"></i>';
        passwordInput.type = 'password';
    }
});

/*//FUNCION MOSTRAR CARACTERES EN INPUT TYPE PASSWORD
$('#password').on("mousedown",function(event) {
	$(this).attr("type","text");
});

$('#password').on("mouseup",function(event) {
	$('#password').attr("type","password");
});

$('#password2').on("mousedown",function(event) {
	$(this).attr("type","text");
});

$('#password2').on("mouseup",function(event) {
	$('#password2').attr("type","password");
});


$('.toggle-password').click(function(){
    $(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
    let input = $(this).prev();
    input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
});*/