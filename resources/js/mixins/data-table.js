export default {
    data() {
        return {
            tableProperty:{
                dataTable:'',
                reloadTable:''
            }
        }
    },
    methods: {
        table(tableRef, url, columnsData, scroll_Y = '', orderByColumn=0, orderType='desc') {
            this.tableProperty.dataTable = window.$(tableRef);
            this.tableProperty.reloadTable = this.tableProperty.dataTable.dataTable({
                responsive: true,
                "scrollY": `${scroll_Y}`,
                "scrollCollapse": true,
                "aProcessing": true,
                "aServerSide": true,
                dom: "<'row d-flex justify-content-center text-center lead' B>" +
                    "<'row'<'col-sm-6 col-xs-12'l><'col-sm-6 col-xs-12'f>>" +
                    // "<'row'<'col-sm-12'p>>" +
                    "<'row'<'col-lg-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    buttons: [{
                        extend: 'excelHtml5',
                        text: '<strong>Excel</strong>',
                        className: 'btn btn-success btn-xs',
                        title: 'Reporte del Checador',
                        autoFilter: true,
                        sheetName: 'Reporte del Checador',
                        // exportOptions: {
                        //     columns: columnsExport
                        // },
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<strong>Pdf</strong>',
                        className: 'btn btn-danger btn-xs',
                        title: 'Reporte del Checador',
                        // orientation: 'landscape',
                        pageSize: 'letter',
                        // download: false,
                        // exportOptions: {
                        //     columns: columnsExport
                        // },
                        titleAttr: 'PDF'
                    }
                ],
                "ajax": {
                    url: url,
                    type: "get",
                    dataType: "json",
                    error: function(e) {
                        console.log(e.responseText);
                    }
                },
                "columns": columnsData,
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": ">>",
                        "sPrevious": "<<"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "bDestroy": true,
                "iDisplayLength": -1,
                "lengthMenu": [
                    [5, 10, 15, 25, 50, -1],
                    [5, 10, 15, 25, 50, "Todos"]
                ],
                "order": [
                    [orderByColumn, orderType]
                ]
            }).DataTable();
        },
        handlerEvent(callback) {
            this.tableProperty.dataTable.click(function(e) {
                const action = e.target.getAttribute('data-action');
                const key = e.target.getAttribute('data-key');
                const module = e.target.getAttribute('data-module');
                const user = e.target.getAttribute('data-user');
                const applauses_count = e.target.getAttribute('data-applauses-count');
                if(action){
                    callback({
                        action,
                        module,
                        key,
                        user,
                        applauses_count
                    });
                }
            });
        }
    },
}
