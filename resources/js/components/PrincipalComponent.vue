<template>
    <div>
        <b-col>
            <categories></categories>
        </b-col>
        <b-col>
            <products></products>
        </b-col>
    </div>
</template>
<script>

import categories from './CategoriesComponent.vue'
import products from './ProductsComponent.vue'

export default {
    components: {
        categories,
        products
    },
}
</script>