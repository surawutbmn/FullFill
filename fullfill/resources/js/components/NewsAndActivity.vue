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
    <div class="article-head text-center mt-2" style="padding: 30px 0;">
        <span><b>‘Zero Waste’</b><br>
            การลดขยะให้เป็นศูนย์ หรือเหลือน้อยที่สุด <br>เป็นการหมุนเวียนทรัพยากรนำกลับมาใช้ใหม่ <br>และลดปริมาณ
            ของเสียให้เหลือน้อยลง</span>
    </div>
    <div class="container">
        <div class="row" style="height: 300px; margin-bottom: 5em;">
            <div class="col-6">
                <div class="position-relative">
                    <img style="width: 20vw; position: absolute;" src="/img/Ellipse 128.png" alt="">
                    <img style="width: 20vw; position: absolute; left: 30%;" src="/img/Ellipse 129.png" alt="">
                </div>
            </div>
            <div class="col-6" style="margin-top: 8vw;">
                <h5><b>Zero Waste ในประเทศไทย</b>
                    ช่วงนี้กระแสความกรีนของโลกกำลังมาแรง หลายคนเริ่มหันมา
                    เปลี่ยนพฤติกรรมของตัวเองง่าย ๆ แค่เริ่มต้นจากการใช้กล่องข้าว
                    ขวดน้ำ ที่สามารถนำกลับมาใช้ซ้ำได้ หรือ แม้แต่ร้านค้าทางเลือกอย่าง
                    Refill Stationที่ <b>ให้ความสำคัญกับปัญหาสิ่งแวดล้อม</b></h5>
            </div>
        </div>
    </div>
    <div class="article-sec">
            <div class="text-center txt-home">
                <h3>ข่าวสารยอดนิยม</h3>
                <p>ที่ได้รับความสนใจต่อผู้ใช้งาน</p>
            </div>
            <swiper :effect="'coverflow'" :loop="true" :grabCursor="true" :centeredSlides="true" :slidesPerView="'3'" :coverflowEffect="{
                rotate: 60,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
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
                    slidesPerView: 3,
                    spaceBetween: 30
                },

            }"
            :pagination="false" :navigation="true" :modules="modules" class="mb-4">
                <swiper-slide class="prdslider">
                    <div class="prdslide-con text-center">
                        <div class="prd-img position-relative">
                            <img src="/img/article.jpg" alt="">
                            <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                style="left: 25%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                <h5>นำมาแลก ’ถุงขยะรีไซเคิล’ กันนะ</h5>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="prdslider">
                    <div class="prdslide-con text-center">
                        <div class="prd-img position-relative">
                            <img src="/img/article.jpg" alt="">
                            <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                style="left: 25%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                <h5>นำมาแลก ’ถุงขยะรีไซเคิล’ กันนะ</h5>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="prdslider">
                    <div class="prdslide-con text-center">
                        <div class="prd-img position-relative">
                            <img src="/img/article.jpg" alt="">
                            <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                style="left: 25%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                <h5>นำมาแลก ’ถุงขยะรีไซเคิล’ กันนะ</h5>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="prdslider">
                    <div class="prdslide-con text-center">
                        <div class="prd-img position-relative">
                            <img src="/img/article.jpg" alt="">
                            <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                style="left: 25%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                <h5>นำมาแลก ’ถุงขยะรีไซเคิล’ กันนะ</h5>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="prdslider">
                    <div class="prdslide-con text-center">
                        <div class="prd-img position-relative">
                            <img src="/img/article.jpg" alt="">
                            <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                style="left: 25%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                <h5>นำมาแลก ’ถุงขยะรีไซเคิล’ กันนะ</h5>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="prdslider">
                    <div class="prdslide-con text-center">
                        <div class="prd-img position-relative">
                            <img src="/img/article.jpg" alt="">
                            <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                style="left: 25%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                <h5>นำมาแลก ’ถุงขยะรีไซเคิล’ กันนะ</h5>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
            </swiper>
        </div>
        <div class="prdh-sec position-relative">
            <div class=" container">
                <div class="position-relative ">
                    <div class="prdh-txt txt-home">
                        <h3>อยากให้มาช่วยโลก</h3>
                        <p>ภาพจากผู้ใช้งานที่ร้านจริง</p>
                    </div>
                    <div class="navigate-prdh">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="prd-slide container" style="max-height: 500px;">
                    <swiper :slidesPerView="1.8" :spaceBetween="10" :loop="true" :autoplay="true" :navigation="{
                        nextEl: '.navigate-prdh .swiper-button-next',
                        prevEl: '.navigate-prdh .swiper-button-prev',
                    }" 
                    :breakpoints="{
                        // Define breakpoints here
                        768: {
                            slidesPerView: 2.3,
                            spaceBetween: 50
                        },
                        1024: {
                            slidesPerView: 3.3,
                            spaceBetween: 30
                        },
                        1440: {
                            slidesPerView: 3.8,
                            spaceBetween: 30
                        },

                    }"
                    :slidesPerGroupSkip="1" :modules="modules" class="prdh-con">
                        <swiper-slide class="prdslider">
                            <div class="prdslide-con">
                                <div class="prd-img position-relative">
                                    <img style="width: 30vw;" src="/img/peopleZero_1.jpg" alt="">
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide class="prdslider">
                            <div class="prdslide-con">
                                <div class="prd-img position-relative">
                                    <img style="width: 30vw;" src="/img/peopleZero_3.jpg" alt="">
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide class="prdslider">
                            <div class="prdslide-con">
                                <div class="prd-img position-relative">
                                    <img style="width: 30vw;" src="/img/peopleZero_5.jpg" alt="">
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide class="prdslider">
                            <div class="prdslide-con">
                                <div class="prd-img position-relative">
                                    <img style="width: 30vw;" src="/img/peopleZero_2.jpg" alt="">
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide class="prdslider">
                            <div class="prdslide-con">
                                <div class="prd-img position-relative">
                                    <img style="width: 30vw;" src="/img/peopleZero_6.jpg" alt="">
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
.prdh-sec{margin-bottom: 0;}
</style>