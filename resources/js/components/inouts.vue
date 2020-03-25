<template>
    <div>
        <table ref="tbl_inouts" style="width:100%" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Empleado</th>
                    <th>Hora de Entrada</th>
                    <th>Hora de Salida</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tbl:{
                url:'/tbl/inouts',
                columnsData:[
                    {data:'id',name:'id'},
                    {data:'employe',name:'employe'},
                    {data:'hour_in',name:'hour_in'},
                    {data:'hour_out',name:'hour_out'},
                ]
            }
        }
    },
    methods: {

    },
    mounted() {
        this.table(
            this.$refs.tbl_inouts,
            this.tbl.url,
            this.tbl.columnsData
        );
        // this.handlerEvent(this.triggerEvent);
    },
}
</script>
