<template>

    <div class="table-wrap">
        <div class="table-responsive">
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <td class="border-none">Driver Name:</td>
                        <td class="border-none">
                            {{ selectdriver.name }}
                        </td>
                    </tr>
                    <tr>
                        <td>Driver E-mail:</td>
                        <td>{{ selectdriver.email }}</td>
                    </tr>
                    <tr>
                        <td>Driver Phone</td>
                        <td>{{ selectdriver.phone }}</td>
                    </tr>
                    <tr>
                        <td>Driver Address</td>
                        <td>{{ selectdriver.address }}</td>
                    </tr>
                    <tr>
                        <td>Driver Register Date</td>
                        <td>{{ new Date(selectdriver.created_at).getDate() + '-' + new
                                Date(selectdriver.created_at).getMonth() + '-' + new
                                    Date(selectdriver.created_at).getFullYear()
                        }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        selectdriver: null
    },
    data() {
        return {

        }
    },
}
</script>