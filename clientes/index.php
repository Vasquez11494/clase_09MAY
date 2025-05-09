<?php include_once '../../includes/header.php' ?>
<div class="container mt-4">
    <h1 class="text-center">Formulario para Crear Clientes</h1>
    <div class="row justify-content-center">
        <form class="border bg-light shadow rounded p-4 col-lg-6" id="FormClientes" >
            <div class="row mb-3">
                <input type="hidden" name="cli_codigo" id="cli_codigo" class="form-control" required>
                <div class="col">
                    <label for="cli_nombre">Nombre del Cliente</label>
                    <input type="text" name="cli_nombre" id="cli_nombre" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="cli_apellido">Apellidos del Cliente</label>
                    <input type="text" name="cli_apellido" id="cli_apellido" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="cli_nit">No. de NIT</label>
                    <input type="number" name="cli_nit" id="cli_nit" min="0" step="0.01" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="cli_telefono">Telefono</label>
                    <input type="number" name="cli_telefono" id="cli_telefono" min="0" step="0.01" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-auto">
                    <button type="submit" id="BtnGuardar" class="btn btn-primary w-100">Guardar</button>
                </div>
                <div class="col-auto">
                    <button type="button" id="BtnBuscar" class="btn btn-info w-100">Buscar</button>
                </div>
                <div class="col-auto">
                    <button type="button" id="BtnModificar" class="btn btn-warning w-100 d-none">Modificar</button>
                </div>
                <div class="col-auto">
                    <button type="button" id="BtnCancelar" class="btn btn-secondary w-100">Cancelar</button>
                </div>
                <div class="col-auto">
                    <button type="reset" id="BtnLimpiar" class="btn btn-secondary w-100">Limpiar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row justify-content-center">
            <div class="col-lg-10 table-wrapper">
                <h2 class="text-center mb-4">Clientes Ingresados</h2>
                <table class="table table-bordered table-hover" id="tablaClientes">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>NIT</th>
                            <th>Telefono</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" id="VerificarDatosTabla" class="text-center">No hay Clientes Registrados</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>

<script src="../../src/clientes.js" ></script>
<script src="../../src/funciones.js"></script>
<?php include_once '../../includes/footer.php' ?>