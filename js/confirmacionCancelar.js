function confirmacion(e){
 if (confirm("¿Esta seguro que desea cancelar su reserva?")) {
    return true;
 } else {
     e.preventDefault();
 }
}
let linkDelete = document.querySelectorAll(".table-item-link");
for(var i = 0; i<linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmacion);
}