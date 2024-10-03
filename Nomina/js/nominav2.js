// Define una función llamada realizarNomina
function realizarNomina() {
    // Obtiene el valor del campo de entrada con id 'valorDia'
    const valorDia = document.getElementById('valorDia').value;
    
    const diasTrabajados = document.getElementById('diasTrabajados').value;
    
    const edad = document.getElementById('edad').value;

    fetch('libreria/calcular.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        
        // Convierte el objeto JavaScript { valorDia, diasTrabajados, edad } a una cadena JSON
        // y la envía como el cuerpo de la solicitud
        body: JSON.stringify({ valorDia, diasTrabajados, edad })
    })
    
    // Cuando se recibe la respuesta, la analiza como JSON
    .then(response => response.json())
    
    // Cuando se recibe los datos JSON, actualiza los elementos HTML con los valores correspondientes
    .then(data => {
        document.getElementById('resultadoSalario').textContent = data.salario;
        document.getElementById('resultadoSalud').textContent = data.salud;
        document.getElementById('resultadoPension').textContent = data.pension;
        document.getElementById('resultadoArl').textContent = data.arl;
        document.getElementById('resultadoSubTrans').textContent = data.subTrans;
        document.getElementById('resultadoRetencion').textContent = data.retencion;
        document.getElementById('resultadoExtra').textContent = data.extra;
        document.getElementById('resultadoDeducible').textContent = data.deducible;
        document.getElementById('resultadoTotalPagar').textContent = data.totalPagar;
    })
    
    .catch(error => console.error('Error:', error));
}