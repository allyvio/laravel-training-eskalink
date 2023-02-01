<template>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="w-50">
            <h3>Vue JS Basic</h3>
            <the-table-vue with-action :titles="titles" :items="products" @delete="clickDelete" @detail="clickDetail" />
        </div>

        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Product Detail</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <the-input-vue :label="'Product'" v-model="productForm.product" />
                        <the-input-vue :label="'Tag'" v-model="productForm.tag" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="onSave">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import TheButtonVue from '../components/atoms/TheButton.vue'
import TheInputVue from '../components/atoms/TheInput.vue'
import TheTableVue from '../components/atoms/TheTable.vue'

export default {
    components: { TheButtonVue, TheTableVue, TheInputVue },
    data() {
        return {
            hitungan: 1,
            title: 'Home Page',
            profile: {
                name: 'Ghany Abdillah Ersa',
                address: 'Jember'
            },
            titles: ['product', 'tag'],
            products: [
                { id: 1, product: 'Komputer', tag: 'Elektronik' },
                { id: 2, product: 'Laptop', tag: 'Elektronik' },
                { id: 3, product: 'Handphone', tag: 'Elektronik' },
                { id: 4, product: 'Lemari', tag: 'Fisik' },
                { id: 5, product: 'Papan', tag: 'ATK' },
            ],
            productForm: {
                id: null,
                product: null,
                tag: null
            }
        }
    },
    methods: {
        increment(value = 0) {
            if (value) this.hitungan += value
            else
                this.hitungan++
        },
        clickDelete(item) {
            this.products = this.products.filter(product => product.id !== item.id)
        },
        clickDetail(item) {
            this.productForm = { ...item }
            const modal = new bootstrap.Modal('#modal')
            modal.show()
        },
        onSave() {
            if (this.productForm.id) {
                this.products = this.products.map(product => {
                    if (this.productForm.id == product.id)
                        product = this.productForm
                    return product
                })
            }
        }
    },
}
</script>
