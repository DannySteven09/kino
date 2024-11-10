// Selección de asientos
document.querySelectorAll('.asiento').forEach(asiento => {
    asiento.addEventListener('click', function() {
        // Solo permite seleccionar si el asiento no está ocupado
        if (!this.classList.contains('ocupado')) {
            this.classList.toggle('seleccionado');
        }
    });
});


document.getElementById('continuar').addEventListener('click', function() {
    const seleccionados = document.querySelectorAll('.asiento.seleccionado');
    
   
    if (seleccionados.length === 0) {
        alert("Por favor, selecciona al menos un asiento para continuar.");
        return;
    }

   
    let mensaje = 'Has seleccionado los siguientes asientos:\n';
    seleccionados.forEach(asiento => {
        const fila = asiento.dataset.fila || 'N/A';
        const numero = asiento.dataset.numero || 'N/A';
        mensaje += `Fila: ${fila}, Número: ${numero}\n`;
    });
    alert(mensaje);

  
    window.location.href = "../views/confirmacion_reserva.php";
});
