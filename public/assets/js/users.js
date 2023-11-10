// Configura jQuery para incluir automáticamente el token CSRF en las solicitudes AJAX
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    // Evento de envío del formulario
    $("#form-complete-aditional-data").submit(function (e) {
        e.preventDefault(); // Evita el envío del formulario por defecto

        // Obtener los datos del formulario y crear un objeto FormData
        var formData = {
            user_id: $("#user_id").val(),
            number_phone: $("#phone").val(),
            birth_date: $("#birth_date").val(),
            civil_status: $("#civil_status").val(),
            children: $("#children").val(),
            observations: $("#observations").val(),
        };

        // Realizar la solicitud AJAX
        $.ajax({
            url: "/admin/users/" + formData.user_id,
            type: "PUT", // Cambiado a POST porque estás enviando datos del formulario
            data: formData,
            success: function (response) {
                console.log(response);
                alert(response);
                location.reload();
            },
            error: function (error) {
                console.error(error.responseJSON.error);
                alert(
                    "Error al actualizar usuario: " + error.responseJSON.error
                );
            },
        });
    });
});
