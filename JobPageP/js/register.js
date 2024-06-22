
const btns = document.querySelectorAll(".btn");
const datos = document.querySelectorAll(".itemRegister");
const mainCont = document.querySelector(".contRegister");
const inputs = document.querySelectorAll(".input");
const colores = ["#C183FF", "#FF9F83", "#9AFF83", "#9D83FF"];
const alerta = document.querySelectorAll(".alert");
var porcentaje = 0;


mainCont.style.background = "#83FFE3";


btns.forEach((btn, actual) => {

    btn.addEventListener("click", () => {


        if (inputs[actual].value.trim().length === 0) {
            
            alerta[actual].style.display = "block";

        } else {
            if (porcentaje < 300) {
                porcentaje += 100;
            }

            datos[actual].style.transform = "translateY(-" + porcentaje + "%)";
            datos[actual + 1].style.transform = "translateY(-" + porcentaje + "%)";
            mainCont.style.background = colores[actual];
        }

    });

});



