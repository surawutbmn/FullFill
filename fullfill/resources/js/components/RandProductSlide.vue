<template>
    <div class="container mt-5">
        <h3>สินค้าที่คุณอาจสนใจ</h3>
        <div class="container row mt-2 g-4">
            <div v-for="randomProduct in randomProducts" :key="randomProduct.id"
                class="product-all col-6 col-md-4 col-lg-2 mb-4" style="height: 350px;">
                <a style="text-decoration: none; height: 100%;" :href="'/product/' + randomProduct.id">
                    <div class="thumb txt-primary" style="height: 100%; display: flex; flex-direction: column;">
                        <div class="thumb-img" style="flex: 1;">
                            <img :src="'/uploads/' + randomProduct.product_img" alt="">
                        </div>
                        <div class="thumb-body">
                            <h5 class="thumb-title">
                                {{ randomProduct.product_name_th ? randomProduct.product_name_th :
                                    randomProduct.product_name }}
                            </h5>
                            <p class="thumb-des">ร้าน {{ randomProduct.shop }}, {{ randomProduct.cat_name ?
                                randomProduct.cat_name : 'N/A' }}</p>
                            <div class="thumb-sub-des">
                                {{ randomProduct.cat_name == 'Accessory' ? randomProduct.product_price + ' ฿ / 1pcs' :
                                    randomProduct.product_price + ' ฿ / 100g' }}
                            </div>
                        </div>
                        <div class="mt-2 w-100 btn btn-prm" style="flex-shrink: 0;">เลือกสินค้า</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        randomProducts: {
            type: Array,
            required: true
        }
    }
}
</script>
<style></style>