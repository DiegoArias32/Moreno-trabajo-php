function realizarCalculos() {
    fetch('libreria/calcular.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('resultadoAreaCuadrado').textContent = `Área del cuadrado: ${data.areaCuadrado}`;
        document.getElementById('resultadoAreaTriangulo').textContent = `Área del triángulo: ${data.areaTriangulo}`;
        document.getElementById('resultadoAreaCirculo').textContent = `Área del círculo: ${data.areaCirculo}`;
    })
    .catch(error => console.error('Error:', error));
}

document.addEventListener("DOMContentLoaded", function(){
    realizarCalculos();
});