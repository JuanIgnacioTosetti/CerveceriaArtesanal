var modal = document.getElementById('confirmarEliminar');
var btn = document.getElementById('eliminarBtn');

btn.onclick = function() {
    modal.style.display = 'block';
}

function cerrarModal() {
    modal.style.display = 'none';
}

function eliminarProducto() {
    // Redirigir a la página PHP para eliminar el producto
    window.location.href = 'eliminar.php';
}

function cancelarEliminar() {
    cerrarModal();
    // Puedes redirigir a otra página o realizar alguna otra acción si se cancela
}