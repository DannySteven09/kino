document.getElementById('registroForm').addEventListener('submit', function(event) {
    const nombre = document.getElementById('nombre').value.trim();
    const apellido = document.getElementById('apellido').value.trim();
    const email = document.getElementById('email').value.trim();
    const telefono = document.getElementById('telefono').value.trim();
    const fechaNacimiento = document.getElementById('fecha_nacimiento').value;
    const contrasena = document.getElementById('contrasena').value.trim();

    if (!nombre || !apellido || !email || !telefono || !fechaNacimiento || !contrasena) {
        alert("Por favor, complete todos los campos.");
        event.preventDefault();
    }
});
