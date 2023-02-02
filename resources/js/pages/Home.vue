<template>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="w-50">
            <h3>Vue JS Basic </h3>
            <the-button-vue @click.native="clickOpenForm">
                <i class="fas fa-plus" /> Tambah Produk
            </the-button-vue>

            <the-table-vue with-action :titles="titles" :items="electonicProducts" @delete="clickDelete"
                @detail="clickDetail" />
        </div>

        <the-modal-vue :title="'Form Product1'">
            <template>
                <the-input-vue :label="'Product'" v-model="productForm.product" />
                <the-input-vue :label="'Tag'" v-model="productForm.tag" />
            </template>
            <template #footer>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="onSave">
                    Save changes
                </button>
            </template>
        </the-modal-vue>
    </div>
</template>
<script>
import TheButtonVue from '../components/atoms/TheButton.vue'
import TheInputVue from '../components/atoms/TheInput.vue'
import TheTableVue from '../components/atoms/TheTable.vue'
import TheModalVue from '../components/atoms/TheModal.vue'

export default {
    components: { TheButtonVue, TheTableVue, TheInputVue, TheModalVue },
    data() {
        return {
            hitungan: 1,
            title: 'Home Page',
            profile: {
                name: 'Ghany Abdillah Ersa',
                address: 'Jember'
            },
            titles: ['product', 'tag'],
            products: [],
            productForm: {
                id: null,
                product: null,
                tag: null
            },
            firstname: 'Ghany',
            lastname: 'Ersa'
        }
    },
    computed: {
        electonicProducts() {
            return this.products
        },
        fullname: {
            get() {
                debugger
                return this.firstname + ' ' + this.lastname
            },
            set(value) {
                debugger
                const arrName = value.split(' ')
                this.firstname = arrName[0]
                this.lastname = arrName[arrName.length - 1]
            }
        }
    },
    mounted() {
        this.getProducts()
    },
    methods: {
        getProducts() {
            axios.get('/api/products').then(response => {
                const dataResponse = response.data
                let products = []
                dataResponse.data.map(product => {
                    const tags = product.tag.map(tag => tag[0])
                    if (tags.length)
                        tags.map(tag => {
                            products.push({
                                id: product.id,
                                product: product['book name'],
                                tag: tag
                            })
                        })
                    else
                        products.push({
                            id: product.id,
                            product: product['book name'],
                            tag: ''
                        })
                })
                this.products = products
            })
        },
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
        clickOpenForm() {
            this.productForm = { id: null, product: null, tag: null }
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
            } else {
                this.products.push({ ...this.productForm, id: Math.random() * 1000 })
            }
        },
        getProductName(val) {
            this.productForm.product = val
        }
    },
}
</script>
