
const tablaClientes = document.getElementById('tablaClientes');
const VerificarDatosTabla = document.getElementById('VerificarDatosTabla');
const FormClientes = document.getElementById('FormClientes');
const BtnGuardar = document.getElementById('BtnGuardar');
const BtnModificar = document.getElementById('BtnModificar');
const BtnLimpiar = document.getElementById('BtnLimpiar');

const BuscarClientes = async () => {

    const url = '/clientes_2025/controladores/clientes/index.php'
    const configuracion = {
        method: "GET"
    }

    try {

        const consulta = await fetch(url, configuracion)
        const respuesta = await consulta.json();
        const { codigo, data, mensaje } = respuesta;

        if (codigo == 1) {

            if (data.length > 0) {

                tablaClientes.tBodies[0].innerHTML = '';

                VerificarDatosTabla.classList.add('d-none');
                const fragmento = document.createDocumentFragment();
                let contador = 1;

                data.forEach(element => {

                    const tr = document.createElement('tr');
                    const td1 = document.createElement('td');
                    const td2 = document.createElement('td');
                    const td3 = document.createElement('td');
                    const td4 = document.createElement('td');
                    const td5 = document.createElement('td');
                    const td6 = document.createElement('td');
                    const td7 = document.createElement('td');
                
                    const BtnModificar = document.createElement('button');
                    const BtnEliminar = document.createElement('button');

                    BtnModificar.textContent = 'Modificar';
                    BtnModificar.classList.add('btn', 'btn-warning', 'w-100');


                    BtnEliminar.textContent = 'Eliminar';
                    BtnEliminar.classList.add('btn', 'btn-danger', 'w-100');

                    BtnModificar.addEventListener('click', () => llenarDatos(element));
                    // BtnEliminar.addEventListener('click', () => EliminarClientes(cliente.cli_codigo));

                    td1.textContent = contador;
                    td2.textContent = element.cli_nombre;
                    td3.textContent = element.cli_apellido;
                    td4.textContent = element.cli_nit;
                    td5.textContent = element.cli_telefono;
                    td6.appendChild(BtnModificar);
                    td7.appendChild(BtnEliminar);
                    

                    fragmento.appendChild(tr)
                    fragmento.appendChild(td1)
                    fragmento.appendChild(td2)
                    fragmento.appendChild(td3)
                    fragmento.appendChild(td4)
                    fragmento.appendChild(td5)
                    fragmento.appendChild(td6)
                    fragmento.appendChild(td7)

                    tablaClientes.appendChild(fragmento);
                    contador++;
                });

                tablaClientes.tBodies[0].appendChild(fragmento);
            } else {
                VerificarDatosTabla.classList.remove('d-none');
            }

        }

    } catch (error) {
        console.log(error)
    }
}

const GuardarClientes = async (e) => {

    e.preventDefault();

    BtnGuardar.disabled = true;
    const body = new FormData(FormClientes)
    body.append('codigo', 1);

    const url = '/clientes_2025/controladores/clientes/index.php'
    const configuracion = {
        method: "POST",
        body
    }

    try {
        const datos = await fetch(url, configuracion);
        const respuesta = await datos.json();

        const { codigo, mensaje } = respuesta

        if (codigo == 1) {
            alert(mensaje);
            BuscarClientes();
            Limpiar();
        } else {
            alert(mensaje);
        }

    } catch (error) {
        console.log(error)
    }
    BtnGuardar.disabled = false

}

const llenarDatos = (e) => {

    BtnModificar.classList.remove('d-none');
    BtnGuardar.classList.add('d-none');
    document.getElementById('cli_nombre').value = e.cli_nombre
    document.getElementById('cli_apellido').value = e.cli_apellido
    document.getElementById('cli_nit').value = e.cli_nit
    document.getElementById('cli_telefono').value = e.cli_telefono
    document.getElementById('cli_codigo').value = e.cli_codigo
    
}

const Limpiar = ()=> {
    FormClientes.reset();
    BtnGuardar.classList.remove('d-none');
    BtnModificar.classList.add('d-none')
}

BuscarClientes();
FormClientes.addEventListener('submit', GuardarClientes);
BtnLimpiar.addEventListener('click', Limpiar);