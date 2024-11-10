

<div class="confirmacion-header">
    <h2>Reserva</h2>
</div>

<div class="confirmacion-container">
    <div class="detalles-reserva">
        <p><strong>Película:</strong> <span id="titulo-pelicula">The Batman</span></p>
        <p><strong>Asientos Seleccionados:</strong> <span id="asientos-seleccionados">A1, A3, B2</span></p>
        <p><strong>Precio por Asiento:</strong> ₡<span id="precio-por-asiento">3500</span></p>
        <p><strong>Total:</strong> ₡<span id="total-reserva">10500</span></p>
    </div>

 
    <div class="metodo-pago">
        <h3>Método de Pago</h3>
        <label>
            <input type="radio" name="metodo-pago" value="SINPE">
            SINPE
        </label>
        <label>
            <input type="radio" name="metodo-pago" value="Efectivo">
            Efectivo
        </label>
        <label>
            <input type="radio" name="metodo-pago" value="Tarjeta">
            Tarjeta
        </label>
    </div>

    <button id="confirmar-compra">Confirmar Compra</button>
</div>

<div id="ticket" class="ticket-container" style="display: none;">
    <img src="../img/kino_logo.jpg" alt="Logo Kino" class="logo-ticket">
    <h3>Cine Kino</h3>
    <p><strong>Cliente:</strong> <span id="nombre-cliente">Nombre del Cliente</span></p>
    <p><strong>Película:</strong> <span id="ticket-titulo-pelicula">The Batman</span></p>
    <p><strong>Asientos:</strong> <span id="ticket-asientos">A1, A3, B2</span></p>
    <p><strong>Total:</strong> ₡<span id="ticket-total">10500</span></p>
    <p><strong>Método de Pago:</strong> <span id="ticket-metodo-pago">SINPE</span></p>
</div>


<script src="../assets/js/confirmacion.js"></script>
<link rel="stylesheet" href="../assets/css/styles.css">
