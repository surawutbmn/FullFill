<template>
    <div class="banner">
        <div class="banner-con position-relative">
            <picture>
                <source media="(max-width:1200px)" srcset="/img/banner-h.jpg">
                <img style="width: 100%;" src="/img/banner-h.jpg" alt="">
            </picture>
            <div class="banner-box d-none d-md-flex">
                <div class="container position-relative" style="height: 100%;">
                    <div class="banner-content text-center">
                        <div class="banner-content-txt txt-prm mali-txt">
                            <h1>ประหยัดและเอาใจสายกรีน
                                 <br>ที่กำลังหาร้านรีฟิลเพื่อลดขยะ ลดพลาสติก  </h1>
                            <h3 style="margin-top: 30px; display:flex">FullFill Zero Waste </h3>
                                <hr class="w-50" style="width: 2em; color: rgba(255, 250, 237, 1);">
                            <div style="margin-top: 10px;"><a href="\product" class="btn-banner btn">เริ่มจอง และไปรีฟิล</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.txt-prm h1,span{color: rgba(255, 250, 237, 1);}
.banner-box {position: absolute;left: 0;top: 0;width: 100%;height: 100%;}
.banner-content {display: flex; align-items: center; left: 0; top: 50%; position: absolute; width: 100%; transform: translate(0, -50%);}
.banner-content-txt {
    width: 100%;
    color: #fff;
    text-align: left;
}
.btn.btn-banner:hover {border-radius: 13px; background: var(--color-secondary); color: var( --color-light); border:1px solid var(--color-primary);}
.btn.btn-banner{font-size: 2em; padding: .5em, 1em; border-radius: 13px; background: var(--color-light); color: var( --color-primary); border:1.3px solid var(--color-secondary);}


</style>
<script>
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/navigation';

// import required modules
import { Navigation } from 'swiper/modules';

export default {
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
