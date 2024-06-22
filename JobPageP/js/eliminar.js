const alerta = document.getElementById("alerta");


/*btns.forEach((btn,indice)=>{
    btn.addEventListener("click",()=>{            
        alerta.classList.toggle("hidden");
    });
});

eliminar.addEventListener("click",()=>{
    alerta.classList.toggle("hidden");
    window.location.href = "eliminar.php?id=" + trabajoId;
});*/

const mostrar = ()=>{
    
    alerta.classList.toggle("hidden");
}

const borrar = (id)=>{
    window.location.href = "eliminar.php?id=" + id;
}

const editar = (id)=>{
    window.location.href = "editar.php?id=" + id;
}
