
document.getElementById('titulo-pelicula').innerText = "The Batman";
document.getElementById('asientos-seleccionados').innerText = "A1, A3, B2";
document.getElementById('total-reserva').innerText = "10500";


document.getElementById('confirmar-compra').addEventListener('click', function() {
 
    const metodoPago = document.querySelector('input[name="metodo-pago"]:checked').value;

    
    const mensaje = `
        --- Ticket de Reserva ---
        Película: ${document.getElementById('titulo-pelicula').innerText}
        Asientos: ${document.getElementById('asientos-seleccionados').innerText}
        Total: ₡${document.getElementById('total-reserva').innerText}
        Método de Pago: ${metodoPago}
        ----------------------------
        ¡Gracias por tu compra!
    `;

  
    alert(mensaje);


    window.location.href = '../index.html';
});
