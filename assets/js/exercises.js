// window.addEventListener("load", function () {

//     // icono para mostrar contraseña
//     showPassword = document.querySelector('.show-password');
//     showPassword.addEventListener('click', () => {

//         // elementos input de tipo clave
//         password1 = document.querySelector('.password1');

//         if (password1.type === "text") {
//             password1.type = "password"
//             showPassword.classList.remove('fa-eye-slash');
//         } else {
//             password1.type = "text"
//             showPassword.classList.toggle("fa-eye-slash");
//         }

//     })

// });

// $(document).ready(function(){
//     var idCheck = document.getElementById(idCheck)
//     var id = document.getElementById(idInput)
//     if (idCheck.id==false) {
//         id.style.backgroundColor = red;
//     }
// });


window.addEventListener("load", function () {
    var testElements = document.getElementsByClassName('check');
    var testDivs = Array.prototype.filter.call(testElements, function(testElement){
        console.log( testElement.nodeName === 'button')
    });

})