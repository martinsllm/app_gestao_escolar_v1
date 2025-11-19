 $(document).ready(function() {
    $('#search').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '/api/v1/fetch',
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response($.map(data,
                        function(item){
                            return {
                                label: item.matricula + ' - ' + item.nome_completo,
                                value: item.id
                            };
                        }
                    ));
                }
            });
        },
        minLength: 2, // Minimum characters to trigger autocomplete
        select: function( event, ui ) {
            $('#search').val(ui.item.label);
            $('#estudante_id').val(ui.item.value);
            return false;
        }

    })
})