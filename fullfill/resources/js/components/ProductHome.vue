<script>
import { Swiper, SwiperSlide } from 'swiper/vue';

import 'swiper/css';

import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-coverflow';



// import required modules
import { Navigation, Pagination, EffectCoverflow } from 'swiper/modules';

export default {
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        return {
            modules: [Navigation, Pagination, EffectCoverflow],
        };
    },
};
</script>

<template>
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
                <swiper :slidesPerView="1" :spaceBetween="40" :autoplay="false" :loop="true" :navigation="{
                    nextEl: '.navigate-prdh .swiper-button-next',
                    prevEl: '.navigate-prdh .swiper-button-prev',
                }" :breakpoints="{
    // Define breakpoints here
    768: {
        slidesPerView: 2,
        spaceBetween: 50
    },
    1024: {
        slidesPerView: 3.5,
        spaceBetween: 30
    },
    1440: {
        slidesPerView: 3.5,
        spaceBetween: 30
    },

}" :slidesPerGroupSkip="1" :modules="modules" class="prdh-con">
                    <swiper-slide class="prdslider">
                        <div class="prdslide-con">
                            <a href="/product">
                                <div class="prd-img position-relative">
                                    <img src="/img/Group25.png" alt="">
                                    <div
                                        class="position-absolute prd-name align-items-center d-flex justify-content-center text-light">
                                        <span>ผงชาเขียวมัจฉะออแกนิค</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="prdslider">
                        <div class="prdslide-con">
                            <a href="/product">

                                <div class="prd-img position-relative">
                                    <img src="/img/Group16.png" alt="">
                                    <div
                                        class="position-absolute prd-name align-items-center d-flex justify-content-center text-light">
                                        <span> ลิปบาล์มธรรมชาติ</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="prdslider">
                        <div class="prdslide-con">
                            <a href="/product">
                                <div class="prd-img position-relative">
                                    <img src="/img/Group17.png" alt="">
                                    <div
                                        class="position-absolute prd-name align-items-center d-flex justify-content-center text-light">
                                        <span>คอตตอนบัดไม้ไผ่</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="prdslider">
                        <div class="prdslide-con">
                            <a href="/product">
                                <div class="prd-img position-relative">
                                    <img src="/img/Group18.png" alt="">
                                    <div
                                        class="position-absolute prd-name align-items-center d-flex justify-content-center text-light">
                                        <span>คอตตอนบัดไม้ไผ่</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="prdslider">
                        <div class="prdslide-con">
                            <a href="/product">

                                <div class="prd-img position-relative">
                                    <img src="/img/Group19.png" alt="">
                                    <div
                                        class="position-absolute prd-name align-items-center d-flex justify-content-center text-light">
                                        <span>คอตตอนบัดไม้ไผ่</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="prdslider">
                        <div class="prdslide-con">
                            <a href="/product">

                                <div class="prd-img position-relative">
                                    <img src="/img/Group21.png" alt="">
                                    <div
                                        class="position-absolute prd-name align-items-center d-flex justify-content-center text-light">
                                        <span>คอตตอนบัดไม้ไผ่</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </swiper-slide>
                </swiper>
            </div>
            <div class="seemore-btn text-center"><a class="btn btn-prm" href="/product">ดูสินค้าทั้งหมด</a></div>
        </div>
    </div>
    <div class="recprd-sec position-relative">
        <div class=" container">
            <div class="position-relative ">
                <div class="prdh-txt txt-home">
                    <h3>บรรจุภัณฑ์ยอดนิยม</h3>
                    <p>ที่เป็นความพึงพอใจต่อผู้ใช้งาน</p>
                </div>
                <div class="navigate-prdh">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="rec-slide container " style="max-height: 500px;">
                <swiper :slidesPerView="1" :spaceBetween="40" :loop="true" :breakpoints="{
                    // Define breakpoints here
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 50
                    },
                    1024: {
                        slidesPerView: 3.5,
                        spaceBetween: 30
                    },
                    1440: {
                        slidesPerView: 3.5,
                        spaceBetween: 30
                    },

                }" :navigation="{
    nextEl: '.navigate-prdh .swiper-button-next',
    prevEl: '.navigate-prdh .swiper-button-prev',
}" :slidesPerGroupSkip="1" :modules="modules" class="prdh-con">
                    <swiper-slide class="prdslider">
                        <div class="prdslide-con">
                            <div class="prd-img position-relative">
                                <img src="/img/Group34.png" alt="">
                                <div
                                    class="position-absolute prd-name align-items-center d-flex justify-content-center text-light">
                                    <span>ขวดบดพริกไทย</span>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="prdslider">
                        <div class="prdslide-con">
                            <div class="prd-img position-relative">
                                <img src="/img/Group27.png" alt="">
                                <div
                                    class="position-absolute prd-name align-items-center d-flex justify-content-center text-light">
                                    <span>ขวดบดพริกไทย</span>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="prdslider">
                        <div class="prdslide-con">
                            <div class="prd-img position-relative">
                                <img src="/img/Group19.png" alt="">
                                <div
                                    class="position-absolute prd-name align-items-center d-flex justify-content-center text-light">
                                    <span>ขวดบดพริกไทย</span>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="prdslider">
                        <div class="prdslide-con">
                            <div class="prd-img position-relative">
                                <img src="/img/Group27.png" alt="">
                                <div
                                    class="position-absolute prd-name align-items-center d-flex justify-content-center text-light">
                                    <span>ขวดบดพริกไทย</span>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="prdslider">
                        <div class="prdslide-con">
                            <div class="prd-img position-relative">
                                <img src="/img/Group29.png" alt="">
                                <div
                                    class="position-absolute prd-name align-items-center d-flex justify-content-center text-light">
                                    <span>ขวดบดพริกไทย</span>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="prdslider">
                        <div class="prdslide-con">
                            <div class="prd-img position-relative">
                                <img src="/img/Group31.png" alt="">
                                <div
                                    class="position-absolute prd-name align-items-center d-flex justify-content-center text-light">
                                    <span>ขวดบดพริกไทย</span>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="prdslider">
                        <div class="prdslide-con">
                            <div class="prd-img position-relative">
                                <img src="/img/Group32.png" alt="">
                                <div
                                    class="position-absolute prd-name align-items-center d-flex justify-content-center text-light">
                                    <span>ขวดบดพริกไทย</span>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                </swiper>
            </div>
            <div class="seemore-btn text-center"><a class="btn btn-prm" href="/product">ดูสินค้าทั้งหมด</a></div>
        </div>
    </div>
</template>

<style>
/* .rec-slide {
    margin-bottom: 100px;
} */
.seemore-btn { 
    padding: 0 0 2em 0;
    position: relative;
    z-index: 1;
    margin-top: -2em;}
.seemore-btn a {
    color: var(--color-defult);
    /* text-decoration: none; */
   
}

.prdh-sec .swiper-wrapper,
.rec-slide .swiper-wrapper {
    max-height: 500px;
}

.prdh-txt {
    margin-top: 20px;
    position: absolute;
    left: 1em;
}

.txt-home {
    color: #86581B;
}

.recprd-sec {
    padding: 2em 0;

}
.prdh-sec {
    /* margin-bottom: 100px; */
    padding: 2em 0;
    background: rgb(248, 170, 0);
    background: linear-gradient(-90deg, rgba(248, 170, 0, 0) 0%, rgba(244, 229, 195, 1) 100%);
}

.navigate-prdh .swiper-button-next {
    color: #86581B;
    width: 40px;
    height: 40px;
    background: transparent;
    border: 2px solid #86581B;
    border-radius: 100%;
    left: 70px;
}

.navigate-prdh .swiper-button-prev {
    color: #86581B;
    width: 40px;
    height: 40px;
    background: transparent;
    border: 2px solid #86581B;
    border-radius: 100%;
}

.navigate-prdh .swiper-button-next::after {
    font-size: 20px;
}

.navigate-prdh .swiper-button-prev::after {
    font-size: 20px;
}

.article-sec .swiper-button-next::after {
    font-size: 20px;
}

.article-sec .swiper-button-prev::after {
    font-size: 20px;
}

.article-sec .swiper-button-next {
    color: #86581B;
    width: 40px;
    height: 40px;
    background: transparent;
    border: 2px solid #86581B;
    border-radius: 100%;
}

.article-sec .swiper-button-prev {
    color: #86581B;
    width: 40px;
    height: 40px;
    background: transparent;
    border: 2px solid #86581B;
    border-radius: 100%;
}

.navigate-prdh {
    position: absolute;
    right: 10%;
    top: 10%;
    margin-top: 50px;
}

.prd-img img {
    box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.2);
    max-height: 323px;
    max-width: 297px;
}

.prdslide-con {
    /* padding: 1em; */
    /* background: white; */
    display: flex;
    justify-content: center;
}

.prdslider {
    margin-top: 100px;
    margin-bottom: -100px;
}

.prd-name {
    font-size: var(--font-h5);
    left: 8%;
    bottom: 20px;
    height: 50px;
    width: 250px;
    background: rgba(112, 73, 21, 1);
}

@media (max-width: 575.98px) {
    .prd-name {
        left: 7%;
        bottom: 20px;
        height: 50px;
        width: 250px;
        background: rgba(112, 73, 21, 1);
    }

    .navigate-prdh {
        right: 35%;
    }

    .prdh-sec {
        margin-bottom: 50px;
    }

    .recprd-sec {
        margin-bottom: 50px;
    }
}
</style>