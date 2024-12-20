CREATE DATABASE kino_db;

USE kino_db;

-- Tabla de Usuario
CREATE TABLE usuarios (
    usuario_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE,
    telefono VARCHAR(15),
    email VARCHAR(100) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    rol ENUM('cliente', 'administrador') DEFAULT 'cliente' 
);

-- Tabla de Películas
CREATE TABLE peliculas (
    pelicula_id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    duracion_minutos INT,
    clasificacion VARCHAR(10)
);

-- Tabla de Salas
CREATE TABLE salas (
    sala_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    capacidad INT NOT NULL
);

-- Tabla de Asientos
CREATE TABLE asientos (
    asiento_id INT AUTO_INCREMENT PRIMARY KEY,
    sala_id INT,
    numero_asiento INT NOT NULL,
    fila CHAR(1) NOT NULL,
    FOREIGN KEY (sala_id) REFERENCES salas(sala_id)
);

-- Tabla de Funciones
CREATE TABLE funciones (
    funcion_id INT AUTO_INCREMENT PRIMARY KEY,
    pelicula_id INT,
    sala_id INT,
    fecha_hora DATETIME NOT NULL,
    FOREIGN KEY (pelicula_id) REFERENCES peliculas(pelicula_id),
    FOREIGN KEY (sala_id) REFERENCES salas(sala_id)
);

-- Tabla de Reservas
CREATE TABLE reservas (
    reserva_id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    funcion_id INT,
    fecha_reserva DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
    FOREIGN KEY (funcion_id) REFERENCES funciones(funcion_id)
);

-- Tabla de Asientos Reservados
CREATE TABLE asientos_reservados (
    asiento_reservado_id INT AUTO_INCREMENT PRIMARY KEY,
    reserva_id INT,
    asiento_id INT,
    FOREIGN KEY (reserva_id) REFERENCES reservas(reserva_id),
    FOREIGN KEY (asiento_id) REFERENCES asientos(asiento_id)
);

-- Usuario administrador por defecto admin 12345
INSERT INTO usuarios (nombre, apellido, fecha_nacimiento, telefono, email, contrasena, rol)
VALUES ('Admin', 'User', '1970-01-01', '123456789', 'admin@kino.com', '$2y$10$Kt8NVc.lR5KnxI8I5zmj7OZRfJHdd6k0Jp9FJfMfLqNEfjWv1Wvzu', 'administrador');


-- incluye campos en peliculas
ALTER TABLE peliculas
ADD COLUMN url_imagen VARCHAR(255),
ADD COLUMN precio DECIMAL(10, 2),
ADD COLUMN numero_sala INT,
ADD COLUMN horarios VARCHAR(255);


-- Procedimientos:

-- Insert en Peliculas:

DELIMITER //

CREATE PROCEDURE sp_into_peliculas(
    IN p_titulo VARCHAR(255),
    IN p_descripcion TEXT,
    IN p_duracion_minutos INT,
    IN p_clasificacion VARCHAR(10),
    IN p_url_imagen VARCHAR(255),
    IN p_precio DECIMAL(10, 2),
    IN p_horarios VARCHAR(255),
    IN p_numero_sala INT
)
BEGIN
    INSERT INTO peliculas (titulo, descripcion, duracion_minutos, clasificacion, url_imagen, precio, horarios, numero_sala)
    VALUES (p_titulo, p_descripcion, p_duracion_minutos, p_clasificacion, p_url_imagen, p_precio, p_horarios, p_numero_sala);
END //

DELIMITER ;

-- Insert usuarios
DELIMITER //

CREATE PROCEDURE sp_into_usuarios(
    IN p_nombre VARCHAR(100),
    IN p_apellido VARCHAR(100),
    IN p_fecha_nacimiento DATE,
    IN p_telefono VARCHAR(15),
    IN p_email VARCHAR(100),
    IN p_contrasena VARCHAR(255),
    IN p_rol ENUM('cliente', 'administrador')
)
BEGIN
    INSERT INTO usuarios (nombre, apellido, fecha_nacimiento, telefono, email, contrasena, rol)
    VALUES (p_nombre, p_apellido, p_fecha_nacimiento, p_telefono, p_email, p_contrasena, p_rol);
END //

DELIMITER ;






