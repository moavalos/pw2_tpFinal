
    $(document).ready(function() {
    // Manejar el cambio en el select
    $('#timeframe').change(function() {
        var periodoSeleccionado = $(this).val();
        console.log('Periodo seleccionado: ' + periodoSeleccionado);



        $.ajax({
            url: '/administrador/manejoDeCambioDeFechaCantPartida',
            method: 'GET',
            data: { timeframe: periodoSeleccionado },
            success: function(response) {

                $('#cantidad_partidas').text(response.cantidad_partidas);

            },
            error: function() {
                alert('Error al obtener los datos del servidor.');
            }
        });
    });
});

    $(document).ready(function () {
        $('#timeframe2').change(function () {
            var periodoSeleccionado = $(this).val();
            console.log('Periodo seleccionado: ' + periodoSeleccionado);

            $.ajax({
                url: '/administrador/manejoDeCambioDeFechaPreguntaActiva',
                method: 'GET',
                data: { timeframe2: periodoSeleccionado },
                success: function(response) {
                    console.log(response);
                    $('#cantidad_preguntasActivas').text(response.cantidad_preguntasActivas);
                },
                error: function() {

                    alert('Error al obtener los datos del servidor.');
                }
            });
        });
    });

    $(document).ready(function () {
        $('#timeframe3').change(function () {
            var periodoSeleccionado = $(this).val();
            console.log('Periodo seleccionado: ' + periodoSeleccionado);

            $.ajax({
                url: '/administrador/manejoDeCambioDeFechaPreguntaCreadas',
                method: 'GET',
                data: { timeframe3: periodoSeleccionado },
                success: function(response) {
                    console.log(response);
                    $('#cantidad_preguntasCreadas').text(response.cantidad_preguntasCreadas);
                },
                error: function() {

                    alert('Error al obtener los datos del servidor.');
                }
            });
        });
    });

    $(document).ready(function () {
        $('#timeframe4').change(function () {
            var periodoSeleccionado = $(this).val();
            console.log('Periodo seleccionado: ' + periodoSeleccionado);

            $.ajax({
                url: '/administrador/manejoDeCambioDeFechaUsuariosHombres',
                method: 'GET',
                data: { timeframe4: periodoSeleccionado },
                success: function(response) {
                    console.log(response);
                    $('#cantidad_usuarios_masculinos').text(response.cantidad_usuarios_masculinos);
                },
                error: function() {

                    alert('Error al obtener los datos del servidor.');
                }
            });
        });
    });


    $(document).ready(function () {
        $('#timeframe4').change(function () {
            var periodoSeleccionado = $(this).val();
            console.log('Periodo seleccionado: ' + periodoSeleccionado);

            $.ajax({
                url: '/administrador/manejoDeCambioDeFechaUsuariosMujeres',
                method: 'GET',
                data: { timeframe4: periodoSeleccionado },
                success: function(response) {
                    console.log(response);
                    $('#cantidad_usuarios_femeninos').text(response.cantidad_usuarios_femeninos);
                },
                error: function() {

                    alert('Error al obtener los datos del servidor.');
                }
            });
        });
    });


