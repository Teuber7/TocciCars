
CREATE DATABASE IF NOT EXISTS TocciCars;
USE TocciCars;


CREATE TABLE Clientes (
    IDCliente INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Apellido VARCHAR(50) NOT NULL,
    Documento VARCHAR(20) UNIQUE NOT NULL,
    Direccion VARCHAR(100),
    Telefono VARCHAR(20),
    Correo VARCHAR(50) UNIQUE,
    FechaNacimiento DATE,
    LicenciaConducir VARCHAR(20)
);


CREATE TABLE Autos (
    IDAuto INT AUTO_INCREMENT PRIMARY KEY,
    Marca VARCHAR(50) NOT NULL,
    Modelo VARCHAR(50) NOT NULL,
    Año YEAR NOT NULL,
    Matricula VARCHAR(20) UNIQUE NOT NULL,
    Color VARCHAR(20),
    Tipo VARCHAR(30),
    Kilometraje INT,
    PrecioPorDia DECIMAL(10, 2),  
    PrecioVenta DECIMAL(10, 2),  
    Categoria VARCHAR(20) NOT NULL,  
    Disponibilidad BOOLEAN DEFAULT TRUE,
    Estado VARCHAR(50) DEFAULT 'activo',
    NombreImagen VARCHAR(100),  
    TipoOperacion VARCHAR(20) DEFAULT 'ambos' 
);


CREATE TABLE Empleados (
    IDEmpleado INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Apellido VARCHAR(50) NOT NULL,
    Documento VARCHAR(20) UNIQUE NOT NULL,
    Direccion VARCHAR(100),
    Telefono VARCHAR(20),
    Correo VARCHAR(50) UNIQUE,
    Cargo VARCHAR(50)
);


CREATE TABLE Sucursales (
    IDSucursal INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Direccion VARCHAR(100) NOT NULL,
    Ciudad VARCHAR(50) NOT NULL,
    Telefono VARCHAR(20),
    Gerente INT,
    FOREIGN KEY (Gerente) REFERENCES Empleados(IDEmpleado)
);

CREATE TABLE Reservas (
    IDReserva INT AUTO_INCREMENT PRIMARY KEY,
    IDCliente INT,
    IDAuto INT,
    FechaInicio DATE NOT NULL,
    FechaFin DATE NOT NULL,
    MontoTotal DECIMAL(10, 2),
    Estado VARCHAR(20) DEFAULT 'activa',
    MetodoPago VARCHAR(50),
    FOREIGN KEY (IDCliente) REFERENCES Clientes(IDCliente),
    FOREIGN KEY (IDAuto) REFERENCES Autos(IDAuto)
);

CREATE TABLE Mantenimiento (
    IDMantenimiento INT AUTO_INCREMENT PRIMARY KEY,
    IDAuto INT,
    IDEmpleado INT,
    FechaMantenimiento DATE NOT NULL,
    Descripcion TEXT,
    Costo DECIMAL(10, 2),
    Tipo VARCHAR(20) NOT NULL,
    FOREIGN KEY (IDAuto) REFERENCES Autos(IDAuto),
    FOREIGN KEY (IDEmpleado) REFERENCES Empleados(IDEmpleado)
);

CREATE TABLE Facturas (
    IDFactura INT AUTO_INCREMENT PRIMARY KEY,
    IDReserva INT,
    FechaEmision DATE NOT NULL,
    MontoTotal DECIMAL(10, 2),
    Detalle TEXT,
    IDCliente INT,
    IDAuto INT,
    EstadoPago VARCHAR(20) DEFAULT 'pendiente',
    FOREIGN KEY (IDReserva) REFERENCES Reservas(IDReserva),
    FOREIGN KEY (IDCliente) REFERENCES Clientes(IDCliente),
    FOREIGN KEY (IDAuto) REFERENCES Autos(IDAuto)
);

CREATE TABLE Ventas (
    IDVenta INT AUTO_INCREMENT PRIMARY KEY,
    IDCliente INT,
    IDAuto INT,
    FechaVenta DATE NOT NULL,
    PrecioVenta DECIMAL(10, 2) NOT NULL,
    MetodoPago VARCHAR(50),
    Detalle TEXT,
    FOREIGN KEY (IDCliente) REFERENCES Clientes(IDCliente),
    FOREIGN KEY (IDAuto) REFERENCES Autos(IDAuto)
);
