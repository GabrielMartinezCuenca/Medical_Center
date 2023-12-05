function mostrarModal(id) {
    var modal = document.getElementById('modal' + id);
    modal.style.display = 'flex';
}

function cerrarModal(id) {
    var modal = document.getElementById('modal' + id);
    modal.style.display = 'none';
}

function eliminarConsultorio(id) {
    // Agrega aquí la lógica para eliminar el consultorio
    cerrarModal(id);
}