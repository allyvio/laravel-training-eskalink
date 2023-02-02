<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th v-for="(title, i) in titles" :key="i" scope="col" class="text-capitalize">{{ title }}</th>
                <th v-if="withAction" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, i) in items" :key="i">
                <th scope="row">{{ i+ 1 }}</th>
                <td v-for="(title, key) in titles" :key="key">
                    {{ item[title] }}
                </td>
                <td width="120px" v-if="withAction">
                    <the-button-vue type="danger" :icon="'trash'" @click.native="onClick(item, 'delete')">
                        <i class="fas fa-trash"></i>
                    </the-button-vue>
                    <the-button-vue type="primary" :icon="'eye'" @click.native="onClick(item, 'detail')">
                        <i class="fas fa-eye"></i>
                    </the-button-vue>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import TheButtonVue from './TheButton.vue'

export default {
    components: { TheButtonVue },
    props: {
        titles: {
            type: Array,
            default: () => []
        },
        items: {
            type: Array,
            default: () => []
        },
        withAction: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        onClick(item, emit) {
            this.$emit(emit, item)
        }
    },
}
</script>