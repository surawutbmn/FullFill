<template>
    <div class="shop-banner">
        <div class="banner-con position-relative">
            <picture>
                <source media="(max-width:1200px)" srcset="/img/shop-banner.jpg">
                <img style="width: 100%;" src="/img/shop-banner.jpg" alt="">
            </picture>
            <div class="banner-box">
                <div class="container position-relative" style="height: 100%;">
                    <!-- <div class="banner-content text-center">
                        <div class="banner-content-txt txt-dark ">
                            <h1>รวมร้าน Refill</h1>
                            <span style="margin-top: 30px; display:flex">เพื่อสะดวกต่อการใช้งาน ร้าน Refill ของคุณ </span>
                        </div>
                    </div> -->
                </div>
                <form class="search-shop" action="/shop" method="get">
                    <label>Search</label>
                    <div class="input-group">
                        <input placeholder="ค้นหาร้านค้า..." type="text" class="form-control" name="search" value="">
                        <button class="btn btn-prm"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="shop-intro mt-4 mb-4">
        <div class="container">
            <div class="row ">
                 <div>
            <!-- Access shop data using props -->
            <img style="width: 7vw;" :src="'/uploads/' + logo" alt="Shop Logo">
            <h2>{{ name }}</h2>
            <p><strong>Type:</strong> {{ type }}</p>
            <p><strong>PromptPay:</strong> {{ promptpay }}</p>
            <div v-html="location"></div>
        </div>
                <!-- <div class="col-6 text-center">
                    <img style="height: 20vw; width: 20vw; overflow: hidden; border-radius: 0 30% 10% 10%;"
                        src="/img/refillshop.png" alt="" />
                </div> -->
                <!-- <div class="col-6">
                    <h4>Welcome To Refill shop</h4>
                    <p>ตัวอย่างประเภทสินค้า</p>
                    <div class="prd-con d-flex mb-3">
                        <div class="prd-ex">
                            <img src="/img/detergent.jpg" alt="">
                            <p>น้ำยาล้างจาน</p>
                        </div>
                        <div class="prd-ex ms-4">
                            <img src="/img/detergent.jpg" alt="">
                            <p>น้ำยาล้างซักผ้า</p>
                        </div>
                        <div class="prd-ex ms-4">
                            <img src="/img/detergent.jpg" alt="">
                            <p>ของทานเล่น</p>
                        </div>
                        <div class="prd-ex ms-4">
                            <img src="/img/detergent.jpg" alt="">
                            <p>ผลิตภัณฑ์บำรุงผิว</p>
                        </div>
                    </div>
                    <a href="/product" class="btn btn-prm-outline">ดูสินค้าทั้งหมด</a>
                </div> -->
            </div>
        </div>
    </div>
     <div class="container mb-4">
                <div class="text-center mb-3">
                    <h3>ร้านค้าทั้งหมด</h3>
                </div>
                <div class="row">
    <iframe src="https://www.google.com/maps/d/embed?mid=1wzH8dtcHsWiORKXMi7Sk2iv-fQOBK6M&ehbc=2E312F" width="640" height="480"></iframe>                </div>
            </div>
    <div class="prdh-sec position-relative">
            <div class=" container">
                <div class="position-relative ">
                    <div class="prdh-txt txt-home">
                        <h3>สินค้ายอดนิยม</h3>
                        <p>ที่เป็นความพึงพอใจต่อผู้ใช้งาน</p>
                    </div>
                    <div class="navigate-prdh">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="prd-slide container" style="max-height: 500px;">
                    <swiper :slidesPerView="1.5" :spaceBetween="10" :loop="true" :navigation="{
                        nextEl: '.navigate-prdh .swiper-button-next',
                        prevEl: '.navigate-prdh .swiper-button-prev',
                    }" 
                    :breakpoints="{
                        // Define breakpoints here
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 50
                        },
                        1024: {
                            slidesPerView: 2.6,
                            spaceBetween: 30
                        },
                        1440: {
                            slidesPerView: 3.5,
                            spaceBetween: 30
                        },

                    }"
                    :slidesPerGroupSkip="1" :modules="modules" class="prdh-con">
                        <swiper-slide class="prdslider">
                            <div class="prdslide-con">
                                <div class="prd-img position-relative">
                                    <img src="/img/Group15.png" alt="">
                                    <!-- <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                    style="left: 10%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                    <h5>คอตตอนบัดไม้ไผ่</h5>
                                </div> -->
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide class="prdslider">
                            <div class="prdslide-con">
                                <div class="prd-img position-relative">
                                    <img src="/img/Group16.png" alt="">
                                    <!-- <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                    style="left: 10%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                    <h5>คอตตอนบัดไม้ไผ่</h5>
                                </div> -->
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide class="prdslider">
                            <div class="prdslide-con">
                                <div class="prd-img position-relative">
                                    <img src="/img/Group17.png" alt="">
                                    <!-- <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                    style="left: 10%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                    <h5>คอตตอนบัดไม้ไผ่</h5>
                                </div> -->
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide class="prdslider">
                            <div class="prdslide-con">
                                <div class="prd-img position-relative">
                                    <img src="/img/Group18.png" alt="">
                                    <!-- <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                    style="left: 10%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                    <h5>คอตตอนบัดไม้ไผ่</h5>
                                </div> -->
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide class="prdslider">
                            <div class="prdslide-con">
                                <div class="prd-img position-relative">
                                    <img src="/img/Group19.png" alt="">
                                    <!-- <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                    style="left: 10%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                    <h5>คอตตอนบัดไม้ไผ่</h5>
                                </div> -->
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide class="prdslider">
                            <div class="prdslide-con">
                                <div class="prd-img position-relative">
                                    <img src="/img/Group21.png" alt="">
                                    <!-- <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                    style="left: 10%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                    <h5>คอตตอนบัดไม้ไผ่</h5>
                                </div> -->
                                </div>
                            </div>
                        </swiper-slide>
                    </swiper>
                </div>
            </div>
        </div>
</template>
<style scoped>

.prdslider {
    margin-top: 100px;
    margin-bottom: 70px;
}

.prd-ex img {
    border-radius: 50%;
    width: 70px;
    height: 70px;
}

.prd-ex {
    flex-direction: column;
    display: flex;
    justify-content: center;
}

.txt-prm h1 {
    color: rgba(255, 250, 237, 1);
}

.txt-prm span {
    color: rgba(255, 250, 237, 1);
}

.search-shop {
    position: absolute;
    bottom: -10px;
    left: 50%;
    width: 600px;
    transform: translate3d(-50%, 10%, 0);
}

.banner-box {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
}

.banner-content {
    display: flex;
    align-items: center;
    left: 0;
    top: 50%;
    position: absolute;
    width: 100%;
    transform: translate(0, -50%);
}

.banner-content-txt {
    width: 100%;
    color: #000;
    text-align: left;
    margin-left: 10%;
}

.btn.btn-banner:hover {
    border-radius: 13px;
    background: var(--color-secondary);
    color: var(--color-light);
    border: 1px solid var(--color-primary);
}

.btn.btn-banner {
    border-radius: 13px;
    background: var(--color-light);
    color: var(--color-primary);
    border: 1.3px solid var(--color-secondary);
}

.shop-banner {
    margin-bottom: 4rem;
}
</style>

<script>
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/navigation';

// import required modules
import { Navigation } from 'swiper/modules';
export default {
   props: {
        // Define props to receive shop data
        name: String,
        type: String,
        logo: String,
        location: String,
        promptpay: String
    },
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        return {
            modules: [Navigation],
        };
    },
};
</script>
