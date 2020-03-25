<template>
    <div>
        <h3 class="w-100">Lista de empleados con horas Extras</h3>
        <form class="form-inline">
            <div class="form-group">
                <input type="date" class="form-control" placeholder="Dia inicio">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" placeholder="Dia termino">
            </div>
        </form>
        <hr>
        <table ref="tbl_hours_extras" style="width:100%" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Empleado</th>
                    <th>Horas Extras</th>
                    <th>Dia</th>
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
                url:'/tbl/hoursextras',
                columnsData:[
                    {data:'id',name:'id'},
                    {data:'employe',name:'employe'},
                    {data:'hours',name:'hours'},
                    {data:'created_at',name:'created_at'},
                ]
            }
        }
    },
    methods: {

    },
    mounted() {
        this.table(
            this.$refs.tbl_hours_extras,
            this.tbl.url,
            this.tbl.columnsData
        );
        // this.handlerEvent(this.triggerEvent);
    },
}
</script>
